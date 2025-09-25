<?php
session_start(); // Démarre la session

// Si on clique sur reset → on vide la liste
if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = [];
}

// Si la liste n’existe pas encore → on la crée
if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}

// Si un prénom est envoyé → on l’ajoute dans la session
if (isset($_POST['prenom']) && $_POST['prenom'] !== '') {
    $_SESSION['prenoms'][] = $_POST['prenom'];
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste de prénoms</title>
</head>
<body>
<h1>Ajouter un prénom</h1>

<!-- Formulaire pour ajouter un prénom -->
<form method="post">
    <input type="text" name="prenom" placeholder="Écris un prénom">
    <button type="submit">Ajouter</button>
</form>

<!-- Formulaire pour reset -->
<form method="post">
    <button type="submit" name="reset">Reset</button>
</form>

<h2>Liste des prénoms :</h2>
<ul>
    <?php foreach ($_SESSION['prenoms'] as $p): ?>
        <li><?= htmlspecialchars($p) ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
