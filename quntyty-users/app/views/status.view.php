<div class="check-status">
	<?php if($_GET['status'] === 'ok'): ?>
		<div class="alert alert-success" role="alert">
			Файлы успешно загрузились
		</div>
	<?php endif; ?>

<!--	--><?php //if($_GET['status'] === 'error'): ?>
<!--		<div class="alert alert-danger" role="alert">-->
<!--			Файлы в БД  существуют-->
<!--		</div>-->
<!--	--><?php //endif; ?>
</div>