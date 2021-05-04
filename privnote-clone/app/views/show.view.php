<section class="message">
    <div class="container">
        <div class="message__title title">
            <h4>Содержание записки</h4>
        </div>
        <div class="info__warning message__warning">
            Эта записка удалена. Если вам нужно сохранить текст, скопируйте его перед закрытием этого окна
        </div>
        <div class="form__message">
            <form method="POST" action="index.php">
                <div class="form__content">
                    <textarea name="contents-notes" readonly><?= $GLOBALS['getContentsFile'] ?></textarea>
                </div>
            </form>
        </div>
    </div>
</section>