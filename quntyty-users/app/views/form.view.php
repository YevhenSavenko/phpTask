<div>
    <form enctype="multipart/form-data" action="index.php" method="post" id="form-files">
        <?php for($i = 0; $i < 2; $i++): ?>
            <div class="mb-3">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= MAX_SIZE_FILE ?>"
                <label for="formFileSm<?= $i+1 ?>" class="label-inside form-label">
                    <span class="label-inside">File <?= $i+1 ?>: </span>
                </label>
                <input type="file" name="userfile[]" class="form-control form-control-sm" id="formFileSm<?= $i+1 ?>">
            </div>
            <?php if(array_key_exists($i, $arrayAfterUploadedFiles) && $arrayAfterUploadedFiles[$i] !==0): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $phpFileUploadErrors[$arrayAfterUploadedFiles[$i]] ?>
                </div>
            <?php endif ?>
        <?php endfor?>
        <input type="submit" value="Submit" name="submit-file" id="submit" class="btn btn-outline-success col-md-6 offset-md-3 button-submit">
    </form>
</div>
