$(document).ready(function() {

    //listar
    listarCategorias()
 // evento click del botón guardar
 $("#btnGuardar").on("click", function() {
   
    let losDatos = {
        categoria: $("#categoria").val(),
        codigoCategoria: $("#codigoCategoria").val(),
    };

    if (losDatos.categoria === "" || losDatos.codigoCategoria === "") {
        swal.fire("Categoría", "Error debe ingresar los datos", "warning");
    } else {
        // Validar que el campo codigoCategoria tenga exactamente tres caracteres
        if (losDatos.codigoCategoria.length === 3) {
            console.log(losDatos);
            guardarDatos(losDatos);
        } else {
            swal.fire("Categoría", "El campo código de categoría debe tener exactamente tres caracteres", "warning");
        }
    }

});
/*  $("#listaCorreo").on("change",function(){
    const valor = $("#listaCorreo").val();
    console.log(valor);
 });
 */
});

function guardarDatos(losDatos){
    
    $.ajax({
        type: "POST",
        url: "./modules/categorias/controllers/agregarCategoria.php",
        data: {
          losDatos:losDatos
        },
        error: function (error) {
            console.log(error);
        },
        success: function (respuesta) {
            console.log(respuesta);
            const resp = JSON.parse(respuesta);
            console.log(resp);

            if(resp[0].status =="200"){
                swal.fire("Categoria","Categoria registrado Correctamente","success");
            }
        },
      });
}

function listarCategorias(){ 
    $.ajax({
        type: "GET",  
        url: "./modules/ejercicio/controllers/listarCorreo.php",
        data: {},

        error: function (error) {
            console.log(error);
        },

        success: function (respuesta) {
            
            let datos = JSON.parse(respuesta);       
            datos.forEach(e => {
                $("#listaCategoria").append(`<option value="${categoria.id}">${categoria.nombre}</option>`)
            });
        },
      });
}