<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css"
    >
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
echo "Connecté : " .($estConnecte ? "Vrai" : "Faux") . "<br>";
echo "<h1 class='has-text-primary is-size-1'>Âge : " . $age . "</h1>";
echo " <h1 class='has-text-primary is-size-1'> Prénom : " . $prenom . " </h1>";
echo " <h1 class='has-text-primary is-size-1'>Température : " . $temperature . "</h1>";
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
<div>
    <table class="table">
        <caption>
           <h1 class="has-background-success is-size-1">Types</h1>
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
