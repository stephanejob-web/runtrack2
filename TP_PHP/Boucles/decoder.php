

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
$count = 0;
for($i=0; isset($newStr[$i]); $i++){
    $count++;

};

echo strlen($newStr);