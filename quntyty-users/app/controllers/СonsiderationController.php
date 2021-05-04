<?php
	$arrayPath = definePathForFiles();
	$dataForTables = crusherArrays($arrayPath);


	$dataResult = JSONparse($dataForTables);
	$path = __DIR__ . '/../JSON/data.json';
	$current = file_get_contents($path);
	$current = json_encode($dataResult);
	file_put_contents($path, $current);
