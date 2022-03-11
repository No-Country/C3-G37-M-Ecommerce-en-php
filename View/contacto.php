<?php
require('head.php');
require_once('navbar_m.php');


$a_contacto = json_decode(file_get_contents('../Config/contacto.json'), true);
if(isset($_POST["in_contacto"])){
$nombre = $_POST["in_nombre"];
$apellido = $_POST["in_apellido"];
$email = $_POST["in_mail"];
$tel = $_POST["in_tel"];
$localidad = $_POST["in_localidad"];
$ciudad = $_POST["in_ciudad"];
$comentario = $_POST["in_comentario"];
array_push($a_contacto, array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'telefono' => $tel,
    'localidad' => $localidad,
    'ciudad' => $ciudad,
    'comentario' => $comentario,
));
// ahora pisamos el producto y lo metemos en el json de carrito
file_put_contents('../Config/contacto.json', json_encode($a_contacto));
}
?>
<main class="">
    <section id="contacto">

        <form action="contacto.php" method=post>
            <h1 class="contacto">Contacto</h1>


            <div class="row">

                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault01" class="form-label"></label>
                    <p> <input type="text" name="in_nombre" class="form-control" placeholder="Nombre" id="validationDefault01" value="" required ></input> <?php ?></p>
                </div>



                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault02" class="form-label"></label>
                    <p> <input type="text" name="in_apellido" class="form-control" placeholder="Apellido" value="" id="validationDefault02"  required></input></p>
                </div>

            </div>
            <div class="row">


                <div class="form-group col-10 col-md-5 col-lg-6">
                <label  id="inputGroupPrepend2" class="form-label"></label>
                    <p> <input type=email name=in_mail class=form-control placeholder=Email value="<?php if (isset($mail)) echo $mail ?>" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required></input></p>
                </div>



                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault05" class="form-label"></label>
                    <p> <input type=number name=in_tel class=form-control placeholder=Telefono value="<?php if (isset($tel)) echo $tel ?>" id="validationDefault05" required></input></p>
                </div>

            </div>

            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault03" class="form-label"></label>
                    <p> <input type=text name=in_localidad class=form-control placeholder=Localidad value="<?php if (isset($localidad)) echo $localidad ?>" id="validationDefault03" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault04" class="form-label"></label>
                    <p> <input type=text name=in_ciudad class=form-control placeholder=Ciudad value="<?php if (isset($ciudad)) echo $ciudad ?>" id="validationDefault04" required></input></p>
                </div>
            </div>


            <!-- estas son las áreas, que no van en el form 
            <div id='valor' class='form-grup col-8 col-md-10 col-lg-12'>
                <p>Area de consulta <br>
                <div class='form-check form-check-inline '>
                    <input class='form-check-input' type='radio' name='despl' id='inlineRadio1' value='produccion'>
                    <label for='form-check-label' for='inlineRadio1'>Produccion</label>
                </div>
                <div class='form-check form-check-inline '>
                    <input class='form-check-input' type='radio' name='despl' id='inlineRadio2' value='ventas'>
                    <label for='form-check-labe2' for='inlineRadio2'>Ventas</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='radio' name='despl' id='inlineRadio3' value='envios'>
                    <label for='form-check-labe3' for='inlineRadio3'>Envios</label>
                </div>
                </p>
            </div>
-->


            <div class="form-group col-7 col-md-9 col-lg-12">
            <label for="validationDefault06" class="form-label"></label>
                <p><textarea class=form-control id=exampleFormControlTextarea1 name=in_comentario placeholder="Si tenes algún comentario" rows=3 value="<?php if (isset($comentario)) echo $comentario ?>"  id="validationDefault06" required></textarea></p>

            </div>



            <div class="form-group col-8 col-md-10 col-lg-12 ">
                <input type=submit class="btn botonenviar" name=in_contacto>
            </div>

           

        </form>

      


        <div class="row mapa">
            <div class="col-7 col-md-9 col-lg-12">
                <div class="embed-responsive embed-responsive-16by9 mt-5" width>
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2559.0435230414846!2d8.767031515087254!3d50.104192320135674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bd0e018fdeaaab%3A0x9978eef88426fc4e!2sZiba!5e0!3m2!1ses-419!2sar!4v1603252058987!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-7 col-md-9 col-lg-12">
                <div class="mt-5">
                    <ul class="redes">
                        <li><a href="http://www.instagram.com/" target="new"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="http://www.facebook.com/" target="new"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com/" target="new"><i class="fab fa-twitter"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>



    </section>



</main>
<?php
require_once('footer_m.php');
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>