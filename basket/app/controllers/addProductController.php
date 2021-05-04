<?php

if (isset($_GET['id'])) {
    $productId = (int)$_GET['id'];

    if (isset($_SESSION['cart']['products'])) {
        $idsProductCart = array_keys($_SESSION['cart']['products']);

        if (in_array($productId, $idsProductCart)) {
            $_SESSION['cart']['products'][$productId]++;
        } else {
            $_SESSION['cart']['products'][$productId] = 1;
        }

        $quatityInfoCart = getMessageAboutTotal(getTotalProducts());
        $totalPrice = getTotalCart();

        $cssControlModal = 'modal__show';
    }
}
