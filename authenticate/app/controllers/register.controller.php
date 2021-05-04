<?php

if (empty(trim($_POST['email'])) || empty(trim($_POST['password']) || empty(trim($_POST['confirm-password'])))) {
    header('Location: index.php?action=register&status=novalid');
    exit;
}

if (trim($_POST['password']) !== trim($_POST['confirm-password'])) {
    header('Location: index.php?action=register&status=password-not-confirmed');
    exit;
}

$newUserEmail = checkEmail(trim($_POST['email']));
$newUserPassword = checkPassword(trim($_POST['password']));

$newHashUserPassword = hashingPassword($newUserPassword);
redisterNewUser($newUserEmail, $newHashUserPassword);
