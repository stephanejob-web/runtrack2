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
    for ($i = 1; $i <= 1337; $i++) {
        if ($i == 26 || $i == 37 || $i == 88 || $i == 1111) {
           continue;
        }
        echo "<h1 class='is-size-1 has-text-warning'>" . $i . "</h1>";
    }
    ?>
</div>
</body>
</html>