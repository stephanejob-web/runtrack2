<?php
global $GetRoomsNameAndCapacity;
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/query.php';
$erreur = null;
$pdo = null;
$resultats = [];

try {
    $pdo = getPDO();
    $stmt = $pdo->query($GetRoomsNameAndCapacity);
    // Important pour n’avoir que des clés associatives (noms de colonnes)
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $erreur = "Erreur PDO : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css"
    >
    <title>Étudiants</title>
</head>
<body>
<div class="hero p-5">
    <?php if ($erreur): ?>
        <article class="message is-danger">
            <div class="message-header">Erreur</div>
            <div class="message-body"><?= $erreur ?></div>
        </article>
    <?php else: ?>
        <?php if (empty($resultats)): ?>
            <article class="message is-warning">
                <div class="message-body">Aucune donnée trouvée.</div>
            </article>
        <?php else: ?>
            <table class="table is-striped is-fullwidth">
                <thead>
                <tr>
                    <?php foreach (array_keys($resultats[0]) as $colonne): ?>
                        <th>
                            <?= htmlspecialchars(
                                    ucwords(str_replace('_', ' ', $colonne)),
                                    ENT_QUOTES,
                                    'UTF-8'
                            ) ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($resultats as $row): ?>
                    <tr>
                        <?php foreach ($row as $valeur): ?>
                            <td><?= htmlspecialchars((string)$valeur, ENT_QUOTES, 'UTF-8') ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
