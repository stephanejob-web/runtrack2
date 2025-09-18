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
<?php
$str = "Les choses que l'on possède finissent par nous posséder";
$reverse ="";
for ($i = strlen($str); $i >= 0; $i--) {
    if (isset($str[$i])) {
        $reverse .= $str[$i];
    }
}
echo "<h1 class='is-size-1 has-text-success'>" . $reverse . "</h1>";


?>
</body>
</html>



