<?php

declare(strict_types=1);

// Реалізація флага, якщо коректно введені дані, то форма перестає відображатися, і сторінка переходить на наступний крок
function checkForm(): bool
{
    $flag = true;

    if (isset($_POST['contents-notes'])) {
        if (mb_strlen(trim($_POST['contents-notes'])) > 1) {
            $flag = false;
        }
    }

    return $flag;
}


function generateIdFiles(string $str): string
{
    $toDay = date('Y-m-d H:i:s');
    $hash = hash('sha1', $toDay . $str);
    $nameFile = sprintf('%s%s.txt', PATH_DATA_BASE, $hash);

    file_put_contents($nameFile, $str);

    return $hash;
}

function fileAndHashComparison(string $path, string $hash): void
{
    $arrayFiles = array_diff(scandir($path, SCANDIR_SORT_NONE), array('..', '.'));

    foreach ($arrayFiles as $nameFile) {
        $findHash = mb_substr($nameFile, 0, $GLOBALS['countSymbolsInSha1']);

        if ($findHash === $hash) {
            $findedFile = sprintf('%s%s', $path, $nameFile);

            $GLOBALS['getContentsFile'] = file_get_contents($findedFile);
            unlink($findedFile);
            return;
        }
    }

    error_log('No hash found!');
    header('Location: index.php?fail-hash=2');
    exit;
}
