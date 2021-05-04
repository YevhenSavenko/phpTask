<?php

if (isset($_POST['contents-notes'])) {
    if (mb_strlen(trim($_POST['contents-notes'])) < 1) {

        error_log('The textarea is empty!');
        header('Location: index.php?status=error');
        exit;
    }
}

$hashNameFile = generateIdFiles($_POST['contents-notes']);
