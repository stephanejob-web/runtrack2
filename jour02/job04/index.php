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
            if ($i % 3 === 0) {
                echo "<h1 class='is-size-1 '>$i est un multiple de 3 => FIZZ </h1>";
            }
            if ($i % 5 === 0) {
                echo "<h1 class='is-size-1'>$i est un multiple de 5 => BUZZ </h1>";
            }
            if (($i % 5 === 0 and ($i % 3 === 0))) {
                echo "<h1 class='is-size-1'>$i est un multiple de 5 et de 3 => FIZZBUZZ </h1>";
            }
        }

    ?>
</div>
</body>
</html>