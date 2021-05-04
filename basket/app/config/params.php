<?php

define('DEFAULT_PATH', 'index');

initialSessionArray();

$host = 'http://localhost:8080';
$products = require_once __DIR__ . '/data-products.php';
$totalPrice = getTotalCart();
$quantityProducts = getTotalProducts();
$action = DEFAULT_PATH;


$cssControlModal = 'modal__first-hide';
