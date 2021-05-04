<?php

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'register':
            $action = 'register';
            break;

        case 'login':
            $action = 'login';
            break;

        case 'info':
            $action = 'info';
            break;

        default:
            # code...
            break;
    }
}

if (isset($_POST['register'])) {
    require_once __DIR__ . '/controllers/register.controller.php';
}

if (isset($_POST['sign-in'])) {
    require_once __DIR__ . '/controllers/login.controller.php';
}
