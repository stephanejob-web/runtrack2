<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de connexion</title>
</head>
<body>

<!-- Formulaire -->
<form method="POST" action="">
    <label>Nom d'utilisateur :
        <input type="text" name="username">
    </label><br><br>

    <label>Mot de passe :
        <input type="password" name="password">
    </label><br><br>

    <input type="submit" value="Se connecter">
</form>

<?php
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "John" && $password === "Rambo") {
        echo "C’est pas ma guerre";
    } else {
        echo "Votre pire cauchemar";
    }
}
?>

</body>
</html>
