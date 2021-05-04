<section class="form">
    <div class="container">
        <?php if (isset($_GET['fail-hash'])) : ?>
            <?php if ($_GET['fail-hash'] == '1') : ?>
                <div class="form__fail">
                    Вы ввели некоректный адрес записки
                </div>
            <?php endif ?>
            <?php if ($_GET['fail-hash'] == '2') : ?>
                <div class="form__fail">
                    Данная записка была прочитана и уничтожена
                </div>
            <?php endif ?>
        <?php endif ?>
        <div class="form__wrapper">
            <div class="form__title title">
                <h4>Новая записка</h4>
            </div>

            <div class="form__message">
                <form method="POST" action="index.php">
                    <div class="form__content">
                        <textarea name="contents-notes" placeholder="Напишите ваш текст здесь..."></textarea>
                    </div>
                    <?php if (isset($_GET['status'])) : ?>
                        <?php if ($_GET['status'] == 'error') : ?>
                            <div class="form__error">
                                Ошибка: текст записки пуст
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <div class="form__submit">
                        <input class="form__btn" name="send-massage" type="submit" value="Создать записку">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>