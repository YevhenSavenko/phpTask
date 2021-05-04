<section class="cart">
    <div class="cart__wrapper">
        <?php if ((isset($_SESSION['cart']['products']) && (count($_SESSION['cart']['products']) > 0)) && is_array($_SESSION['cart']['products'])) : ?>
            <div class="cart__group">
                <div>
                    <h1 class="cart__title">Shopping Cart: </h1>
                    <div class="cart__titles-table">
                        <div class="cart__item-wrapper">
                            Book
                        </div>
                        <div class="cart__inputs cart__align">
                            Quantity
                        </div>
                        <div class="cart__price">
                            Price
                        </div>
                        <div class="cart__total">
                            Total
                        </div>
                    </div>

                    <form action="index.php?action=recalculate" method="POST">
                        <div class="cart__items">
                            <?php foreach ($_SESSION['cart']['products'] as $id => $quantity) : ?>
                                <?php if (array_key_exists($id, $products)) : ?>
                                    <div class="cart__item">
                                        <div class="cart__item-wrapper">
                                            <div class="cart__item-image">
                                                <img src="<?= $products[$id]['imageLink'] ?>" alt="">
                                            </div>
                                            <div class="cart__info-product">
                                                <div class="cart__info-title">
                                                    <?= $products[$id]['title'] ?>
                                                </div>
                                                <div class="cart__info-author">
                                                    <?= $products[$id]['author'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart__inputs">
                                            <div>
                                                <input type="hidden" name="p[id][]" value="<?= $id ?>">
                                            </div>
                                            <div class="cart__info-quantity">
                                                <div class="cart__quantity-wrapper">
                                                    <div class="cart__minus"> &mdash; </div>
                                                    <input type="number" name="p[qty][]" value="<?= $quantity ?>" size="5" readonly>
                                                    <div class="cart__plus"> + </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart__price">
                                            <span><?= $currency . ' ' . $products[$id]['price'] ?></span>
                                        </div>
                                        <div class="cart__total">
                                            <span><?= $currency . ' ' . ($products[$id]['price'] * $quantity) ?></span>
                                        </div>
                                        <div class="cart__delete">
                                            <a href="index.php?action=delete&id=<?= $id ?>">
                                                <img src="<?= "$host/img/cart/large-basket.png" ?>" alt="basket">
                                            </a>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>

                            <div class="cart__buttons">
                                <input class="cart__btn" type="submit" value="Recalculate" name="recalculate">
                                <div class="cart__reset">
                                    <a href="index.php?action=reset" class="cart__btn cart__reset-link">reset cart</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="cart__total-block">
                    <h1 class="cart__title">Total: </h1>
                    <div class="cart__total-info">
                        <div class="cart__row">
                            <span class="cart__flags">Quantity:</span> <span class="cart__output"><?= $quantityProducts ?></span>
                        </div>
                        <div class="cart__row">
                            <span class="cart__flags">Subtotal:</span> <span class="cart__output"><?= $currency ?> <?= $totalPrice ?></span>
                        </div>
                    </div>
                    <div class="cart__route">
                        <div class="cart__index">
                            <a href="/" class="cart__btn">Continue Shopping</a>
                        </div>
                        <div class="cart__pay">
                            <a href="index.php?action=details" class="cart__btn cart__reset-link cart__route-link">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <h1 class="cart__title">Shopping Cart: </h1>
            <div class="cart__empty">
                <h2>your cart is empty</h2>
                <div class="cart__link-home">
                    <a href="/">Go to catalog</a>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>