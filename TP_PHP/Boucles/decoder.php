

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
$tt =  str_replace([' ', ','], '', $str);
for ($i = 0; $i <= strlen($tt); $i++) {
    if ($tt[$i] %2 == 0) {
        print_r($tt[$i]);
    }

}

