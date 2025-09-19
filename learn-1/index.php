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
<style>
    .sqaure{
        width: 200px;
        height: 200px;
        border: 1px solid #000;
        background: #ffffff;
        display:flex;
        flex-direction: row;

    }
</style>





<?php
    for ($compteur = 0 ; $compteur <= 100 ; $compteur++) {
        echo '
<div>
 <div class="sqaure">.$compteur."</div>
</div>
   
';


    }
?>

</body>
</html>