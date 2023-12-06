<?php
    include_once "../../../config/Connection.php";
    include_once "../models/mdl_equipo.php";
    // obtenemos parámetros de la vista si los hay
    // Instaciamientos
    $listarCategorias = new mdlEquipo;
    $losDatos = $listarCategorias->listarCategorias();
    echo json_encode($losDatos);
?>