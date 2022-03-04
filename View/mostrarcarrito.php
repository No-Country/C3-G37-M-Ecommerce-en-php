<?php

use LDAP\Result;

require('head.php');
require_once('navbar_m.php');

$a_carrito = json_decode(file_get_contents('../Config/pcarrito.json'), true);
if (isset($_POST['in_carrito'])) {
    $id_p = $_POST['in_id'];
    $id_n = $_POST['in_nombre'];
    $id_pr = $_POST['in_precio'];

    array_push($a_carrito, array(
        'id_p' => $id_p,
        'nombre' => $id_n,
        'precio' => $id_pr,
    ));
    // ahora pisamos el producto y lo metemos en el json de carrito
    file_put_contents('../Config/pcarrito.json', json_encode($a_carrito));
}
int: 
$contador = 0;
foreach ($a_carrito as $a_carritos) {
    $pr_id = $a_carritos['id_p'];
    $pr_no = $a_carritos['nombre'];
    $pr_pr = $a_carritos['precio'];


    if ($a_carritos['id_p'] == $pr_id) {
?>
        <div class="col-12 col-m-5 col-lg-4">
            <div class="card mb-4">
                <div class="card-body">

                    <h5 class="card-text"><?php echo  $pr_no ?> </h5>
                    <p class="card-text "><?php echo  $pr_id ?></p>
                    <p class="card-text precio"><?php echo  $pr_pr ?></p>
                </div>
            </div>
        </div>
<?php

    }
    $contador++;
}
echo "Cantidad de productos: " . $contador;



require_once("footer.php");
?>