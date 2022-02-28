<!DOCTYPE html>
<html lang="en">

<?php
include('head.php');
include('navbar_m.php');
?>

<body>
  <div class="container">
    <div class="text-center b5 p-5">
      <label for="" class="h2 bb5">Logeo</label>
      <form _ngcontent-c0="" novalidate="" class="text-center" action="../Controller/validar.php" method="POST">
        <div _ngcontent-c0="" class="inputGroup inputGroup1">
          <label _ngcontent-c0="" for="usuario" class="h3">Usuario</label>
          <input _ngcontent-c0="" class="usuario ng-untouched ng-pristine ng-invalid" id="usuario" maxlength="256" name="usuario" required="" type="text">
          <span _ngcontent-c0="" class="indicator"></span>
        </div>
        <div _ngcontent-c0="" class="inputGroup inputGroup2 mt-2">
          <label _ngcontent-c0="" for="password" class="h3">Password</label>
          <input _ngcontent-c0="" class="password ng-untouched ng-pristine ng-invalid" id="password" name="password" required="" type="password">
        </div>
        <div _ngcontent-c0="" class="">
          <button class="btn btn-success">Log in</button>
          <a href="../" class="btn btn-success">Regresar</a>
        </div>
      </form>
    </div>
  </div>

  <?php
  include('footer.php');
  ?>
</body>

</html>