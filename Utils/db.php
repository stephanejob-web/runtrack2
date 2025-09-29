<?php
// Connexion simple
try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour09;charset=utf8", "root", "780662aB2");
    echo "Connexion réussie<br>";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
// Requête
$resultats = $pdo->query('select * from etudiants');
$selectHomme = $pdo->query("SELECT * FROM etudiants WHERE sexe = 'homme'");
$co = count($selectHomme->fetchAll());


// Affichage
echo "<ul>";
foreach ($resultats as $etudiant) {
    echo "<li>" . $etudiant['prenom'] . " " . $etudiant['nom'] . " " ." " . $etudiant['email']. "</li>";
}
echo "</ul>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1> nombre d'etudiant <?= $co ?></h1>
<?php foreach ($selectHomme as $etudiant): ?>
    <h1><?= $etudiant['nom'] ?></h1>
<?php endforeach; ?>
</body>
</html>
