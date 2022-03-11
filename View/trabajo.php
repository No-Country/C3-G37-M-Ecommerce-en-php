<?php
require('head.php');
require_once('navbar_m.php');

$a_trabajo = json_decode(file_get_contents('../Config/trabajo.json'), true);
if(isset($_POST["in_trabajo"])){
$nombre = $_POST["in_nombre"];
$apellido = $_POST["in_apellido"];
$fecha = $_POST["in_fecha"];
$tel = $_POST["in_tel"];
$email = $_POST["in_mail"];
$link = $_POST["in_link"];
$ciudad = $_POST["id_ciudad"];

if (isset($_FILES) && !empty($_FILES)) {
    $arch_tmp = $_FILES['in_archivo']['tmp_name'];
    $arch_final = '../archivos/' . $_FILES['in_archivo']['name'];

    move_uploaded_file($arch_tmp, $arch_final);
}
//$archivo = $_POST["in_archivo"];
$comentario = $_POST["in_comentario"];
array_push($a_trabajo, array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'fecha' => $fecha,
    'telefono' => $tel,
    'email' => $email,
    'link' => $link,
    'ciudad' => $ciudad,

    //'archivo' => $archivo,
    'comentario' => $comentario,

));
// ahora pisamos el producto y lo metemos en el json de carrito
file_put_contents('../Config/trabajo.json', json_encode($a_trabajo));
}

?>
<section id="contacto">
    <div class="container">
        <form action="trabajo.php" enctype="multipart/form-data" method=post>
            <h1>Trabaja con Nosotros</h1>

            <div class="row">

                <div class="form-group col-10 col-md-5 col-lg-6">
                    <label for="validationDefault01" class="form-label"></label>
                    <p> <input type="text" name="in_nombre" class="form-control" placeholder="Nombre" id="validationDefault01" value="" required></input> <?php ?></p>
                </div>



                <div class="form-group col-10 col-md-5 col-lg-6">
                    <label for="validationDefault02" class="form-label"></label>
                    <p> <input type="text" name="in_apellido" class="form-control" placeholder="Apellido" value="" id="validationDefault02" required></input></p>
                </div>

            </div>

            <div class="row">
            <div class="form-group col-10 col-md-5 col-lg-6">
                    <label for="validationDefault03" class="form-label"></label>
                    <p> <input type=date name="in_fecha" class=form-control placeholder="Fecha de Nacimiento" value=" id="validationDefault03" required></input></p>
                </div>

                <div class="form-group col-10 col-md-5 col-lg-6">
                    <label for="validationDefault05" class="form-label"></label>
                    <p> <input type=number name="in_tel" class=form-control placeholder=Telefono value="" id="validationDefault05" required></input></p>
                </div>

            </div>


            <div class=row>
            <div class="form-group col-10 col-md-5 col-lg-6">
                    <label id="inputGroupPrepend2" class="form-label"></label>
                    <p> <input type=email name="in_mail" class=form-control placeholder=Email value="" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required></input></p>
                </div>
                
                <div class="form-group col-10 col-md-5 col-lg-6">
                    <label for="validationDefault04" class="form-label"></label>
                    <p> <input type=text name="in_link" class=form-control placeholder=https://www.linkedin.com/ value="" id="validationDefault04" required></input></p>
                </div>
            </div>
            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                    <label for="validationDefault07" class="form-label"></label>
                    <p> <input type=text name=id_ciudad class=form-control placeholder=Ciudad value="" id="validationDefault07" required></input></p>
                </div>

                
                <div class="form-group col-10 col-md-5 col-lg-6 mt-3">
                <label class="mb-3" for="exampleFormControlFile1">Carga tu CV </label>
    <input type="file" class="form-control-file mx-auto" style="width: 330px;" name="in_archivo" id="exampleFormControlFile1">
   
  </div>
            </div>


            <div class="form-group col-7 col-md-9 col-lg-12">
                <label for="validationDefault06" class="form-label"></label>
                <p><textarea class=form-control id=exampleFormControlTextarea1 name="in_comentario" placeholder="Dejá un comentario" rows="3" value="" id="validationDefault06" required></textarea></p>

            </div>



            <div class="form-group col-8 col-md-10 col-lg-12">
                <input type="submit" class="btn botonenviar" name="in_trabajo">
            </div>

        </form>
    </div>
</section>


<!--este Form va en el footer
<form method="post" enctype="multipart/form-data" class="form-group col-7 col-md-9 col-lg-12 mt-5">
    <h3>Trabajá con nosotros</h3>
    <label class="mb-3" for="exampleFormControlFile1">Cargá tu cv y te tendremos en cuenta cuando se abra una vacante</label>
    <input type="file" class="form-control-file mx-auto" style="width: 280px;" name="in_archivo" id="exampleFormControlFile1">
  

    <div class="form-group col-8 col-md-10 col-lg-12">
        <input type=submit class=btn botonenviar name=in_contacto>
    </div>
    <div class="form-group">

</form>
-->










<?php
require('footer_m.php');
?>