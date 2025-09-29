<?php
global $GetRoomsNameAndCapacity;
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/query.php';
$erreur = null;
$pdo = null;
try {
    $pdo = getPDO();
    $sql = $GetRoomsNameAndCapacity;
    $stmt = $pdo->query($sql);
    $resultats = $stmt->fetchAll();
} catch (PDOException $e) {
    $erreur = "Erreur PDO : " . htmlspecialchars($e->getMessage());
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
    <title>Document</title>
</head>
<body>
<div class="hero">
    <?php if ($erreur): ?>
        <?= "il ya une erreur de connexion a la basse de donnés"?>
    <?php else:?>
        <table class="table is-striped is-fullwidth">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Capacité</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($resultats as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nom']) ?></td>
                    <td><?= htmlspecialchars($row['capacite']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif ?>
</div>
</body>
</html>
