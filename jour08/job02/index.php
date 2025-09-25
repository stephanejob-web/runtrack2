<?php
// Si le bouton reset est cliqué
if (isset($_POST['reset'])) {
    $visites = 0;
} else {
    // Lire le cookie ou mettre à 0 s'il n'existe pas
    $visites = isset($_COOKIE['nbvisites']) ? $_COOKIE['nbvisites'] : 0;
}

// Ajouter 1 à chaque visite
$visites++;

// Enregistrer le cookie (valide 1 heure)
setcookie("nbvisites", $visites, time() + 3600);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Compteur</title>
</head>
<body>
<h1>Compteur de visites</h1>
<p>Tu as visité cette page <?= $visites ?> fois.</p>

<form method="post">
    <button type="submit" name="reset">Reset</button>
</form>
</body>
</html>
