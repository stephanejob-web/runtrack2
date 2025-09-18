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
    $str = "On n’est pas le meilleur quand on le croit mais quand on le sait";
    $newStr = strtolower(str_replace([' ', ',', "'", "’"], '', $str));
    echo $newStr;
    $dict = ["consonnes" => 0, "voyelles" => 0];

    for ($i = 0; $i < strlen($newStr); $i++) {
        if (in_array($newStr[$i], $voyelles)) {
            $dict["voyelles"]++;
        } else {
            $dict["consonnes"]++;
        }
    }
    ?>
    <h1 class='is-size-1 has-text-success'>  <?php echo $newStr ?> </h1>.<br>";
    <table class="table">
        <thead>
        <tr>
            <th> Consonnes</th>
            <th>Voyelles</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <tr>
            <th><?php echo $dict["consonnes"] ?></th>
            <td><?php echo $dict["voyelles"] ?></td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>



