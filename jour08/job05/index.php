<?php
// morpion.php
session_start();

/* ------------------------- Utilitaires ------------------------- */
function new_board() { return array_fill(0, 9, '-'); }

function winning_lines() {
    return [
            [0,1,2],[3,4,5],[6,7,8], // lignes
            [0,3,6],[1,4,7],[2,5,8], // colonnes
            [0,4,8],[2,4,6],         // diagonales
    ];
}

/** Retourne 'X' ou 'O' si vainqueur, 'draw' si nul, ou null si partie non finie */
function game_status(array $b) {
    foreach (winning_lines() as $l) {
        if ($b[$l[0]] !== '-' && $b[$l[0]] === $b[$l[1]] && $b[$l[1]] === $b[$l[2]]) {
            return $b[$l[0]];
        }
    }
    if (!in_array('-', $b, true)) return 'draw';
    return null;
}

/** Indices des cases vides */
function empty_cells(array $b) {
    $e = [];
    foreach ($b as $i => $v) if ($v === '-') $e[] = $i;
    return $e;
}

/** Joue un coup si possible et retourne true si joué */
function play(&$board, $idx, $player) {
    if ($idx !== null && $idx >= 0 && $idx < 9 && $board[$idx] === '-') {
        $board[$idx] = $player;
        return true;
    }
    return false;
}

/* --------------------------- IA simple -------------------------- */
/**
 * IA priorités : 1) gagner  2) bloquer  3) centre  4) coin  5) aléatoire
 * $cpu = 'O' par défaut, $human = 'X'
 */
function ai_move(array $board, $cpu = 'O', $human = 'X') {
    // 1) Chercher coup gagnant
    foreach (empty_cells($board) as $i) {
        $b = $board; $b[$i] = $cpu;
        if (game_status($b) === $cpu) return $i;
    }
    // 2) Bloquer humain
    foreach (empty_cells($board) as $i) {
        $b = $board; $b[$i] = $human;
        if (game_status($b) === $human) return $i;
    }
    // 3) Centre
    if ($board[4] === '-') return 4;
    // 4) Coin
    foreach ([0,2,6,8] as $c) if ($board[$c] === '-') return $c;
    // 5) Aléatoire
    $e = empty_cells($board);
    if (!$e) return null;
    return $e[array_rand($e)];
}

/* ----------------------- État de l'application ----------------------- */
if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = [
            'board'     => new_board(),
            'player'    => 'X',          // joueur courant
            'mode'      => 'cpu',        // 'cpu' ou 'pvp'
            'starts'    => 'X',          // qui commence la prochaine partie
            'scores'    => ['X' => 0, 'O' => 0, 'draw' => 0],
            'message'   => 'À toi de jouer !',
            'game_over' => false,
    ];
}

$G =& $_SESSION['game'];

/* ----------------------------- Actions ----------------------------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Changer de mode (cpu/pvp)
    if (isset($_POST['mode']) && in_array($_POST['mode'], ['cpu', 'pvp'], true)) {
        $G['mode'] = $_POST['mode'];
    }

    // Nouvelle partie
    if (isset($_POST['new'])) {
        $G['board'] = new_board();
        $G['player'] = $G['starts']; // commence selon réglage
        $G['message'] = "Nouvelle partie — {$G['player']} commence.";
        $G['game_over'] = false;
    }

    // Échanger qui commence (X <-> O) pour la prochaine partie
    if (isset($_POST['swap_start'])) {
        $G['starts'] = ($G['starts'] === 'X') ? 'O' : 'X';
        $G['message'] = "Le prochain à commencer sera {$G['starts']}. Lance une nouvelle partie.";
    }

    // Reset des scores
    if (isset($_POST['reset_scores'])) {
        $G['scores'] = ['X' => 0, 'O' => 0, 'draw' => 0];
        $G['message'] = "Scores remis à zéro.";
    }

    // Clic sur une case
    if (isset($_POST['cell']) && !$G['game_over']) {
        $idx = (int)$_POST['cell'];
        if (play($G['board'], $idx, $G['player'])) {
            // Vérifier l'état
            $status = game_status($G['board']);
            if ($status === 'X' || $status === 'O') {
                $G['scores'][$status]++;
                $G['message'] = "🎉 Joueur {$status} a gagné !";
                $G['game_over'] = true;
            } elseif ($status === 'draw') {
                $G['scores']['draw']++;
                $G['message'] = "🤝 Match nul.";
                $G['game_over'] = true;
            } else {
                // Continuer : changer de joueur
                $G['player'] = ($G['player'] === 'X') ? 'O' : 'X';
                $G['message'] = "À {$G['player']} de jouer.";
            }
        }
    }

    // Tour de l'IA si mode cpu, partie non finie, et c'est à 'O' (IA) de jouer
    if ($G['mode'] === 'cpu' && !$G['game_over'] && $G['player'] === 'O') {
        $move = ai_move($G['board'], 'O', 'X');
        if ($move !== null) {
            play($G['board'], $move, 'O');
            $status = game_status($G['board']);
            if ($status === 'X' || $status === 'O') {
                $G['scores'][$status]++;
                $G['message'] = "🤖 L'ordinateur joue {$move} — {$status} gagne !";
                $G['game_over'] = true;
            } elseif ($status === 'draw') {
                $G['scores']['draw']++;
                $G['message'] = "🤖 L'ordinateur joue {$move} — match nul.";
                $G['game_over'] = true;
            } else {
                $G['player'] = 'X';
                $G['message'] = "🤖 L'ordinateur a joué. À X de jouer.";
            }
        }
    }

    // PRG : éviter la double-soumission
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

/* ------------------------------ Vue ------------------------------ */
$board = $G['board'];
$disabled_all = $G['game_over'];

?><!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Morpion PHP — Super Édition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        :root{
            --bg:#0b1220; --panel:#0f172a; --panel2:#111a2f; --accent:#22d3ee;
            --text:#e5e7eb; --muted:#94a3b8; --win:#22c55e; --lose:#ef4444; --draw:#f59e0b;
            --cell:110px; --gap:12px; --r:18px; --shadow:0 14px 30px rgba(0,0,0,.35);
        }
        *{box-sizing:border-box}
        html,body{height:100%;margin:0;background:linear-gradient(135deg,#0b1220,#0a0f1c 60%,#0b1220);color:var(--text);font-family:ui-sans-serif,system-ui,Segoe UI,Roboto,Arial}
        .app{max-width:980px;margin:40px auto;padding:24px}
        .top{
            display:grid;grid-template-columns:1fr auto;gap:16px;align-items:center;margin-bottom:18px
        }
        .card{background:var(--panel);border:1px solid #1e2a46;border-radius:20px;box-shadow:var(--shadow)}
        .board-wrap{display:grid;grid-template-columns:1fr 340px;gap:20px}
        .board{display:grid;grid-template-columns:repeat(3,var(--cell));grid-template-rows:repeat(3,var(--cell));gap:var(--gap);padding:18px;justify-content:center}
        .cell{
            background:var(--panel2);border:1px solid #1f2c4b;border-radius:var(--r);
            font-size:48px;font-weight:800;color:var(--text);cursor:pointer;transition:.15s transform,.15s background,.15s border-color;
        }
        .cell:hover{transform:translateY(-2px)}
        .cell:disabled{opacity:.6;cursor:not-allowed;transform:none}
        header.title{font-size:28px;font-weight:800;letter-spacing:.3px;display:flex;gap:12px;align-items:center}
        .badge{display:inline-flex;align-items:center;padding:4px 10px;border-radius:999px;font-size:12px;background:#0d1a33;border:1px solid #203156;color:var(--muted)}
        .panel{padding:18px}
        .scores{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:8px}
        .score{background:#0d1a33;border:1px solid #203156;border-radius:14px;padding:12px;text-align:center}
        .score b{display:block;font-size:22px;margin-top:6px}
        .score.x{outline:2px solid #60a5fa22}
        .score.o{outline:2px solid #a78bfa22}
        .score.d{outline:2px solid #f59e0b22}
        .msg{margin-top:12px;padding:12px 14px;border-radius:14px;background:#0c1a33;border:1px solid #1f2e51}
        form.controls{display:flex;flex-wrap:wrap;gap:10px;margin-top:14px}
        .btn{
            background:#132347;border:1px solid #25407a;color:var(--text);padding:10px 14px;border-radius:12px;cursor:pointer;font-weight:700;
            transition:.15s transform,.15s background,.15s border-color;
        }
        .btn:hover{background:#16305f}
        .btn:active{transform:translateY(1px)}
        .btn.secondary{background:#101a33;border-color:#273a6a}
        .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .radio{
            display:flex;gap:10px;background:#0d1a33;border:1px solid #203156;border-radius:12px;padding:10px 12px;align-items:center;justify-content:space-between
        }
        .radio label{display:flex;gap:8px;align-items:center;font-weight:700}
        .hint{color:var(--muted);font-size:12px;margin-top:6px}
        @media (max-width:900px){
            .board-wrap{grid-template-columns:1fr}
            .board{--cell:94px}
        }
        @media (max-width:420px){
            .board{--cell:86px}
        }
    </style>
</head>
<body>
<div class="app">
    <div class="top">
        <header class="title">Morpion PHP <span class="badge">Super Édition</span></header>
        <form method="post" class="controls">
            <button class="btn secondary" name="swap_start">🔄 Qui commence: <?= htmlspecialchars($G['starts']) ?></button>
            <button class="btn" name="new">🆕 Nouvelle partie</button>
            <button class="btn secondary" name="reset_scores">🗑️ Reset scores</button>
        </form>
    </div>

    <div class="board-wrap">
        <div class="card">
            <form method="post" class="board">
                <?php for ($i=0;$i<9;$i++): ?>
                    <?php
                    $val = $board[$i];
                    $label = ($val === '-') ? '&nbsp;' : htmlspecialchars($val);
                    $disabled = ($val !== '-') || $disabled_all;
                    ?>
                    <button class="cell" type="submit" name="cell" value="<?= $i ?>" <?= $disabled ? 'disabled' : '' ?>>
                        <?= $label ?>
                    </button>
                <?php endfor; ?>
            </form>
        </div>

        <div class="card panel">
            <div class="row">
                <form method="post" class="radio">
                    <label>
                        <input type="radio" name="mode" value="cpu" <?= $G['mode']==='cpu'?'checked':'' ?> onchange="this.form.submit()"> Joueur vs Ordi
                    </label>
                    <label>
                        <input type="radio" name="mode" value="pvp" <?= $G['mode']==='pvp'?'checked':'' ?> onchange="this.form.submit()"> Joueur vs Joueur
                    </label>
                </form>
                <div class="radio">
                    <div><b>Tour actuel :</b> <?= htmlspecialchars($G['player']) ?><?= $G['game_over'] ? " (terminé)" : "" ?></div>
                    <div class="hint"><?= $G['mode']==='cpu' ? "L'ordi joue 'O'." : "Deux joueurs l'un après l'autre." ?></div>
                </div>
            </div>

            <div class="scores">
                <div class="score x">
                    <div>Score X</div>
                    <b><?= (int)$G['scores']['X'] ?></b>
                </div>
                <div class="score o">
                    <div>Score O</div>
                    <b><?= (int)$G['scores']['O'] ?></b>
                </div>
                <div class="score d">
                    <div>Nuls</div>
                    <b><?= (int)$G['scores']['draw'] ?></b>
                </div>
            </div>

            <div class="msg"><?= htmlspecialchars($G['message']) ?></div>

            <form method="post" class="controls">
                <button class="btn" name="new">Rejouer</button>
                <button class="btn secondary" name="swap_start">Changer qui commence (prochaine partie)</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
