<?php

if (mb_strlen($_GET['hash']) !== $GLOBALS['countSymbolsInSha1']) {
    $errorMessage = sprintf('The hash [%s] does not match the correctness!', $_GET['hash']);
    error_log($errorMessage);
    header('Location: index.php?fail-hash=1');
    exit;
}

fileAndHashComparison(PATH_DATA_BASE, $_GET['hash']);
