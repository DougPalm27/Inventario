$(document).ready(function() {

    //listar
    listarCategorias()
 // evento click del botón guardar
 $("#btnGuardar").on("click", function() {
   
    let losDatos = {
        categoria: $("#categoria").val(),
    };

    if (losDatos.categoria === "") {
        swal.fire("Categoría", "Error debe ingresar los datos", "warning");
    } else {
            guardarDatos(losDatos);
    }

});
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