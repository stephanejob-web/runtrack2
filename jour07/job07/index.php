<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label>
        <input type="text" placeholder="du texte" name="text">
    </label><br>
    <label>
        <select name="style">
            <option value="">Change le texte en</option>
            <option value="gras">Gras</option>
            <option value="cesar">Cesar</option>
            <option value="plateforme">plateforme</option>
        </select>
    </label>
    <button type="submit">Valider</button>
</form>
<?php
function strToBold($text): string
{
    return "<b>" . htmlspecialchars($text) . "</b>";
}

function cesar($str, $decalage): string
{
    $alphabet = range('a', 'z');
    $result = '';
    $str = strtolower($str);

    foreach (str_split($str) as $ch) {
        $pos = array_search($ch, $alphabet, true);
        if ($pos !== false) {
            $result .= $alphabet[($pos + $decalage) % 26];
        } else {
            $result .= $ch;
        }
    }
    return '<div class="notification is-danger">' . htmlspecialchars($result) . '</div>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $style = $_POST['style'] ?? '';
    $texte = $_POST['text'] ?? ' ';
    if ($style === "gras") {
        echo strToBold($texte);
    } elseif ($style === "cesar") {
        echo cesar($texte,2);
    } elseif ($style === "plateforme") {
        echo '<div class="notification is-danger">Tu as choisi plateforme</div>';
    }
}
?>

</body>
</html>