<!doctype html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $projectHost ?>styles/main.css">
    <title>CSV files</title>
</head>
<section>
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4 status-wrapper">
                <div class="form-wrapper">
	                <?php if(isset($_GET['status'])): ?>
                        <div><?php require_once  __DIR__ . '/status.view.php' ?></div>
	                <?php endif ?>
                    <?php require_once  __DIR__ . '/form.view.php' ?>
                </div>
            </div>
        </div>

        <?php if(isset($_GET['status']) && $_GET['status'] === 'ok'): ?>
            <div class="content-tables">
                <?php require_once  __DIR__ . '/table.view.php' ?>
            </div>
        <?php endif ?>
    </div>
</section>


	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="<?= $projectHost ?>js/function.js"></script>
    <script src="<?= $projectHost ?>js/script.js"></script>
</body>
</html>