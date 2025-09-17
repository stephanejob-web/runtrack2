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
    $nombres = [ 200, 204, 173, 98, 171, 404, 459];
    foreach ($nombres as $nombre) {
        if ($nombre %2 == 0) {
            echo "<h1 class='is-size-1 has-text-success'>$nombre est pair</h1>"."<br>";
        }elseif ($nombre %2 == 1) {
            echo "<h1 class='is-size-1 has-text-success'> $nombre est impair</h1>"."<br>";
        }
    }
    ?>
</div>

</body>
</html>



