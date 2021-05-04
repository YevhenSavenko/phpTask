<?php

	// action=getjson
	if (isset($_GET['action'])) {
		if ('getjson' == $_GET['action']) {
			header('Content-Type: application/json');
			echo file_get_contents(__DIR__.'/JSON/data.json');
			exit;
		}
	}
	
	if(isset($_POST['submit-file'])){
		require_once __DIR__ . '/controllers/UploadFileController.php';
	}

	if(isset($_GET['status']) && $_GET['status'] === 'ok'){
		require_once __DIR__ . '/controllers/СonsiderationController.php';
	}

