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
<div style="display: flex;justify-content: center;align-items: center;min-height: 100vh" class="container">
    <?php
    $str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";
    $tt = "";
    for ($i = 1; $i < strlen($str); $i += 2) {
        if (isset($i)) {
            $tt .= $str[$i];
        }
}
    echo "<h1 class='is-size-1 has-text-success'>{$tt}</h1>";
    ?>
</div>

</body>
</html>



