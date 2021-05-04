<?php

function checkEmail($email)
{
    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!$checkEmail) {
        header('Location: index.php?action=register&status=email-error');
        exit;
    }

    return $email;
}

function checkPassword($password)
{
    $password = filter_var($password, FILTER_DEFAULT);

    if (mb_strlen($password) < 10) {
        header('Location: index.php?action=register&status=password-length');
        exit;
    }

    return $password;
}

function hashingPassword($password)
{
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($hashPassword == false) {
        header('Location: index.php?action=register&status=hash-problem');
        exit;
    }

    return $hashPassword;
}

function redisterNewUser($email, $hashPassword)
{
    $nameFile = sprintf('%s%s.json', PATH_DATA, $email);

    if (!file_exists($nameFile)) {
        file_put_contents($nameFile, json_encode(array(
            'email' => $email,
            'password' => $hashPassword,
            'dataRegister' => date('Y-m-d H:i:s'),
        )));
    } else {
        header('Location: index.php?action=register&status=user-exist');
        exit;
    }
}

function checkUser($email)
{
    $nameFile = sprintf('%s%s.json', PATH_DATA, $email);

    if (file_exists($nameFile)) {
        return json_decode(file_get_contents($nameFile), true);
    } else {
        header('Location: index.php?action=login&status=no-user');
        exit;
    }
}

function comparisonPasswordWithHash($clearPassword, $hashPassword)
{
    $check = password_verify($clearPassword, $hashPassword);

    if ($check == false) {
        header('Location: index.php?action=login&status=password-wrong');
        exit;
    }
}
