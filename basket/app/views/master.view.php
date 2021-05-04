<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "$host/style/main.css" ?>">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__part">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-4">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img class="header__logo" src="<?= "$host/img/header/logo.png" ?>" alt="">
                            </div>
                            <div class="col-md-9">
                                <h1 class="header__title">
                                    Books Market
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a class="header__cart-link" href="index.php?action=cart">
                            <div class="header__mini-basket">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="header__basket-image">
                                            <img src="<?= "$host/img/header/basket.png" ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="header__basket-total">
                                            Cart: <span class="header__basket-number"><?= $totalPrice ?></span> <?= $currency ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <?php require_once __DIR__ . "/pages/$action.php" ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__text">
                @2021
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="<?= $host ?>/js/function.js"></script>
    <script src="<?= $host ?>/js/script.js"></script>
</body>

</html>