<section class="login">
    <div class="row justify-content-center">
        <h2 class="col-md-12 text-center mt-5">Log in</h2>
        <div class="row justify-content-center my-3">
            <div class="col-md-5 p-0">
                <?php if (isset($_GET['status'])) : ?>
                    <?php if ($_GET['status'] === 'valid') : ?>
                        <div class="alert alert-success text-center" role="alert">
                            You have successfully registered, log in to continue working
                        </div>
                    <?php elseif ($_GET['status'] !== 'valid') : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php if ($_GET['status'] === 'novalid') : ?>
                                <span>Important fields are not filled</span>
                            <?php elseif ($_GET['status'] === 'no-user') : ?>
                                <span>User with this email does not exist</span>
                            <?php elseif ($_GET['status'] === 'password-wrong') : ?>
                                <span>Wrong password</span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>

        <form class="col-md-5" action="index.php?action=info" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="login-email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="login-password">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary col-md-12" name="sign-in">Sign in</button>
                </div>
                <div class="col-md-6">
                    <a href="index.php?action=register" class="list-group-item list-group-item-action text-center">Register</a>
                </div>
            </div>
        </form>
    </div>
</section>