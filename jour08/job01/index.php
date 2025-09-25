<?php
// 1. Démarrer la session (obligatoire)
session_start();

// 2. Si bouton reset cliqué, remettre le compteur à zéro
if (isset($_POST['reset'])) {
    $_SESSION['visites'] = 0;
}

// 3. Si la variable de session n’existe pas encore, on l’initialise
if (!isset($_SESSION['visites'])) {
    $_SESSION['visites'] = 0;
}

// 4. Incrémenter le compteur (+1 à chaque visite)
$_SESSION['visites']++;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites</title>
</head>
<body>
<h1>Compteur de visites</h1>

<p>Nombre de visites : <strong><?= $_SESSION['visites'] ?></strong></p>

<!-- Formulaire pour remettre le compteur à zéro -->
<form method="post">
    <button type="submit" name="reset">Réinitialiser</button>
</form>
</body>
</html>
