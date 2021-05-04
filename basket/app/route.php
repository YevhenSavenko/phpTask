<?php

if (isset($_GET['action'])) {
    $actionCart = trim($_GET['action']);

    switch ($actionCart) {
        case 'add-product':
            require_once __DIR__ . '/controllers/addProductController.php';
            break;

        case 'cart':
            $action = 'cart';
            break;

        case 'recalculate':
            require_once __DIR__ . '/controllers/recalculateCartController.php';
            break;

        case 'delete':
            require_once __DIR__ . '/controllers/deleteProductController.php';
            break;

        case 'reset':
            require_once __DIR__ . '/controllers/resetCartController.php';
            break;

        default:
            # code...
            break;
    }

    if ($actionCart === 'details') {
        require_once __DIR__ . '/controllers/detailsController.php';
    }
}
