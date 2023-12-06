<?php
    include_once "../../../config/Connection.php";
    include_once "../models/mdl_equipo.php";
    // obtenemos parámetros de la vista si los hay
    // Instaciamientos
    $listarProveedor = new mdlEquipo;
    $losDatos = $listarProveedor->listarProveedores();
    echo json_encode($losDatos);
?>