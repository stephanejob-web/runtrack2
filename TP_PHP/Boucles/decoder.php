<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css"
    >
    <title>Document</title>
</head>
<body>
<div class="container">
    <button class="button">
        <a href="../../index.php"> ACCEUIL</a>
    </button>
    <img class="image is-16by9" src="code.png" alt="" srcset="">
</div>

</body>
</html>

<?php

/* Consigne : Crée un fichier decoder.php. Ton script doit parcourir la chaîne :

"Coder tous les jours, un petit pas à la fois"

… et afficher un caractère sur deux.

Étapes :

Crée ton fichier.
Stocke la chaîne dans $str.
Utilise une boucle for avec un pas de 2.
Concatène et affiche le résultat.

Vérification : la sortie doit contenir environ la moitié des caractères.
*/


$str = "Coder tous les jours, un petit pas à la fois";
$newStr =  str_replace([' ', ','], '', $str);

for ($i = 0; $i < strlen($newStr); $i += 2) {
    echo $newStr[$i];
}


for ($i = 0; $i < strlen($newStr); $i ++) {
    if ($i % 2 == 0){
        echo $newStr[$i];
    }
 
}