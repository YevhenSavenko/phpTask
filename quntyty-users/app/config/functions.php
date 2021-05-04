<?php
	function checkFileDownload(){
		$arrayErrors = [];

		for($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++){
			$arrayErrors[] = $_FILES['userfile']['error'][$i];
		}

		return $arrayErrors;
	}

	function fileMoved($array){
		for($i = 0; $i < count($array); $i++){
			if($array[$i] !== 0){
				$errorMessage = sprintf('%s - Errors: File upload problems!!!', date('Y-m-d H:i:s'));
				error_log($errorMessage);
				return;
			}
		}

		for($i = 0; $i < count($array); $i++) {
			$hashedFileName = sha1_file($_FILES['userfile']['tmp_name'][$i]);
			$newFilePath = sprintf('%s%s.csv', __DIR__ . '/../storage/uploads/', $hashedFileName);

//			if(file_exists($newFilePath)){
//				header('Location: index.php?status=error');
//				exit();
//			} else {
				move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $newFilePath);
//			}
		}

		header('Location: index.php?status=ok');
		exit();
	}

	function definePathForFiles(){
		$arrayPath = [];
		$dir = __DIR__ . '/../storage/uploads/';
		$pathFoldersWithFiles = array_diff(scandir($dir), array('..', '.'));

		foreach ($pathFoldersWithFiles as $value){
			$arrayPath[] = sprintf('%s%s', $dir, $value);
		}

		return $arrayPath;
	}

	function crusherArrays($ways){
		$data = [];

		for($i = 0; $i < count($ways); $i++) {
			$rows = explode(PHP_EOL, file_get_contents($ways[$i]));

			if (is_array($rows) && count($rows) > 0) {
				$title = array_shift($rows);
				$subTitle = array_shift($rows);

				$data[$i] = [
					'title' => $title,
					'sub-title' => $subTitle,
				];



				foreach ($rows as $key => $valueRow) {
					list($dataLabel, $value) = explode(',', trim($valueRow));
					list($quarter, $year) = explode(':', $dataLabel);

					$data[$i][$year][$quarter] = $value;
				}
			}
		}

		return $data;
	}

	function JSONParse($array){
		if($array){
			$dataResult = [];
			for($i = 0; $i < count($array); $i++){
				$count = 0;
				foreach ($array[$i] as $key => $value){
					if(gettype($key) === 'integer'){
						$dataResult[$i][$count] = [
							'year' => $key,
							'quantity' => array_sum($value),
						];

						$count++;
					}
				}
			}

			return $dataResult;
		} else {
			$errorMessage = sprintf('%s - Warning: Array does not exist!!!', date('Y-m-d H:i:s'));
			error_log($errorMessage);
			return 0;
		}
	}
