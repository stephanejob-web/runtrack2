<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<?php
// Booléen
$estConnecte = true;
// Entier
$age = 32;
// Chaîne de caractères
$prenom = "Laurent";
// Nombre à virgule flottante
$temperature = 21.5;

// Affichage avec <br> pour aller à la ligne dans le navigateur
echo "Connecté : " . ($estConnecte ? "true" : "false") . "<br>";
echo "Âge : " . $age . "<br>";
echo "Prénom : " . $prenom . "<br>";
echo "Température : " . $temperature . "<br>";
?>

<hr>

<table border="1">
    <tr>
        <th>Booléen</th>
        <th>Entier</th>
        <th>Chaines de caractères</th>
        <th>Float</th>
    </tr>
    <tr>
        <td>true/false</td>
        <td>120</td>
        <td>"Toulon"</td>
        <td>"12.10"</td>
    </tr>
</table>

</body>
</html>
