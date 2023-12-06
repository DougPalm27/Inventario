<!-- Vendor JS Files -->
<script src="./assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./assets/vendor/chart.js/chart.umd.js"></script>
<script src="./assets/vendor/echarts/echarts.min.js"></script>
<script src="./assets/vendor/quill/quill.min.js"></script>
<script src="./assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="./assets/vendor/tinymce/tinymce.min.js"></script>
<script src="./assets/vendor/php-email-form/validate.js"></script>
<script src="./assets/js/jquery.js"></script>
<!-- DataTables -->
<script src="./assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="./assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="./assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="./assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="./assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="./assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>

<!-- Template Main JS File -->
<script src="./assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#cargaProductor').select2({
        dropdownParent: $('#verticalycentered'),
        width : "100%",
        placeholder: "Seleccione un productor para cargarlo",
        allowClear: "true"
    });
});
</script>

<!-- Carga de  js según el módulo-->
<?php
  if (!empty($_GET['module'])) {    
    //echo '<script src="./modules/home/views/home.js"></script>';  
    if($_GET['module']=='listadoProductores'){      
      echo '<script src="./modules/productores/js/listaProductor.js"></script>';
    }
    if($_GET['module'] =='ejercicio'){
      echo '<script src="./modules/ejercicio/js/ejercicio.js"></script>';
    }
    if($_GET['module'] =='r1'){
      echo '<script src="./modules/Reportes/js/reporteGeneral.js"></script>';
    }
    if($_GET['module'] =='r2'){
      echo '<script src="./modules/Reportes/js/reporteHistorico.js"></script>';
    }
    if($_GET['module'] =='r3'){
      echo '<script src="./modules/Reportes/js/reporteTotalCategoriaEstado.js"></script>';
    }
    if($_GET['module'] =='r4'){
      echo '<script src="./modules/Reportes/js/reporteAsignaciones.js"></script>';
    }
    if($_GET['module'] =='r5'){
      echo '<script src="./modules/Reportes/js/reporteMantenimiento.js"></script>';
    }
    if($_GET['module'] =='equipo'){
      echo '<script src="./modules/Equipo/js/fc_equipo.js"></script>';
    }
}else{
    //echo '<script src="/modules/home/"></script>';
}
?>