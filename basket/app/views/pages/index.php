<section class="catalog">
    <?php foreach ($products as $id => $product) : ?>
        <div class="card border-secondary mb-3 catalog__card">
            <div class="card-header catalog__cart-header">Author: <?= $product['author'] ?></div>
            <div class="card-body text-secondary">
                <h5 class="card-title catalog__card-title"><?= $product['title'] ?></h5>
                <img class="catalog__image" src="<?= $product['imageLink'] ?>" alt="Photos">
                <p class="card-text catalog__cart-price"><?= $product['price'] . ' ' .  $currency ?></p>
                <div class="catalog__cart-button">
                    <a href="/index.php?action=add-product&id=<?= $id ?>" type="button" class="btn btn-secondary catalog__add">To basket</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <div class="catalog__modal <?= $cssControlModal ?>">
        <div class="catalog__info">
            <div class="catalog__check"></div>
            <div class="catalog__quantity"><?= $quatityInfoCart ?></div>
        </div>
        <div class="catalog__link">
            <a href="index.php?action=cart">Show my cart</a>
        </div>
    </div>
</section>