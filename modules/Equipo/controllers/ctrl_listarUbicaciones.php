<?php
    include_once "../../../config/Connection.php";
    include_once "../models/mdl_equipo.php";
    // obtenemos parámetros de la vista si los hay
    // Instaciamientos
    $listarUbicaciones = new mdlEquipo;
    $losDatos = $listarUbicaciones->listarUbicaciones();
    echo json_encode($losDatos);
?>