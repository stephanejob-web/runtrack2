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

            <?php if ($p['quantity'] > 0): ?>
                <p class="has-text-success">En stock : <?= (int)$p['quantity'] ?></p>
            <?php else: ?>
                <p class="has-text-danger">Rupture de stock</p>
            <?php endif; ?>
        </div>
    </div>
</div>
