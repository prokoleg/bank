<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT
?>
	<h1 class="m5 mb5">Перевод по QR-коду</h1>
<?php
if($_SESSION && isset($_SESSION['login'])) :
	Pictures::ImageQR();
endif;
?>
<div class="center">
	<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<p>Также можно оплатить старым способом:</p>
<?php endif; ?>
	<?php if(!isset($_SESSION['login'])) : ?>
		<p>Вам доступна оплата только по реквезитам:</p>
	<?php endif; ?>
<p>на номер счета <strong>4081 7810 2906 3001 9593</strong></p>
<p>в банке <strong>ПАО "БАНК САНКТ-ПЕТЕРБУРГ"</strong></p>
<p>Получатель: <strong>Прокофьева Мария</strong></p>
</div>
