<?php

use LDAP\Result;

require('head.php');
require_once('navbar_m.php');
$carro = json_decode(file_get_contents('../Config/pcarrito.json'), true);
int:$cant=0; $precioT=0;
?>
<div class="row">
<div class="col-10 col-md-10 col-lg-4">
<table class='table table-bordered cuadro1'>
<thead>
    <tr>
        <th scope='col'>id</th>
        <th scope='col'>Nombre</th>
        <th scope='col'>Precio</th>
        <th scope='col'>Cantidad</th>
    </tr>
</thead>
<tbody>
<?php
foreach($carro as $carrito){
    $c_id = $carrito['id_p'];
    $c_nom = $carrito['nombre'];
    $c_pre = $carrito['precio'];
    $c_cant = $carrito['cantidad'];
    $cant = $cant + $c_cant;
    $precioT = $precioT + $c_pre;
   // $c_img = "../Assets/img/id-" . $c_id . ".jpg";

//<!--<img src='<?php // echo  $c_img ' class='card-img-top rounded' alt='...'>-->
   echo '
<tr class="">
            <td>
                <p class="card-text">' . $c_id . '</p>
            </td>
            <td>
                <p class="card-text">' . $c_nom . '</p>
            </td>
            <td>
                <p class="card-text">' . $c_pre . '</p>
            </td>
            <td>
                <p class="card-text">' . $c_cant . '</p>
            </td>
            ';
            
            } 
            
            
            ?>
                                 </tr>
                              </tbody>
                          </table>
                          <div class="">
                              <h3 class="h5 cuadro2"><?php echo "Total de productos: ".$cant; ?></h3>
                              <h3 class="h5 cuadro2"><?php echo "Precio Total: ".$precioT; ?></h3>
                          </div>
                          <?php


?>
</div>
<div class="col-10 col-md-10 col-lg-8 p-5">
<h1 class="Checkout">Checkout</h1>
<form action="Checkout.php" method=post>
            
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
                    <p> <input type=email name=in_mail class=form-control placeholder=Email value="" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required></input></p>
                </div>



                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault05" class="form-label"></label>
                    <p> <input type=number name=in_tel class=form-control placeholder=Telefono value="" id="validationDefault05" required></input></p>
                </div>

            </div>

            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault03" class="form-label"></label>
                    <p> <input type=text name=in_localidad class=form-control placeholder=Localidad value="" id="validationDefault03" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault04" class="form-label"></label>
                    <p> <input type=text name=in_ciudad class=form-control placeholder=Ciudad value="" id="validationDefault04" required></input></p>
                </div>
            </div>

            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault07" class="form-label"></label>
                    <p> <input type=text name=in_direccion class=form-control placeholder=Dirección value="" id="validationDefault07" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault08" class="form-label"></label>
                    <p> <input type=text name=in_banco class=form-control placeholder=Banco value="" id="validationDefault08" required></input></p>
                </div>
            </div>



            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault09" class="form-label"></label>
                    <p> <input type=number name=in_tarjeta class=form-control placeholder="Número de Tarjeta" value="" id="validationDefault09" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault10" class="form-label"></label>
                    <p> <input type=date name=in_expiracion class=form-control placeholder="Fecha de Expiración" value="" id="validationDefault10" required></input></p>
                </div>
            </div>
            <div class=row>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault11" class="form-label"></label>
                    <p> <input type=password name=in_seguridad class=form-control placeholder="Código de seguridad" value="" id="validationDefault11" required></input></p>
                </div>
                <div class="form-group col-10 col-md-5 col-lg-6">
                <label for="validationDefault12" class="form-label"></label>
                    <p> <input type=number name=in_dni class=form-control placeholder="DNI del Titular" value="" id="validationDefault12" required></input></p>
                </div>
            </div>

            <div class="form-group col-7 col-md-9 col-lg-12">
            <label for="validationDefault06" class="form-label"></label>
                <p><textarea class=form-control id=exampleFormControlTextarea1 name=in_comentario placeholder="Si tenes algún comentario" rows=3 value=""  id="validationDefault06" required></textarea></p>

            </div>

            <div class="form-group col-8 col-md-10 col-lg-12 ">
                <input type=submit class="btn botonenviar" name=in_contacto>
            </div>
        </form>

</div>
</div>
<?php
require_once("footer_m.php");
?>