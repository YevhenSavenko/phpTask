<section class="register">
    <div class="row justify-content-center">
        <h2 class="col-md-12 text-center mt-5">Register</h2>
        <div class="row justify-content-center my-3">
            <div class="col-md-5 p-0">
                <?php if (isset($_GET['status'])) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?php if ($_GET['status'] === 'email-error') : ?>
                            <span>Incorrectly entered email</span>
                        <?php elseif ($_GET['status'] === 'password-length') : ?>
                            <span>The password is too short. More than 10 characters needed</span>
                        <?php elseif ($_GET['status'] === 'hash-problem') : ?>
                            <span>Some mistake has happened. Please try again later</span>
                        <?php elseif ($_GET['status'] === 'user-exist') : ?>
                            <span>User with this email exists</span>
                        <?php elseif ($_GET['status'] === 'novalid') : ?>
                            <span>Important fields are not filled</span>
                        <?php elseif ($_GET['status'] === 'password-not-confirmed') : ?>
                            <span>Password mismatch</span>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <form class="col-md-5" action="index.php?status=valid" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail3" name="email" value="<?= isset($_POST['email']) ?  $_POST['email'] : '' ?>">
                </div>
            </div>
            <div class="row mb-4">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword3" name="password">
                </div>
            </div>
            <div class="row mb-4">
                <label for="inputPassword4" class="col-sm-3 col-form-label">Conf-Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword4" name="confirm-password">
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary col-md-12" name="register">Register</button>
                </div>
                <div class="col-md-6">
                    <a href="index.php?action=login" class="list-group-item list-group-item-action text-center">Log in</a>
                </div>
            </div>
        </form>
    </div>
</section>