<?php

	ini_set('display_errors', true);
	ini_set('log_errors', true);
	ini_set('error_log', __DIR__ . '/storage/logs/app.log');

	error_reporting(E_ALL);

	require_once __DIR__ . '/config/i18n.php';
	require_once __DIR__ . '/config/params.php';
	require_once __DIR__ . '/config/functions.php';
