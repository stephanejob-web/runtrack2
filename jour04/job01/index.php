<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css"
    >
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <title>Formulaire GET</title>
    <style>
        .is-min-fullheight {
            min-height: 100vh;
        }
    </style>
</head>
<body>

<div class="is-min-fullheight is-flex is-flex-direction-column is-justify-content-center is-align-items-center"
">
<form method="get" action="" class="box" style="max-width: 400px; width: 100%;">
    <div class="field">
        <label class="label">Name</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="name" placeholder="Name" value="">
            <span class="icon is-small is-left">
                      <i class="fas fa-user"></i>
                </span>
        </div>
    </div>

    <div class="field">
        <label class="label">Username</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="username" placeholder="Username" value="">
            <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
            <span class="icon is-small is-right">
          <i class="fas fa-check"></i>
        </span>
        </div>
    </div>

    <div class="field is-grouped is-justify-content-center">
        <div class="control">
            <button type="submit"  class="button is-primary">Envoyer</button>
        </div>
    </div>
</form>

<?php
$email = "toto";
$username = "toto";

if (!empty($_GET['name']) && !empty($_GET['username'])) {
    if ($_GET['name'] === $email && $_GET['username'] === $username) {
        echo '<div class="notification is-success">
                <button class="delete"></button>
                mot de passe correct
              </div>';
    } else {
        echo '<div class="notification is-danger">
                <button class="delete"></button>
                mot de passe incorrect
              </div>';
    }
}
if (isset($_GET['name']) || isset($_GET['username'])) {
    echo '<div class="notification is-info" style="max-width:400px; width:100%;">';
    echo "Le nombre d’argument GET envoyé est : " . count($_GET) . "<br>";

    if (isset($_GET['name'])) {
        echo "name : " . $_GET['name'] . "<br>";
    }
    if (isset($_GET['username'])) {
        echo "username : " . $_GET['username'] . "<br>";
    }
    echo '</div>';
}
?>
</body>
</html>
