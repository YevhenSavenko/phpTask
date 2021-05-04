<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .status-ok {
            color: green;
        }

        .status-error {
            color: #cb4e52;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <?php if ($arraySorted) : ?>
                <h1 style="color: #cb4e52; margin: 10px 0 25px;">TOP-500 Most Popular Domains</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Domain</th>
                            <th scope="col">IP-address</th>
                            <th scope="col">Rank</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0 ?>
                        <?php foreach ($arraySorted as $value) : ?>
                            <?php $status = addStatusResponsive($value['domain']) ?>
                            <tr scope="row">
                                <td><?= ++$count ?></td>
                                <td><span style="color: blue"><?= $value['domain'] ?></span></td>
                                <td><?= gethostbyname($value['domain']) ?></td>
                                <td><span style="color: #cb4e52"><?= $value['rating'] ?></span></td>
                                <td class="<?= $status === 200 ? 'status-ok' : 'status-error' ?>"><?= $status === 200 ? "{$status} OK" : "{$status} ERR " ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>