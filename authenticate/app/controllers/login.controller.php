<?php

if (empty(trim($_POST['login-email'])) || empty(trim($_POST['login-password']))) {
    header('Location: index.php?action=login&status=novalid');
    exit;
}

$arrayInfo = checkUser(trim($_POST['login-email']));
comparisonPasswordWithHash(trim($_POST['login-password']), $arrayInfo['password']);

$verifyEmail = trim($_POST['login-email']);
$verifyPassword = trim($_POST['login-password']);
