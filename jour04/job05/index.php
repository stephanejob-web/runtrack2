<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage GET</title>
    <link rel="stylesheet" href="../../http_cdn.jsdelivr.net_npm_bulma@1.0.4_css_bulma.css">

</head>
<body>
<h2>Formulaire (POST)</h2>
<form method="post">
    Nom : <input type="text" name="nom"><br><br>
    Prénom : <input type="text" name="prenom"><br><br>
    Ville : <input type="text" name="ville"><br><br>
    <input type="submit" value="Envoyer">
</form>
<?php print_r($_POST); ?>
<?php if (!empty($_POST)) : ?>
    <table>
        <tr><th>Argument</th><th>Valeur</th></tr>
        <?php foreach ($_POST as $arg => $val) : ?>
            <tr>
                <td><?= $arg ?></td>
                <td><?= $val ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>
