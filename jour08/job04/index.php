<?php
// Si on clique sur le bouton Connexion
if (isset($_POST['connexion'])) {
    $prenom = $_POST['prenom'];
    setcookie("prenom", $prenom); // On crée le cookie
    $prenom_cookie = $prenom;
}
// Si on clique sur le bouton Déconnexion
elseif (isset($_POST['deco'])) {
    setcookie("prenom", ""); // On efface le cookie
    $prenom_cookie = null;
}
// Sinon on regarde si le cookie existe déjà
else {
    $prenom_cookie = $_COOKIE['prenom'] ?? null;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion simple</title>
</head>
<body>

<?php if ($prenom_cookie): ?>
    <p>Bonjour <?= $prenom_cookie ?> !</p>
    <form method="post">
        <button type="submit" name="deco">Déconnexion</button>
    </form>
<?php else: ?>
    <form method="post">
        <input type="text" name="prenom" placeholder="Ton prénom">
        <button type="submit" name="connexion">Connexion</button>
    </form>
<?php endif; ?>

</body>
</html>
