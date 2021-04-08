<?php

use classes\{Random, UserEN, UserUA, UserRU};

require_once __DIR__ . '/vendor/autoload.php';
$code = require_once __DIR__ . '/data/codesUA.php';

$quantity = $argv[1];
$user = '';

switch ($argv[2]) {
    case 'en_US':
        $user = new UserEN();
        break;
    case 'ru_RU':
        $user = new UserRU();
        break;
    case 'uk_UA':
        $user = new UserUA($code);
        break;
}

for ($i = 0; $i < $quantity; $i++) {
    $user->getInfo();
}
