<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage GET</title>
    <link rel="stylesheet" href="../../http_cdn.jsdelivr.net_npm_bulma@1.0.4_css_bulma.css">
</head>
<body>
<h2>Formulaire (POST)</h2>
<!-- Formulaire -->
<form method="POST" action="">
    <label>Nom : <input type="text" name="nom"></label><br><br>
    <label>Prénom : <input type="text" name="prenom"></label><br><br>
    <label>Email : <input type="text" name="email"></label><br><br>
    <input type="submit" value="Envoyer">
</form>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nbArguments = count($_POST);
    echo "Le nombre d’arguments POST envoyés est : " . $nbArguments;
}
?>

</body>
</html>
