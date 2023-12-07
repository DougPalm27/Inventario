<?php

include_once "../../../config/Connection.php";
include_once "../models/categorias.php";

$datosObtenidos = $_POST['losDatos'];
$losDatos = (object) $datosObtenidos;

$categoria = new mdlCategoria();
$guardarCategoria = $categoria->guardarNuevaCategoria($losDatos);
?>