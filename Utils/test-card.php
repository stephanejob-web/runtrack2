<?php
// JSON en dur (corrigé)
$json = '[
  {
    "name": "Nike Air Force 2",
    "description": "Sneakers emblématiques en cuir blanc avec une semelle confortable",
    "price": 20,
    "image": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ce57e713-c110-492a-b271-f81f3436e1eb/AIR+FORCE+1+%2707.png",
    "quantity": 2000
  },
  {
    "name": "Nike Air Max 90",
    "description": "Chaussures rétro avec amorti Air visible, style streetwear",
    "price": 139.99,
    "image": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/57cc4b7d-065e-4417-b7b2-46db937998ce/AIR+FORCE+1+%2707+LV8.png",
    "quantity": 200
  },
  {
    "name": "Nike Dunk Low",
    "description": "Modèle classique en cuir avec un design bas et intemporel",
    "price": 119.99,
    "image": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/tjkr8ecmktw7qooy9d0h/NIKE+SHOX+TL.png",
    "quantity": 300
  },
  {
    "name": "Nike Air Zoom Pegasus 40",
    "description": "Chaussures de course avec un excellent maintien et un amorti dynamique",
    "price": 129.99,
    "image": "https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/f22a9f84-2e6b-4c97-83c7-6fdbf0f2e218/air-zoom-pegasus-40-chaussure-de-course-sur-route.png",
    "quantity": 0
  },
  {
    "name": "Nike Blazer Mid Vintage",
    "description": "Baskets montantes au style rétro des années 70",
    "price": 99.99,
    "image": "https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/ed5c1f59-6c7e-46e0-a733-9f45fbcccd92/blazer-mid-77-vintage-chaussure.png",
    "quantity": 10
  },
  {
    "name": "Nike React Infinity Run Flyknit",
    "description": "Chaussures de running conçues pour réduire les blessures",
    "price": 1599999.99,
    "image": "https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/0e5cba2f-0ec4-4a20-87ae-92a72de181d6/react-infinity-run-flyknit-chaussure-de-course-sur-route.png",
    "quantity": 0
  },
  {
    "name": "Nike Jordan 1 Retro High",
    "description": "Sneakers légendaires de la gamme Air Jordan, style basket iconique",
    "price": 179.99,
    "image": "https://d1fufvy4xao6k9.cloudfront.net/images/landings/421/3-4.jpg",
    "quantity": 200
  },
  {
    "name": "Nike React Infinity Run Flyknit",
    "description": "Chaussures de running conçues pour réduire les blessures",
    "price": 159.99,
    "image": "https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/0e5cba2f-0ec4-4a20-87ae-92a72de181d6/react-infinity-run-flyknit-chaussure-de-course-sur-route.png",
    "quantity": 200
  },
  {
    "name": "Nike Jordan 1 Retro High",
    "description": "Sneakers légendaires de la gamme Air Jordan, style basket iconique",
    "price": 179.99,
    "image": "https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/c1c06f2e-b16b-46fb-bd2a-2d6c53ac66d6/air-jordan-1-retro-high-og-chaussure.png",
    "quantity": 0
  }
]';

// Décode + gestion d’erreur lisible en dev
try {
    $products = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
} catch (Throwable $e) {
    die('Erreur JSON : ' . htmlspecialchars($e->getMessage()));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">Catalogue</h1>
        <div class="columns is-multiline">

            <?php foreach ($products as $p): ?>
            <?php if ($p['quantity'] > 0): ?>
                <div class="column is-3">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                            </figure>
                        </div>
                        <div class="card-content">
                            <p class="title is-5"><?= htmlspecialchars($p['name']) ?></p>
                            <p class="subtitle is-6"><?= number_format((float)$p['price'], 2, ',', ' ') ?> €</p>
                            <p><?= htmlspecialchars($p['description']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</body>
</html>


<?php //include 'card.php'; ?>