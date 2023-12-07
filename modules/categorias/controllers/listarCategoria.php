<?php
    include_once "../../../config/Connection.php";
    include_once "../models/categoria.php";

    // obtenemos parámetes de la vista si los hay

    // Instaciamientos
    $ejercio = new mdlCategoria();
    $losDatos = $ejercio->listarCategorias();
    echo json_encode($losDatos);
?>