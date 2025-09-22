<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de connexion</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">Connexion</h1>

        <!-- Formulaire -->
        <form method="POST" action="">
            <div class="field">
                <label class="label">Nom d'utilisateur</label>
                <div class="control">
                    <input class="input" type="text" name="username" placeholder="Entrez votre nom d'utilisateur" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Mot de passe</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Se connecter</button>
                </div>
            </div>
        </form>

        <?php
        // Vérifier si le formulaire est soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($username === "John" && $password === "Rambo") {
                // notification verte pour succès
                echo '<div class="notification is-success">C’est pas ma guerre</div>';
            } else {
                // notification rouge pour échec
                echo '<div class="notification is-danger">Votre pire cauchemar</div>';
            }
        }
        ?>

    </div>
</section>
</body>
</html>
