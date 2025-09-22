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
<div style="min-height: 100vh ;display: flex; justify-content: center;align-items: center; flex-direction: column">
    <h1 class="is-size-1 has-text-primary">COMING SOON</h1>
    <button class="button">
        <a href="../../index.php"> ACCEUIL</a>
    </button>
    <?php

    function estPremier($n) {
        if ($n < 2) return false;
        if ($n == 2) return true;
        if ($n % 2 == 0) return false;

        $racine = sqrt($n);
        for ($i = 3; $i <= $racine; $i += 2) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }

    for ($i = 2; $i <= 1000; $i++) {
        if (estPremier($i)) {
            echo $i . " ";
        }
    }
    ?>

</div>
</body>
</html>