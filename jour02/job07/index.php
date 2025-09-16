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
<div>
    <?php
   function triangle($hauteur) {
    echo "<pre>"; // garde les espaces et retours à la ligne
    for ($i = 1; $i <= $hauteur; $i++) {
        $espaces = str_repeat(" ", $hauteur - $i);
        $diese   = str_repeat("#", 2 * $i - 1);
        echo $espaces . $diese . "\n";
    }
    echo "</pre>";
    }

    triangle(3);
    ?>
    </div>
</body>
</html>
