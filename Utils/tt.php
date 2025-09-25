<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
            "prenom"   => "Laurent",
            "age"      => 35,
            "role"     => "user",
            "compteur" => 0,
            "panier"   => []
    ];
}

/* 1) Définir les produits AVANT d'y accéder */
$produits = [
        "Laptop" => [
                "titre" => "Ordinateur Portable HP 15",
                "desc"  => "Intel i5, 8 Go RAM, SSD 512 Go"
        ],
        "Souris" => [
                "titre" => "Souris Logitech M185",
                "desc"  => "Souris sans fil, USB nano-récepteur"
        ],
        "Clavier" => [
                "titre" => "Clavier mécanique Corsair K55",
                "desc"  => "Touches rétroéclairées RGB, AZERTY"
        ],
        "Ecran" => [
                "titre" => "Écran Dell 24 pouces",
                "desc"  => "Full HD, 75 Hz, HDMI + DisplayPort"
        ],
        "Casque" => [
                "titre" => "Casque Gaming HyperX Cloud II",
                "desc"  => "Son surround 7.1, micro antibruit"
        ],
        "Disque" => [
                "titre" => "Disque SSD Samsung 1 To",
                "desc"  => "NVMe M.2, vitesse 3500 Mo/s"
        ],
        "USB" => [
                "titre" => "Clé USB SanDisk 64 Go",
                "desc"  => "USB 3.1, vitesse de transfert rapide"
        ],
        "Imprimante" => [
                "titre" => "Imprimante Canon Pixma",
                "desc"  => "Jet d’encre couleur, Wi-Fi, recto-verso"
        ],
];
/* 2) Ajouter au panier */
if (isset($_POST['article']) && isset($produits[$_POST['article']])) {
    $_SESSION['user']['panier'][] = $produits[$_POST['article']];
}

/* 3) Autres actions */
if (isset($_POST['increment']))    $_SESSION['user']['compteur']++;
if (isset($_POST['desincrement'])) $_SESSION['user']['compteur']--;
if (isset($_POST['changer_role'])) $_SESSION['user']['role'] = "admin";
if (isset($_POST['vider']))        $_SESSION['user']['panier'] = [];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Document</title>
</head>
<body>
<pre><?php var_dump($_SESSION); ?></pre>

<h1>Bonjour <?= htmlspecialchars($_SESSION['user']['prenom']) ?></h1>
<p>Âge : <?= (int)$_SESSION['user']['age'] ?></p>
<p>Rôle : <?= htmlspecialchars($_SESSION['user']['role']) ?></p>
<h2>Compteur : <?= (int)$_SESSION['user']['compteur'] ?></h2>

<form method="post">
    <button type="submit" name="increment">+1</button>
    <button type="submit" name="desincrement">-1</button>
    <button type="submit" name="changer_role">Devenir Admin</button>
</form>

<h2>🛒 Panier</h2>
<?php if (empty($_SESSION['user']['panier'])): ?>
    <p>Panier vide</p>
<?php else: ?>
    <ul>
        <?php foreach ($_SESSION['user']['panier'] as $article): ?>
            <li><strong><?= htmlspecialchars($article['titre']) ?></strong> - <?= htmlspecialchars($article['desc']) ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post">
        <button type="submit" name="vider">Vider le panier</button>
    </form>
<?php endif; ?>

<h2>🛍️ Produits disponibles</h2>
<?php foreach ($produits as $key => $article): ?>
    <div class="card" style="border:1px solid #ccc;padding:10px;margin:6px;display:inline-block;width:180px;">
        <h3><?= htmlspecialchars($article['titre']) ?></h3>
        <p><?= htmlspecialchars($article['desc']) ?></p>
        <form method="post">
            <button type="submit" name="article" value="<?= htmlspecialchars($key) ?>">Ajouter</button>
        </form>
    </div>
<?php endforeach; ?>
</body>
</html>
