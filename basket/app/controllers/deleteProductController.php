<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['cart']['products'][$id]);

    $quantityProducts = getTotalProducts();
    $totalPrice = getTotalCart();
    $action = 'cart';
}
