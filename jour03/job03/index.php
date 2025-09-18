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
<div style="display: flex;justify-content: center;align-items: center;min-height: 100vh;flex-direction: column"
     class="container">
    <?php
    $voyelles = ["a", "o", "i", "e", "u"];
    $str = "I'm sorry Dave I'm afraid I can't do that.";
    $newStr = strtolower($str);
    $counter = 0;
    for ($i = 0; $i < strlen($newStr); $i++) {
        if (in_array($newStr[$i], $voyelles)) {
            echo "<div style='display: flex'>
<h1 class='is-size-1 has-text-success'> $newStr[$i] </h1></div>";
            $counter++;
        }

    }
    echo "<h1 class='is-size-1 has-text-success'> il y'a $counter voyelles dans la phrase </h1>.<br>";
    echo "<h1 class='is-size-1 has-text-success'> $str </h1>.<br>";

    ?>
</div>

</body>
</html>



