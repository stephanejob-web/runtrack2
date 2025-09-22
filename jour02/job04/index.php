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
        if ($i % 15 === 0) {
            echo "<h1 class='is-size-1'>$i est un multiple de 3 et 5 => FIZZBUZZ</h1>";
        } elseif ($i % 3 === 0) {
            echo "<h1 class='is-size-1'>$i est un multiple de 3 => FIZZ</h1>";
        } elseif ($i % 5 === 0) {
            echo "<h1 class='is-size-1'>$i est un multiple de 5 => BUZZ</h1>";
        } else {
            echo "<h1 class='is-size-1'>$i</h1>";
        }
    }
    ?>

</div>
</body>
</html>