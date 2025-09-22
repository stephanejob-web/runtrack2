<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nombre pair ou impair</title>
</head>
<body>

<!-- Formulaire -->
<form method="GET" action="">
    <label>Entrez un nombre :
        <input type="text" name="nombre">
    </label>
    <input type="submit" value="Vérifier">
</form>

<?php

if (isset($_GET['nombre']) && $_GET['nombre'] !== '') {
    $nombre = (int) $_GET['nombre'];

    if ($nombre % 2 === 0) {
        echo "Nombre pair";
    } else {
        echo "Nombre impair";
    }
}
?>

</body>
</html>
