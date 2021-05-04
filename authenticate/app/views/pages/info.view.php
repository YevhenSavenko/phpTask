<section>
    <?php if (!empty($verifyEmail) && !empty($verifyPassword)) : ?>
        <h1 class="mt-5 mb-5 text-center text-uppercase ">
            User found in the database
        </h1>
        <div class="text-center">
            <h2><span class="text-uppercase">Usermail:</span> <?= $verifyEmail ?></h2>
        </div>
        <div class="text-center mt-4">
            <h2><span class="text-uppercase">Password:</span> <?= $verifyPassword ?></h2>
        </div>
    <?php else : ?>
        <h1 class="mt-5 text-center text-uppercase">
            Not authorized
        </h1>
    <?php endif ?>
</section>