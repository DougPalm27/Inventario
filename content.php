<?php

/**
 * Descripction....: direcciones para el control de las rutas del sistema
 * Autor : Marcos 
 */
$valor= 1;
if($valor!=1){
    echo "<meta http-equiv='refresh' content='0; url=https://simfcoh.com/'>";
}else{
    if (empty($_GET['module'])) {
       include "./modules/home/views/inicio.php";
    }else{
        /**
         * Módulo: prueba
         * Description : rutas para el control de productores
         */
         $_GET['module'] == 'ejercicio' ? include "./modules/ejercicio/views/agregar.php" : false ;
         $_GET['module'] == 'r1' ? include "./modules/Reportes/views/r1.php" : false ;
         $_GET['module'] == 'r2' ? include "./modules/Reportes/views/r2.php" : false ;
         $_GET['module'] == 'r3' ? include "./modules/Reportes/views/r3.php" : false ;
         $_GET['module'] == 'r4' ? include "./modules/Reportes/views/r4.php" : false ;
         $_GET['module'] == 'r5' ? include "./modules/Reportes/views/r5.php" : false ;
         $_GET['module'] == 'categorias' ? include "./modules/Parametrizacion/views/formularioCategorias.php" : false ;


        
        //  $_GET['module'] == 'listadoProductores' ? include "./modules/productores/views/listaProductores.php" :false;
    }
}

?>