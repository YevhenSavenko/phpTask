<?php

if (isset($_POST['send-massage'])) {
    require_once __DIR__ . '/controllers/FormController.php';
}

if (isset($_GET['hash'])) {
    require_once __DIR__ . '/controllers/ShowMessageController.php';
}
