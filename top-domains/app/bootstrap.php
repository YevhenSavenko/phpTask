<?php

set_time_limit(0);

ini_set('memory_limit', -1);
ini_set('display_errors', true);
ini_set('log_errors', true);
ini_set('error_log', __DIR__ . '/storage/logs/app.log');

error_reporting(E_ALL);

require_once __DIR__ . '/config/function.php';
require_once __DIR__ . '/config/params.php';
