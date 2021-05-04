<div class="button-show row justify-content-center">
    <div class="col-md-3">
        <button class="col-md-12 btn btn-dark" id="btn-show">Show Doughnut</button>
    </div>
</div>

<div class="row justify-content-around">
    <?php for($i = 0; $i < count($dataForTables); $i++): ?>
        <div class="col-md-5">
            <div class="table-dat-wrapper">
                <table class="table-data">
                    <?php foreach ($dataForTables[$i] as $key => $value): ?>
                        <?php if($key === 'title'): ?>
                            <div class="title"><?= $value ?></div>
                        <?php endif; ?>
                        <?php if($key === 'sub-title'): ?>
                            <div class="sub-title"><?= $value ?></div>
                        <?php endif; ?>
                            <?php if(gettype($key) === 'integer'): ?>
                                <tr class="row-sum">
                                    <td><?= $key ?> рік</td>
                                    <td><?= array_sum($value) ?> млн.</td>
                                </tr>
                                <?php $count = 0 ?>
                                <?php foreach($value as $quantity): ?>
                                    <tr>
                                        <td>Квартал №<?= ++$count ?></td>
                                        <td><?= $quantity ?> млн.</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="data-canvas col-md-12" style= "height: 400px">
                <canvas class="charts" width="100%" height="70%"></canvas>
            </div>
        </div>
    <?php endfor; ?>
</div>
