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
    $voyelles = ["a","o","i","e","u"];
      $str = "I'm sorry Dave I'm afraid I can't do that.";
      $transformeMajusculeToMinuscule=strtolower($str);

      for ($j = 0; $j < 12;$j++)  {
          if ($transformeMajusculeToMinuscule === $voyelles[$j]){

          }
      }

    ?>
</div>

</body>
</html>



