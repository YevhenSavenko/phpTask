<div class="row justify-content-center">
    <div class="notification notification__none row col-md-6" role="alert">
        <div class="text-center justify-content-center">
            <div class="code fs-5 fw-bold mb-3"></div>
            <div class="message fs-5 fw-bold text-uppercase"></div>
        </div>
    </div>
</div>

<div class="content_info">
    <?php if (isset($sellerInfo) && !empty($sellerInfo)) : ?>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">City</th>
                    <th scope="col" class="text-center">Commision</th>
                </tr>
            </thead>
            <tbody>
                <tr class="link_seller">
                    <th scope="row" class="id text-center"><?= $sellerInfo[0]['snum'] ?></th>
                    <td class="text-center"><?= $sellerInfo[0]['sname'] ?></td>
                    <td class="text-center"><?= $sellerInfo[0]['city'] ?></td>
                    <td class="text-center"><?= $sellerInfo[0]['commision'] ?></td>
                </tr>
            </tbody>
        </table>
        <?php if (isset($ordersInfo) && !empty($ordersInfo)) : ?>
            <h2 class="text-center text-uppercase my-5"> amount of commission</h2>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Earned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ordersInfo as $key => $value) : ?>
                        <tr class="link_seller">
                            <th scope="row" class="text-center"><?= $value['odate'] ?></th>
                            <td class="text-center">$<?= $value['sum'] ?></td>
                            <td class="text-center">$<?= $value['total'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="errors_message">
                This seller has no sales
            </div>
        <?php endif ?>
    <?php else : ?>
        <div class="errors_message">
            There is no such seller
        </div>
    <?php endif ?>
    <?php if (isset($sellerInfo) && !empty($sellerInfo)) : ?>
        <div class="row justify-content-center mt-5">
            <button class="col-md-4 btn btn-dark text-uppercase fw-bold fs-5 py-2" id="btn">Fire the seller</button>
        </div>
    <?php endif ?>
</div>