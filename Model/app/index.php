<!DOCTYPE html>
<html lang="en">
<?php
    include ('../../view/head.php');
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: ../../");
    } 
?>
<body>
    <div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
</div>
<div class="text-center mt-5">
    <p class="h2">Administracion de las tablas</p>
    <a href="../../" class="btn btn-success">Index</a>
    <a href="usuario-index.php" class="btn btn-primary">Usuarios</a>
    <a href="producto-index.php" class="btn btn-primary">Productos</a>
    <a href="../../Controller/salir.php" class="btn btn-danger">Cerrar Sesion</a>
</div>
</body>
</html>