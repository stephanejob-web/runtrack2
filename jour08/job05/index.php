<?php
function inverseBool($valeur) {
    return !$valeur;
}

// Récupération ou initialisation du plateau
$board = isset($_POST['board']) ? str_split($_POST['board']) : array_fill(0, 9, '-');
// Récupération du tour
$tour = isset($_POST['tour']) ? filter_var($_POST['tour'], FILTER_VALIDATE_BOOLEAN) : true;

// Si un bouton est cliqué
if (isset($_POST['cell'])) {
    $cell = (int)$_POST['cell'];
    if ($board[$cell] === '-') {
        $board[$cell] = $tour ? 'O' : 'X';
        $tour = inverseBool($tour);
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Grille Morpion</title>
    <style>
        :root {
            --cell-size: 110px; --gap: 10px; --bg: #0b1220;
            --btn: #0f172a; --btn-hover: #18233c; --btn-active: #0b1327;
            --text: #e5e7eb; --radius: 16px; --shadow: 0 10px 25px rgba(0,0,0,.35);
        }
        html, body {
            height: 100%; margin: 0; background: var(--bg);
            display: grid; place-items: center; color: var(--text);
            font-family: sans-serif;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(3, var(--cell-size));
            grid-template-rows: repeat(3, var(--cell-size));
            gap: var(--gap);
        }
        .cell {
            background: var(--btn);
            border-radius: var(--radius);
            font-size: 42px;
            font-weight: 700;
            color: var(--text);
            cursor: pointer;
        }
        .cell:hover { background: var(--btn-hover); }
        .cell:active { background: var(--btn-active); }
    </style>
</head>
<body>
<header>Grille de Morpion (3×3)</header>

<form action="" method="post">
    <div class="board">
        <button type="submit" class="cell" name="cell" value="0"><?= $board[0] ?></button>
        <button type="submit" class="cell" name="cell" value="1"><?= $board[1] ?></button>
        <button type="submit" class="cell" name="cell" value="2"><?= $board[2] ?></button>

        <button type="submit" class="cell" name="cell" value="3"><?= $board[3] ?></button>
        <button type="submit" class="cell" name="cell" value="4"><?= $board[4] ?></button>
        <button type="submit" class="cell" name="cell" value="5"><?= $board[5] ?></button>

        <button type="submit" class="cell" name="cell" value="6"><?= $board[6] ?></button>
        <button type="submit" class="cell" name="cell" value="7"><?= $board[7] ?></button>
        <button type="submit" class="cell" name="cell" value="8"><?= $board[8] ?></button>
    </div>

    <!-- Sauvegarde état -->
    <input type="hidden" name="board" value="<?= implode('', $board) ?>">
    <input type="hidden" name="tour" value="<?= $tour ? 'true' : 'false' ?>">
</form>

</body>
</html>
