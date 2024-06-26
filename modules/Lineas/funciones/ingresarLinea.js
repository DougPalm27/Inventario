$(document).ready(function () {
  listarLineas();
  listarMarcas();
  listarModelos();
  listarProyecto();
  listarUsuarios();
  listarLineasDisponibles();
  listarCelularesDisponibles();

  // evento click del botón guardar
  $("#btnGuardarLinea").on("click", function () {
    let losDatos = {
      numeroLinea: $("#numeroLinea").val(),
      fechaActivacion: $("#fechaActivacion").val(),
      codigoProyecto: $("#codigoProyecto").val(),
      marca: $("#marca option:selected").text(),
      modelo: $("#modelo option:selected").text(),
      Imei: $("#Imei").val(),
      fechaRenovacion: $("#fechaRenovacion").val(),
      fechaVencimiento: $("#fechaVencimiento").val(),
    };
    let errores = [];
    if (losDatos.numeroLinea == "") {
      errores.push("Debe ingresar una linea");
    }
    // Verificar si hay errores
    if (errores.length > 0) {
      let mensajeError =
        "Error en los siguientes campos:\n" + errores.join("\n");
      swal.fire("Seccion de Equipo", mensajeError, "warning");
    } else {
      console.log(losDatos);
      guardarNuevaLinea(losDatos);
    }
  });
  //evento click del boton guardar en modal Asiganciones
  $("#btnGuardarAsignarLinea").on("click", function () {
    let losDatos = {
      usuarioID: $("#usuario").val(),
      lineaID: $("#linea2").val(),
      dispositivoID: $("#Imei2").val(),
      fechaAsignacion: $("#fechaAsignacion").val(),
    };
    console.log(losDatos);
    // Verificar si hay errores

    if (losDatos.usuarioID === -1) {
      swal.fire("Atención, debes Seleccionar un usuario", "", "warning");
    } else if (losDatos.lineaID === -1) {
      swal.fire("Atención, debes Seleccionar una línea", "", "warning");
    } else if (losDatos.dispositivoID === -1) {
      swal.fire("Atención, debes Seleccionar un dispositivo", "", "warning");
    } else if (losDatos.fechaAsignacion === '') {
      swal.fire("Atención, debes Seleccionar una fecha válida", "", "warning");
    } else {
      asignarLinea(losDatos);
    }
    
  });

  // evento change del select
  $("#marcaID").on("change", function () {
    const valor = $("#marcaID").val();
    console.log(valor);
  });
  $("#modeloID").on("change", function () {
    const valor = $("#modeloID").val();
    console.log(valor);
  });
  $("#codigoProyecto").on("change", function () {
    const valor = $("#codigoProyecto").val();
    console.log(valor);
  });
  $("#usuario").on("change", function () {
    const codigo = $('select[name="usuario"] option:selected').attr(
      "data-codigo"
    );
    $("#cempleado").val(codigo);
  });
  $("#linea2").on("change", function () {
    const valor = $("#linea2").val();
    const proyecto = $('select[name="linea2"] option:selected').attr(
      "data-proyecto"
    );
    const sugerencia = $('select[name="linea2"] option:selected').attr(
      "data-sugerencia"
    );
    $("#sugerencia").append(
      `<div class="col-md-12 alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        El dispositivo sugerido para esta línea es: ${sugerencia}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`
    );
    $("#proyecto").val(proyecto);
  });
  $("#Imei2").on("change", function () {
    const valor = $("#Imei2").val();
    console.log(valor);
  });
});

function guardarNuevaLinea(losDatos) {
  $.ajax({
    type: "POST", // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓN
    url: "./modules/Lineas/controllers/insertarLineas.php",
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
        swal.fire("Lineas", "Linea registrada Correctamente", "success");
      } else {
        swal.fire("Lineas", respuesta, "warning");
      }
    },
  });
}
function listarProyecto() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Lineas/controllers/listarProyectos.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#codigoProyecto").append(
          `<option value="${e.codigoProyecto}">${e.nombreProyecto}</option>`
        );
      });
    },
  });
}
function listarModelos() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Lineas/controllers/listarModelo.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#modelo").append(
          `<option value="${e.modeloID}">${e.nombreModelo}</option>`
        );
      });
    },
  });
}
function listarMarcas() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Lineas/controllers/listarMarca.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#marca").append(
          `<option value="${e.marcaID}">${e.nombreMarca}</option>`
        );
      });
    },
  });
}
function listarLineas() {
  // Petición
  $.ajax({
    type: "GET",
    url: "./modules/Lineas/controllers/listarLineas.php",
    dataType: "json",
    error: function (error) {
      console.log(error);
      Swal.fire({
        title: "Lineas",
        icon: "warning",
        text: `${error}`,
        confirmButtonColor: "#3085d6",
      });
    },
    success: function (respuesta) {
      // Creamos las columnas de nuestra tabla

      var columns = [
        {
          mDataProp: "Linea",
          width: "10%",
        },
        {
          mDataProp: "Asignado",
          width: "15%",
        },
        {
          mDataProp: "Proyecto",
          width: "15%",
        },
        {
          mDataProp: "Marca",
          width: "10%",
        },
        {
          mDataProp: "Modelo",
          width: "25%",
        },
        {
          mDataProp: "Estado",
          width: "5%",
        },
        {
          className: "text-left",
          width: "10%",
          render: function (data, types, full, meta) {
            let btnModificar = `<button data-id = ${full.lineaID} name="registro-editar" class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="Editar productor">
                                    <i class="fas fa-pencil-alt"></i>
                                  </button>`;

            let btnVer = `<button data-id = ${full.lineaID} name="registro-editar" class="btn btn-outline-success" type="button" data-toggle="tooltip" data-placement="top" title="Editar productor">
                                    <i class="fas fa-eye"></i>
                                  </button>`;

            let btnEliminar = `<button data-marco = ${full.lineaID} name="registro-eliminar" class="btn btn-outline-danger" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar productor">
                                  <i class="fas fa-trash"></i>
                                </button>`;
            return ` ${btnEliminar} ${btnVer} ${btnModificar}`;
          },
        },
      ];
      // Llamado a la función para crear la tabla con los datos
      cargarTabla("#TablaLineas", respuesta, columns);
    },
  });
}
function listarLineasDisponibles() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Lineas/controllers/listarLineasDisponibles.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#linea2").append(
          `<option data-sugerencia="${e.IMEI} ${e.Modelo} ${e.Marca}"  data-proyecto="${e.nombreProyecto}" value="${e.lineaID}">${e.numeroLinea}</option>`
        );
      });
    },
  });
}
function listarCelularesDisponibles() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Lineas/controllers/celularesDisponibles.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#Imei2").append(
          `<option value="${e.lineaDetalleID}">${e.IMEI} ${e.Modelo} ${e.Marca}</option>`
        );
      });
    },
  });
}
function cargarTabla(tableID, data, columns) {
  $(tableID).dataTable().fnClearTable();
  $(tableID).dataTable().fnDestroy();
  var params = {
    aaData: data,
    aoColumns: columns,
    bSortable: false,
    ordering: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
      buttons: {
        copy: "Copiar",
        colvis: "Visibilidad",
      },
    },
  };

  $(tableID).DataTable(params);
}
function eliminarRegistro(id) {
  console.log(id);
  Swal.fire({
    title: "¿Está seguro de eliminar?",
    text: "No podrá utilizarlo si lo elimina",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085D6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "./modules/Reportes/controllers/reportesGeneralEliminar.php",
        data: {
          recio: id,
        },
        // Error en la petición
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Equipo",
            icon: "error",
            text: `${error.responseText}`,
            confirmButtonColor: "#3085d6",
          });
        },
        // Petición exitosa
        success: function (respuesta) {
          console.log(respuesta);
          const datos = JSON.parse(respuesta);

          // Eliminado correctamente
          if (datos[0].status == 200) {
            Swal.fire({
              title: "Equipo",
              icon: "success",
              text: `${datos[0].mensaje}`,
              confirmButtonColor: "#3085d6",
            });

            // Actualizar los datos en tabla
            listarInventarioGeneral();
          }
          // Error
          else {
            Swal.fire({
              title: "Productor",
              icon: "error",
              text: `Ocurrió un error al intentar eliminar el registro.`,
              confirmButtonColor: "#3085d6",
            });
          }
        },
      });
    }
  });
}
function asignarLinea(losDatos) {
  $.ajax({
    type: "POST",
    url: "./modules/Lineas/controllers/asignarLinea.php",
    data: {
      losDatos: losDatos,
    },
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      console.log("Respuesta sin parsear:", respuesta);
    
      try {
        const resp = JSON.parse(respuesta);
        console.log("Respuesta parseada:", resp);
    
        if (resp[0].status == "200") {
          swal.fire("Lineas", "Linea asignada Correctamente", "success");
        } else {
          swal.fire("Lineas", resp[0].message, "warning");
        }
      } catch (error) {
        console.error("Error al analizar JSON:", error);
        swal.fire("Lineas", "Error en el formato de respuesta del servidor", "error");
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
        $("#usuario").append(
          `<option value="${e.UsuarioID}" data-codigo="${e.codigoUsuario}">${e.nombre}</option>`
        );
      });
    },
  });
}
