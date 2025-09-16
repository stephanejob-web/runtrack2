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
<div class="container">
    <?php

    for ($i = 1; $i <= 100; $i++) {
        if ($i < 20) {
            echo "<h1 class='is-size-1 is-italic'>" . $i . "</h1>";
            continue;
        }
        if ($i === 42) {
            echo "<h1 class='is-size-1 is-underlined'>La plateforme</h1>";
            continue;
        }
        if ($i >= 25 && $i <= 50) {
            echo "<h1 class='is-size-1 is-underlined'>" . $i . "</h1>";
        }
    }
    ?>
</div>
</body>
</html>