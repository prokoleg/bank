<!-- footer -->
<footer class="bg-light text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Внимание!</h5>
<?php
$cite = ($_SERVER['QUERY_STRING'] == 'link=qr') ? 'просто' : 'перейдите на вкладку "<a href="../qr" title="Оплата по QR-коду">QR-код</a>" и ';
 ?>
        <p class="small text">
          На данном сайте располагается информация о зачислении денежных средств
          на конкретный расчетный счет и для конкретного человека. Для проверки получателя 
          платежа <?php echo $cite; ?> отсканируйте QR-код.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">О кукухах</h5>

        <p class="small text">
          <?php echo Url::homeUrl(); ?> использует файлы cookie для персонализации сервисов и удобства пользователей. Cookie содержат обезличенную информацию о прошлых посещениях сайта банка. Вы можете отключить сбор cookie в настройках браузера.
        </p>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    ©<?php echo date('Y'); ?> Copyright
    <a class="text-dark" href="https://<?php echo Url::homeUrl(); ?>/"><?php echo Url::homeUrl(); ?></a>
  </div>
  <!-- Copyright -->
</footer>
<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>