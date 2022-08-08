<!-- Форма внесения данных -->
	<h1 class="m5">Форма контроля средств</h1>
	<form method="post">
		<div class="mb-3 m10">
  <label for="active-form" class="form-label">Сумма пополнения <code>(обязательно)</code></label>
  <input type="number" name="pay" class="form-control" placeholder="Сумма" id="active-form" pattern="[0-9]{2,10}" />
 </div>
<div class="mb-3">
  <label for="data-form" class="form-label">Дата внесения</label>
  <input type="text" name="data" class="form-control" readonly value="<?php echo date('Y-m-d H:i:s'); ?>" id="data-form"/>
</div>
<?php if(!$_SESSION) : ?>
<div class="mb-3">
  <label for="pass-form" class="form-label">Пароль <code>(обязательно если нет логина)</code></label>
  <input type="password" name="pass" class="form-control" placeholder="Введите гостевой пароль (выдается администратором)" id="pass-form"/>
</div>
<?php endif ?>
		<button class="btn btn-outline-primary btn-lg btn-block">Зачислить перевод <span id="result"></span></button>
	</form>
<!-- Форма внесения данных -->
