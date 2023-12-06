$(document).ready(function () {

    listarCategorias();



    listarUsuarios();

    listarProveedor();

    $("#categoriaID").on("change",function(){
        let cod =$("#categoriaID option:selected").attr("data-codigo");

        $("#codCategoria").val(cod);
    });


    $("#usuarioID").on("change",function(){
        let cod =$("#usuarioID option:selected").attr("data-codigo");

        $("#codUsuario").val(cod);
    })

  
    // evento click del botón guardar
    $("#btnGuardarEquipo").on("click", function () {
      let losDatos = {
        categoriaID: $("#categoriaID").val(),
        fechaAdquisicion: $("#fechaAdquisicion").val(),
        precioAdquisicion: $("#precioAdquisicion").val(),
        ubicacionID: $("#ubicacionID").val(),
        ubicacionID1:  $("#ubicacionID option:selected").text(),
        proveedorID: $("#proveedorID").val(),
        descripcionGeneral: $("#descripcionGeneral").text(),
        serie: $("#serie").val()
      };
      let errores = [];
  
      // Validar categoriaID
      
      if (losDatos.categoriaID == "Seleccione una categoria") {
          errores.push("Debe seleccionar una categoría.");
        }
        
        // Validar fechaAdquisicion
        if (!losDatos.fechaAdquisicion) {
          errores.push("Debe ingresar la fecha de adquisición.");
        }
        
        // Validar precioAdquisicion
        if (!losDatos.precioAdquisicion || isNaN(losDatos.precioAdquisicion)) {
          errores.push("Debe ingresar un precio de adquisición válido.");
        }
        
        // Validar ubicacionID
        if (losDatos.ubicacionID1 == "Selecciona una ubicación") {
          errores.push("Debe seleccionar una ubicación.");
        }
        
      
      // Puedes agregar más validaciones para otros campos según tus necesidades
      
      // Verificar si hay errores
      if (errores.length > 0) {
        let mensajeError = "Error en los siguientes campos:\n" + errores.join("\n");
        swal.fire(
          "Seccion de Equipo",
          mensajeError,
          "warning"
        );
      } else {
        console.log(losDatos);
        guardarDatos(losDatos);
      }
    });
  
    // evento change del select
    $("#ubicacionID").on("change", function () {
      const valor = $("#ubicacionID").val();
      console.log(valor);
    });
    $("#categoriaID").on("change", function () {
      const valor = $("#categoriaID").val();
      console.log(valor);
    });
    $("#proveedorID").on("change", function () {
      const valor = $("#proveedorID").val();
      console.log(valor);
    });
  
  });
  
  function guardarDatos(losDatos) {
    $.ajax({
      type: "POST", // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓN
      url: "./modules/Equipo/controllers/ctrl_equipo.php",
      data: {
        losDatos: losDatos,
      },
      // Error en la petición
      error: function (error) {
        console.log(error);
      },
      // Petición exitosa
      success: function (respuesta) {
        console.log(respuesta);
        const resp = JSON.parse(respuesta);
        console.log(resp);
  
        if (resp[0].status == "200") {
          swal.fire("Ejercicio", "Equipo registrado Correctamente", "success");
        }else{
          swal.fire("Ejercicio", respuesta, "warning");
        }
      },
    });
  }
  
  function listarUsuarios() {
    // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
    $.ajax({
      type: "GET",
      url: "./modules/Asignaciones/controllers/listarUsuariosM.php",
      data: {},
      // Error en la petición
      error: function (error) {
        console.log(error);
      },
      // Petición exitosa
      success: function (respuesta) {
         
        let datos = JSON.parse(respuesta);
        datos.forEach((e) => {
          $("#usuarioID").append(
            `<option value="${e.usuarioID}" data-codigo="${e.codigoUsuario}">${e.nombre}</option>`
          );
        });
      },
    });
  }
  
  function listarCategorias() {
      // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
      $.ajax({
        type: "GET",
        url: "./modules/Equipo/controllers/ctrl_listarcategorias.php",
        data: {},
        // Error en la petición
        error: function (error) {
          console.log(error);
        },
        // Petición exitosa
        success: function (respuesta) {
           
          let datos = JSON.parse(respuesta);
          datos.forEach((e) => {
            $("#categoriaID").append(
              `<option value="${e.categoriaID}" data-codigo ="${e.codigoCategoria}">${e.descripcion}</option>`
            );
          });
        },
      });
  }
  function listarProveedor() {
      // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
      $.ajax({
        type: "GET",
        url: "./modules/Equipo/controllers/ctrl_proveedor.php",
        data: {},
        // Error en la petición
        error: function (error) {
          console.log(error);
        },
        // Petición exitosa
        success: function (respuesta) {
           
          let datos = JSON.parse(respuesta);
          datos.forEach((e) => {
            $("#proveedorID").append(
              `<option value="${e.proveedorID}">${e.nombre}</option>`
            );
          });
        },
      });
  } 