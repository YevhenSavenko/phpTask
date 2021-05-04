<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Privnote</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="header__left">
                    <div class="header__logo">
                        <a class="header__link" href="index.php">
                            <img src="https://privnote.com/static-58c8928/style/legacy/privnote-logo.svg" alt=""><span class="header__part-of-logo">|clone</span>
                        </a>
                    </div>
                </div>
                <div class="header__right">
                    <p>
                        Посылайте записки, которые будут <br> самоуничтожены после прочтения
                    </p>
                </div>
            </div>
        </div>
    </header>

    <?php if (checkForm() && !isset($_GET['hash'])) : ?>
        <?php require_once __DIR__ . '/form.view.php' ?>
    <?php endif ?>

    <?php if (isset($GLOBALS['hashNameFile'])) : ?>
        <?php require_once __DIR__ . '/info.view.php' ?>
    <?php endif ?>

    <?php if (isset($_GET['hash'])) : ?>
        <?php require_once __DIR__ . '/show.view.php' ?>
    <?php endif ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>