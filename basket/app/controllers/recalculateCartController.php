<?php

if (isset($_POST['p']['id']) && isset($_POST['p']['qty'])) {
    $_SESSION['cart']['products'] = array_combine(
        array_values($_POST['p']['id']),
        array_values($_POST['p']['qty']),
    );

    $quantityProducts = getTotalProducts();
    $totalPrice = getTotalCart();
    $action = 'cart';
}
