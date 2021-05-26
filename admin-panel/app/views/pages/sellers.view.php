<table class="sellers__table table table-striped">
    <thead>
        <tr>
            <th scope="col" class="text-center">Id</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">City</th>
            <th scope="col" class="text-center">Commision</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) : ?>
            <tr class="link_seller row-table" onclick="window.location.href='<?= \BASE_URL . 'index/info?id=' . $row['snum'] ?>'; return false">
                <th scope="row" class="text-center"><?= $row['snum'] ?></th>
                <td class="text-center"><?= $row['sname'] ?></td>
                <td class="text-center"><?= $row['city'] ?></td>
                <td class="text-center"><?= $row['commision'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>