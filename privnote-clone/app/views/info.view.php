<section class="info">
    <div class="container">
        <div class="info__block">
            <div class="info__title title">
                <h4>
                    Ссылка на записку готова
                </h4>
            </div>
            <div class="info__content">
                <div class="info__link">
                    <a href="index.php?hash=<?= $GLOBALS['hashNameFile'] ?>">
                        <?= $GLOBALS['host'] . "index.php?hash={$GLOBALS['hashNameFile']}" ?>
                    </a>
                </div>
                <div class="info__warning">
                    Записка самоуничтожится после её прочтения.
                </div>
            </div>
        </div>
    </div>
</section>