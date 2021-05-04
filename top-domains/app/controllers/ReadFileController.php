<?php

$arrayFiles = array_diff(scandir(PATH_TO_FOLDER), array('.', '..'));

if (count($arrayFiles) > 0) {
    $arrayDomains = decodeReadedFile($arrayFiles);
    $arrayWithoutRepetitions = array_unique_key($arrayDomains, 'domain');
    $arraySorted = array_slice(sortArrayByRating($arrayWithoutRepetitions), 0, QUANTYITY_DOMAINS);

    // $arrayOutput = addStatusResponsive($arraySorted);
} else {
    error_log('No files found in directory');
    return;
}
