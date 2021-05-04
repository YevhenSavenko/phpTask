<?php

declare(strict_types=1);

function decodeReadedFile(array $arrayPath): array
{
    // Обезпечуємо себе від того що в директиві може бути більше ніж 1 файл
    $nameFile = array_shift($arrayPath);
    $resultPath = sprintf('%s%s', PATH_TO_FOLDER, $nameFile);
    $contentFromFile = file_get_contents($resultPath);
    $arrayReturned = [];

    if (substr($nameFile, -4, 4) === '.txt' || substr($nameFile, -4, 4) === '.csv') {

        if (substr($nameFile, -4, 4) === '.csv') {
            $arrayReturned = readCsvFile($resultPath);
        } else {
            $arrayReturned = readTxtFile($resultPath);
        }

        return filterReturnedArray($arrayReturned);
    } else if (substr($nameFile, -5, 5) === '.json') {
        $arrayReturned = json_decode($contentFromFile, true);
    } else if (substr($nameFile, -4, 4) === '.xml') {
        $xml_data = simplexml_load_string($contentFromFile);
        $arrayReturned = (json_decode(json_encode($xml_data), true));
    }

    return $arrayReturned;
}


function readCsvFile(string $path): array
{
    $arrayLines = [];
    $count = 0;

    if (($handle = fopen($path, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {

            // Блок if виконується тільки перший раз, щоби строку Rank,"Domain","Open Page Rank" виключити з масиву, 
            // і видалити count зразу щоби не в тілі while не прокручувати рахівник (count++)
            // як альтернативу можна було в результуючому масиві викликати ф-цію array_shift

            if (isset($count) && $count === 0) {
                unset($count);
                continue; // Перестраховуємося
            } else {
                list($rank, $domain, $rating) = $data;
                $arrayLines[] = [
                    'domain' => trim($domain),
                    'rating' => trim($rating),
                ];
            }
        }
        fclose($handle);
    } else {
        error_log('File display problems (.csv)');
    }

    return $arrayLines;
}

function readTxtFile(string $path): array
{
    $arrayLines = [];

    if (($handle = fopen($path, 'r')) !== false) {
        while (!feof($handle)) {
            list($rank, $domain, $rating) = explode(';', fgets($handle));

            $arrayLines[] = [
                'domain' => trim($domain),
                'rating' => trim($rating),
            ];
        }
        fclose($handle);
        // Видаляємо заголовок
        array_shift($arrayLines);
    } else {
        error_log('File display problems (.txt)');
    }

    return $arrayLines;
}

function filterReturnedArray(array $array): array
{
    if (is_array($array) && count($array) > 1) {
        foreach ($array as &$value) {
            if ($value['domain'] || $value['rating']) {
                $value = str_replace("\"", '', $value);
                if ($value['rating']) {
                    $value['rating'] = (float)$value['rating'];
                }
            }
        }
        unset($value);
    }

    return $array;
}

function sortArrayByRating(array $array): array
{
    if (is_array($array) && count($array) > 1) {
        function sortRank($a, $b)
        {
            if ($a['rating'] == $b['rating']) {
                return 0;
            }
            return ($a['rating'] < $b['rating']) ? 1 : -1;
        }

        usort($array, 'sortRank');
    }
    return $array;
}

// Знайдений сніпет коду https://snipp.ru/php/array-unique-multi для усунення повторення по ключу в багатомірному масиві(в нашому випадку по 'domain')
function array_unique_key(array $array, string $key): array
{
    $tmp = $key_array = array();
    $i = 0;

    foreach ($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $tmp[$i] = $val;
        }
        $i++;
    }
    return $tmp;
}

function addStatusResponsive(string $str)
{
    $html_brand = $str;
    $ch = curl_init();

    $options = array(
        CURLOPT_URL => $html_brand,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => '',
        CURLOPT_AUTOREFERER => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT => 120,
        CURLOPT_MAXREDIRS => 10,

    );

    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode) {
        return $httpCode;
    }

    // Даний return впроваджений для сайтів подібних на vk.com 
    return '(Blocked)';
}

function update()
{
    $start = time();
    $finish = $start + 10;

    for ($i = 0; true; $i++) {
        if ($finish < $start) {
            return;
        } else {
            echo $i;
        }
    }
}
