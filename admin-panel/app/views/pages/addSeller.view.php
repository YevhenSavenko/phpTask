<?php if (isset($this->params['error'])) : ?>
    <div class="row justify-content-center text-center">
        <div class="alert alert-danger col-md-6" role="alert">
            <?= $this->params['error'] ?>
        </div>
    </div>
<?php endif ?>


<div class="form-wrapper row justify-content-center">
    <div class="col-md-6">
        <form class="g-3 mt-5" method="POST" action="<?= \BASE_URL . 'index/add' ?>">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="inputName" class="form-label fs-5 fw-bold">Name:</label>
                    <input name="seller-name" type="text" class="form-control" id="inputName">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label fs-5 fw-bold">City:</label>
                    <input name="seller-city" type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-6">
                    <label for="inputCommision" class="form-label fs-5 fw-bold">Commision:</label>
                    <input name="seller-commision" type="number" step="0.01" class="form-control" id="inputCommision">
                </div>
            </div>

            <div class="row mx-5 mt-5 justify-content-center">
                <input name="seller-add" type="submit" class="col-md-8 btn btn-dark text-uppercase fw-bold fs-5 py-2" value="Add new Seller"></input>
            </div>

        </form>
    </div>
</div>