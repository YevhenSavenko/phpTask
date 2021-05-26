<?php

use Core\DB;

ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/paramsDB.php';
require_once __DIR__ . '/config/paramsDir.php';

define('BASE_URL', 'http://localhost:8080/');

Core\App::run();
