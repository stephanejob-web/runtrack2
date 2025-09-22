<?php
// index.php (placer dans /var/www/html/runtrack ou adapter $rootDir)
$rootDir = __DIR__; // racine à explorer (ex: /var/www/html/runtrack)
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'); // URL base
$maxDepth = isset($_GET['depth']) ? max(1, (int)$_GET['depth']) : 6;

// Dossiers à exclure
$exclude = [
  '.git', '.hg', '.svn', '.DS_Store', '.cache', '.idea', '.vscode',
  'node_modules', 'vendor', 'dist', 'build', '__pycache__'
];

// Sécurité: résout chemin & évite surprises
$rootReal = realpath($rootDir);
if ($rootReal === false) { http_response_code(500); exit('Chemin invalide'); }

function isVisibleDir(string $path, array $exclude): bool {
  $base = basename($path);
  if ($base === '.' || $base === '..') return false;
  if ($base[0] === '.') return false;
  if (in_array($base, $exclude, true)) return false;
  return is_dir($path);
}

function readDirs(string $dir, int $depth, array $exclude): array {
  // Retourne un arbre: ['name'=>..., 'path'=>..., 'children'=>[...]]
  $entries = @scandir($dir);
  if ($entries === false) return [];

  $dirs = [];
  foreach ($entries as $e) {
    $full = $dir . DIRECTORY_SEPARATOR . $e;
    if (!isVisibleDir($full, $exclude)) continue;

    $node = ['name' => $e, 'path' => $full, 'children' => []];
    if ($depth > 0) {
      $node['children'] = readDirs($full, $depth - 1, $exclude);
    }
    $dirs[] = $node;
  }

  // Tri naturel insensible à la casse
  usort($dirs, function($a, $b){
    return strnatcasecmp($a['name'], $b['name']);
  });

  return $dirs;
}

$tree = readDirs($rootReal, $maxDepth, $exclude);

// Helpers URL
function pathToHref(string $abs, string $rootReal, string $baseUrl): string {
  $rel = ltrim(str_replace($rootReal, '', $abs), DIRECTORY_SEPARATOR);
  // Transforme rel en segments encodés
  $parts = array_map('rawurlencode', explode(DIRECTORY_SEPARATOR, $rel));
  return $baseUrl . '/' . implode('/', $parts) . '/';
}

// Compte total des dossiers
function countNodes(array $nodes): int {
  $n = 0;
  foreach ($nodes as $node) {
    $n++;
    if (!empty($node['children'])) $n += countNodes($node['children']);
  }
  return $n;
}
$total = countNodes($tree);
?><!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Arbre des projets – runtrack</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="color-scheme" content="light dark">
  <style>
    :root{
      --bg:#0b1020; --card:#0f172a; --text:#e5e7eb; --muted:#94a3b8;
      --border:#1f2937; --ring:#60a5fa; --shadow:0 10px 25px rgba(0,0,0,.35);
      --radius:14px; --speed:.2s;
    }
    @media (prefers-color-scheme: light){
      :root{ --bg:#f6f7fb; --card:#fff; --text:#111827; --muted:#6b7280;
        --border:#e5e7eb; --ring:#3b82f6; --shadow:0 10px 25px rgba(0,0,0,.07);
      }
    }
    *{box-sizing:border-box}
    body{margin:0;background:var(--bg);color:var(--text);font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Arial,sans-serif;line-height:1.55}
    .wrap{max-width:1100px;margin:0 auto;padding:28px 18px 60px}
    header{display:flex;gap:16px;align-items:center;justify-content:space-between;flex-wrap:wrap;margin-bottom:18px}
    h1{margin:0;font-size:clamp(22px,3vw,30px)}
    .muted{color:var(--muted)}
    .toolbar{display:flex;gap:10px;align-items:center;flex-wrap:wrap}
    .search{position:relative;min-width:260px;flex:1}
    .search input{width:100%;padding:10px 40px;border-radius:12px;border:1px solid var(--border);background:var(--card);color:var(--text);box-shadow:var(--shadow);outline:none;transition:border-color var(--speed), box-shadow var(--speed)}
    .search input:focus{border-color:var(--ring);box-shadow:0 0 0 4px color-mix(in oklab, var(--ring) 18%, transparent)}
    .btn{border:1px solid var(--border);background:var(--card);padding:10px 12px;border-radius:12px;box-shadow:var(--shadow);cursor:pointer;color:inherit}
    .card{border:1px solid var(--border);background:var(--card);border-radius:var(--radius);padding:14px;box-shadow:var(--shadow)}
    .tree{margin:0;padding-left:0;list-style:none}
    details{border:1px solid transparent;border-radius:10px;padding:6px}
    details[open]{background:color-mix(in oklab, var(--card) 85%, transparent)}
    .node{display:flex;align-items:baseline;gap:10px}
    .node a{color:inherit;text-decoration:none;border-bottom:1px dashed color-mix(in oklab, var(--muted) 60%, transparent)}
    .node small{color:var(--muted)}
    .kids{list-style:none;margin:6px 0 6px 20px;padding-left:14px;border-left:1px dashed var(--border)}
    .badge{font-size:.8rem;border:1px solid var(--border);border-radius:999px;padding:2px 8px;color:var(--muted)}
    code.path{background:transparent;color:var(--muted)}
  </style>
</head>
<body>
  <div class="wrap">
    <header>
      <div>
        <h1>Arbre des projets – runtrack</h1>
        <div class="muted" id="count" aria-live="polite">
          <?= htmlspecialchars($total, ENT_QUOTES) ?> dossier<?= $total>1?'s':'' ?> (profondeur ≤ <?= (int)$maxDepth ?>)
        </div>
      </div>
      <div class="toolbar">
        <div class="search">
          <input id="q" type="search" placeholder="Rechercher (ex: api, module-3, Symfony)…" aria-label="Rechercher un dossier">
        </div>
        <button class="btn" id="openAll" type="button">Tout ouvrir</button>
        <button class="btn" id="closeAll" type="button">Tout fermer</button>
      </div>
    </header>

    <div class="card">
      <?php if (empty($tree)): ?>
        <p class="muted">Aucun dossier trouvé sous <code class="path"><?= htmlspecialchars($rootReal, ENT_QUOTES) ?></code>.</p>
      <?php else: ?>
        <ul class="tree" id="tree" role="tree">
          <?php
          // rendu récursif
          function renderTree(array $nodes, string $rootReal, string $baseUrl){
            echo "\n";
            foreach ($nodes as $n){
              $href = htmlspecialchars(pathToHref($n['path'], $rootReal, $baseUrl), ENT_QUOTES);
              $name = htmlspecialchars($n['name'], ENT_QUOTES);
              $hasKids = !empty($n['children']);

              if ($hasKids){
                echo "<li role=\"treeitem\" aria-expanded=\"false\">\n";
                echo "  <details>\n";
                echo "    <summary class=\"node\"><a href=\"{$href}\">{$name}</a> <small class=\"badge\">dossier</small></summary>\n";
                echo "    <ul class=\"kids\">\n";
                renderTree($n['children'], $rootReal, $baseUrl);
                echo "    </ul>\n";
                echo "  </details>\n";
                echo "</li>\n";
              } else {
                echo "<li role=\"treeitem\" aria-expanded=\"false\">\n";
                echo "  <div class=\"node\"><a href=\"{$href}\">{$name}</a> <small class=\"badge\">dossier</small></div>\n";
                echo "</li>\n";
              }
            }
          }
          renderTree($tree, $rootReal, $baseUrl);
          ?>
        </ul>
      <?php endif; ?>
    </div>

    <p class="muted" style="margin-top:14px">
      Racine : <code class="path"><?= htmlspecialchars($rootReal, ENT_QUOTES) ?></code> — 
      Ajuster la profondeur : <code>?depth=4</code>
    </p>
  </div>

  <script>
    // Ouvrir/Fermer tout
    const openAllBtn = document.getElementById('openAll');
    const closeAllBtn = document.getElementById('closeAll');
    const q = document.getElementById('q');
    const count = document.getElementById('count');

    function openAll(open=true){
      document.querySelectorAll('details').forEach(d => d.open = open);
    }
    if (openAllBtn) openAllBtn.addEventListener('click', () => openAll(true));
    if (closeAllBtn) closeAllBtn.addEventListener('click', () => openAll(false));

    // Recherche: filtre nodes dont le nom ne contient pas le terme.
    // On affiche/masque les <li>, et on ouvre les branches pertinentes.
    if (q){
      const items = Array.from(document.querySelectorAll('.tree li')).map(li => {
        const summaryLink = li.querySelector('summary a, .node a');
        return { li, name: (summaryLink?.textContent || '').toLowerCase(), details: li.querySelector('details') };
      });
      q.addEventListener('input', () => {
        const term = q.value.trim().toLowerCase();
        let visible = 0;

        // Reset
        document.querySelectorAll('.tree li').forEach(li => li.style.display='');

        if (!term){
          // Rien saisi -> fermer tout et compter tous les dossiers
          openAll(false);
          visible = items.length;
        } else {
          // Filtrage
          items.forEach(({li, name, details}) => {
            const match = name.includes(term);
            li.style.display = match ? '' : 'none';
            if (match){
              visible++;
              // Ouvre la chaîne d'ancêtres pour révéler l'élément
              let p = li.parentElement;
              while (p){
                const d = p.closest('details');
                if (d){ d.open = true; p = d.parentElement?.parentElement; }
                else { p = p.parentElement; }
              }
            }
          });
        }
        if (count){
          count.textContent = visible
            ? `${visible} dossier${visible>1?'s':''}`
            : 'Aucun dossier';
        }
      });
    }
  </script>
</body>
</html>

