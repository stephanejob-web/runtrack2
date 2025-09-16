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
<div style="display: flex ;justify-content: center ;align-items: center ;flex-direction: column" class="container">
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
echo "<h1 class='has-text-primary is-size-1'> <h1 class='has-text-primary is-size-1' > Connecté : " .($estConnecte ? "Vrai " : "Faux</h1>") . "</h1>";
echo "<h1 class='has-text-primary is-size-1'>Âge : " . $age . "</h1>";
echo " <h1 class='has-text-primary is-size-1'> Prénom : " . $prenom . " </h1>";
echo " <h1 class='has-text-primary is-size-1'>Température : " . $temperature . "</h1>";
include 'datas.php';
?>
</div>

<hr>
<div class="container">
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
