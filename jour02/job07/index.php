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
    <h1 class="container is-size-1 has-text-primary has-text-centered "> JEUX DE TRIANGLE</h1>
    <input
            class="input is-large"
            type="number"
            placeholder="Large input"/>
    <?php
    $get = isset($_GET['height']) ? $_GET['height'] : 12;
   function triangle($hauteur) {
    echo "<pre>";
    for ($i = 1; $i <= $hauteur; $i++) {
        $espaces = str_repeat(" ", $hauteur - $i);
        $diese   = str_repeat("#", 2 * $i - 1);
        echo "<h1 class='is-size-1 has-text-primary '>$espaces  $diese  </h1>";
    }
    echo "</pre>";
    }
    triangle($get);
    ?>

    </div>
</body>
</html>

<script>
    let change = document.querySelector("input");
    change.addEventListener("change", function() {
        let valeur = change.value;
        console.log(valeur);
    })
</script>
