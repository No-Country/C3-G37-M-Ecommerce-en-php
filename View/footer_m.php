<?php
$suscripcion = json_decode(file_get_contents('../Config/suscripcion.json'), true);
if(isset($_POST["in_suscipcion"])){
$email = $_POST["in_mail"];
array_push($suscripcion, array(
  'email' => $email,
));
// ahora pisamos el producto y lo metemos en el json de carrito
file_put_contents('../Config/suscripcion.json', json_encode($suscripcion));
}
?>
<div class="text-center pt-5" style=" background-color: rgb(250, 215, 227);">
    <div class=" trabaja row">
      <div class="col-10 col-md-10 col-lg-4">
        <h3 class="h4">FORMAS DE PAGO</h3>
        <p>Tarjetas Crédito / Débito</p>
        <p>Transferencia bancaria</p>
      </div>
      <div class="col-10 col-md-10 col-lg-4">
        <h3 class="h4">CONTACTO</h3>
        <p>joyerias_zb@gmail.com</p>
        <p>(011) 1428 – 0267</P>
        <p> <a href="trabajo.php" class="trabaja" target="new">
            <h3 class="h5">Trabajá con nosotros</h3>
        </p></a>
      </div>
<?php 
$direc1="quienes_somos.php";
$direc2="contacto.php";
?>

      <div class="col-11 col-md-10 col-lg-4">
        <!-- inicio del area de suscripcion -->
        <form action="quienes_somos.php" action="contacto.php" method=post class="row row-cols-lg-auto p-2 align-items-center">

          <label class="visually-hidden" for="validationDefault01"></label>
          <div class="input-group">
            <div class="input-group-text">@</div>
            <input type="text" class="form-control" id="validationDefault01" value="" placeholder="Suscríbete" name="in_mail" required>
          </div>
          <div class="form-check col-lg-8">
          <label class="form-check-label" for="validationDefault02">
            <input class="form-check-input" type="checkbox" id="validationDefault02" name="in_acepto" value="" required>
              Acepto los terminos y condiciones.
            </label>
          </div>


          <div class="col-lg-4 p-2">
            <button type="submit" class="btn botonenviar2" name="in_suscipcion">Suscribirse</button>
          </div>
        </form>
        <!-- fin del area de suscripcion -->
      </div>
    </div>
    <br>
    <div class="text-center">
      <p>Created by: Dert Driver</p>Contact me !
    </div>
    <a href='https://www.facebook.com/dert.driver' target='_blank'><i class='fa fa-facebook'></i></a>
    <a href='https://www.instagram.com/dert98/?hl=es-la' target='_blank'><i class='fa fa-instagram'></i></a>
    <a href='https://github.com/dert98' target='_blank'><i class='fa fa-github-square'></i></a>
    <a href='mailto:dertdriver@gmail.com' target='_blank'><i class='fa fa-envelope-square'></i></a>