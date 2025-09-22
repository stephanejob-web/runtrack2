<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dessiner une maison</title>
</head>
<body>

<!-- Formulaire -->
<form method="POST" action="">
    <label>Largeur : <input type="text" name="largeur"></label><br><br>
    <label>Hauteur : <input type="text" name="hauteur"></label><br><br>
    <input type="submit" value="Construire la maison">
</form>

<pre>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $largeur = (int) $_POST['largeur'];
    $hauteur = (int) $_POST['hauteur'];

    if ($largeur > 1 && $hauteur > 1) {
        // --- TOIT ---
        for ($i = 1; $i <= $hauteur; $i++) {
            // espaces avant le toit
            echo str_repeat(" ", $hauteur - $i);
            // toit
            echo "/";
            echo str_repeat("_", ($i - 1) * 2);
            echo "\\";
            echo "\n";
        }

        // --- MURS ---
        for ($j = 0; $j < $hauteur; $j++) {
            echo "|";
            echo str_repeat(" ", $largeur);
            echo "|";
            echo "\n";
        }

        // --- BASE ---
        echo str_repeat("-", $largeur + 2);
    } else {
        echo "Veuillez entrer des valeurs valides (supérieures à 1).";
    }
}
?>
</pre>

</body>
</html>
