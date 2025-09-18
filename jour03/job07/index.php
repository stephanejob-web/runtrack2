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
    $str = "Certaines choses changent, et d'autres ne changeront jamais";
    $longeurChaine = strlen($str);
    $resultat = "";
    for($i = 1; $i < $longeurChaine; $i+=2){
        if($str[$i+1] < $longeurChaine){
           $resultat .= $str[$i+1] .$str[$i];
        }
    }
echo $resultat;


?>
</body>
</html>



