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

       $str = "Dans l'espace, personne ne vous entend crier";
        $newStr =  str_replace([' ', ','], '', $str);
       $count = 0;
       for ($i = 0; $i < strlen($newStr); $i++) {
           $count++;
       }

        //REFACTORING
        //$str = "Dans l'espace, personne ne vous entend crier";
        //$count = strlen(str_replace([' ', ','], '', $str));

    echo "<h1 class='is-size-1 has-text-success'> il y'a <span  style='font-size: 15rem' class='message is-primary '>$count</span> caratéres </h1>.<br>";
    echo "<h1 class='is-size-1 has-text-success'>  $str  </h1>.<br>";
    ?>
</div>

</body>
</html>



