<?php
  session_start();
  session_unset();
  header("Location: ../");
  $carrito = [];
  file_put_contents('../Config/pcarrito.json', json_encode($carrito));
  exit();
?>