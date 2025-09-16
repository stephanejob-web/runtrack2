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
$type = [
        [
                "type" => "Décimal / Flottant (float, double)",
                "description" => "nombres à virgule (ex : 3.14, -0.5)"
        ],
        [
                "type" => "Entier (int, integer)",
                "description" => "nombres entiers (ex : 1, -42, 2025)"
        ],
        [
                "type" => "Boolean",
                "description" => "Type flottant de faible précision, 4 octets ou 32 bits sur quasiment tous les systèmes."
        ],
        [
                "type" => "Chaines de caratéres",
                "description" => "Un objet String est utilisé afin de représenter et de manipuler une chaîne de caractères."
        ]

];
?>

<hr>
<div style="display: grid;grid-template-columns: repeat(2,1fr);gap: 50px" class="main">
    <table border="1">
        <caption>
            Types
        </caption>
        <thead>
        <tr>
            <th scope="col">Type</th>
            <th scope="col">Explication</th>
        </tr>
        <?php foreach ($type as $item): ?>
            <tr>
                <td><?= $item["type"] ?></td>
                <td><?= $item["description"] ?></td>
            </tr>
        <?php endforeach; ?>
        </thead>
    </table>
</div>

</body>
</html>
