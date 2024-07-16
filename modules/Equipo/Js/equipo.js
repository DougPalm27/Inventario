$(document).ready(function () {
  listarUsuarios();
  listarEquipo();
  listarAsignaciones();
  listarMarcas();
  listarModelos();
  listarCategorias();
  listarProyectos();
  listarTodo();
  // -------------------------- TABLA ASIGNACIONES--------------------------
  $("#TablaAsignaciones").on("click", "button", function () {
    // Obtener el id que trae el botón
    let id = $(this).attr("data-id");
    idRegistro = id;
    console.log(idRegistro);
    // Obtener la acción a realizar
    let accion = $(this).attr("name");

    // Dependiendo del botón al que se le hace click
    // se realizará una acción transmitida por el atributo name
    if (accion == "registro-eliminar") {
      // Llamamos a la alerta para eliminar
      eliminarAsignacion(id);
    } else if (accion == "registro-imprimir") {
      const url = `./modules/Equipo/reports/custodios.php?id=${id}`;
      window.open(url);
    }
  }); // -------------------------- TABLA --------------------------
  $("#TablaDisponibles2").on("click", "button", function () {
    // Obtener el id que trae el botón
    let id = $(this).attr("data-id2");
    idRegistro = id;
    console.log(id);
    // Obtener la acción a realizar
    let accion = $(this).attr("name");

    // Dependiendo del botón al que se le hace click
    // se realizará una acción transmitida por el atributo name
    if (accion == "registro-baja") {
      // Llamamos a la alerta para eliminar
      mandarBaja(id);
    }
  });
  // evento change del select
  $("#usuarioID").on("change", function () {
    const valor = $("#usuarioID").val();
    let cod = $("#usuarioID option:selected").attr("data-codigo");
    $("#cempleado").val(cod);
    console.log(valor, cod);
  });

  $("#equipoID").on("change", function () {
    const valor = $("#equipoID").val();
    let proyecto = $("#equipoID option:selected").attr("data-proyecto");
    $("#proyectoID").val(proyecto);
    console.log(valor);
  });
  $("#btnGuardarAsignarEquipo").on("click", function () {
    let usuarioID = $("#usuarioID").val();
    let equipoID = $("#equipoID").val();
    let fechaAsignacion = $("#fechaAsignacionEquipo").val();
    let Observaciones = $("#Observaciones").val();
    let filtro = 1;

    let losDatos = {
      usuarioID: usuarioID,
      equipoID: equipoID,
      fechaAsignacion: fechaAsignacion,
      Observaciones: Observaciones,
    };
    console.log(losDatos);

    if (usuarioID == -1 || usuarioID.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no le estas asignando el equipo a Nadie, por favor selecciona un usuario",
        "warning"
      );
    } else if (equipoID == -1 || equipoID <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no estas seleccionando un equipo, por favor selecciona un equipo",
        "warning"
      );
    } else if (!fechaAsignacion) {
      Swal.fire(
        "Ups",
        "Por favor, selecciona una fecha de asignación",
        "warning"
      );
    } else if (!isValidDate(fechaAsignacion)) {
      Swal.fire(
        "Ups",
        "El formato de la fecha de asignación no es válido",
        "warning"
      );
    } else if (new Date(fechaAsignacion) > new Date()) {
      Swal.fire(
        "Ups",
        "La fecha de asignación no puede ser una fecha futura",
        "warning"
      );
    } else {
      guardarDatos(losDatos);
      listarAsignaciones();
    }
  });

  // evento click del botón guardar
  $("#btnEquipo").on("click", function () {
    let categoria2 = $("#categoria2").val();
    let fecha2 = $("#fecha2").val();
    let descripcion2 = $("#descripcion2").val();
    let serie2 = $("#serie2").val();
    let sap2 = $("#sap2").val();
    let marca2 = $("#marca2").val();
    let precio2 = $("#precio2").val();
    let modelo2 = $("#modelo2").val();
    let proyecto2 = $("#proyecto2").val();

    let losDatos2 = {
      categoria2: categoria2,
      fecha2: fecha2,
      descripcion2: descripcion2,
      serie2: serie2,
      sap2: sap2,
      precio2: precio2,
      marca2: marca2,
      modelo2: modelo2,
      proyecto2: proyecto2,
    };
    console.log(losDatos2);

    // Validación de campos
    if (categoria2 == -1 || categoria2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has seleccionado una categoría, por favor selecciona una.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (marca2 == -1 || marca2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has ingresado la marca, por favor ingresa una marca.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (modelo2 == -1 || modelo2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has ingresado el modelo, por favor ingresa un modelo.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (precio2 <= 0 || precio2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has ingresado un precio valido, por favor intenta de nuevo.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (descripcion2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has ingresado la descripción, por favor ingresa una descripción.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (serie2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has ingresado el número de serie, por favor ingresa un número de serie.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (sap2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has ingresado el codigo sap, por favor ingresa un número de serie.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (proyecto2 == -1 || proyecto2.length <= 0) {
      Swal.fire(
        "Ups",
        "Parece que no has ingresado el proyecto, por favor ingresa un proyecto.",
        "warning"
      );
      return; // Detiene la ejecución si la validación falla
    } else if (!fecha2) {
      Swal.fire(
        "Ups",
        "Por favor, selecciona una fecha de asignación",
        "warning"
      );
    } else if (!isValidDate(fecha2)) {
      Swal.fire("Ups", "El formato de la fecha de no es válida", "warning");
    } else if (new Date(fecha2) > new Date()) {
      Swal.fire(
        "Ups",
        "La fecha de asignación no puede ser una fecha futura",
        "warning"
      );
    } else {
      guardarNuevoEquipo(losDatos2);
      listarEquipo();
    }
  });
  $("#categoria2").on("change", function () {
    const valor = $("#categoria2").val();
  });
  $("#marca2").on("change", function () {
    const valor = $("#marca2").val();
  });
  $("#modelo2").on("change", function () {
    const valor = $("#modelo2").val();
  });
  $("#proyecto2").on("change", function () {
    const valor = $("#proyecto2").val();
  });
});

function guardarDatos(losDatos) {
  $.ajax({
    type: "POST", // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓN
    url: "./modules/Equipo/Controllers/asignarEquipo.php",
    data: {
      losDatos: losDatos,
    },
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      const resp = JSON.parse(respuesta);
      console.log(resp);

      if (resp[0].status == "200") {
        swal.fire(
          "Excelente",
          "Asignación registrada correctamente",
          "success"
        );
      } else if (resp[0] == "42000") {
        swal.fire(
          "Ups",
          "Este equipo ya tiene una asignación activa, elige otro",
          "warning"
        );
      } else {
        console.log(respuesta);
        console.log(JSON.parse(respuesta));
        swal.fire("Ups", respuesta, "warning");
      }
    },
  });
}

function guardarNuevoEquipo(losDatos2) {
  $.ajax({
    type: "POST", // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓN
    url: "./modules/Equipo/Controllers/guardarEquipo.php",
    data: {
      losDatos2: losDatos2,
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
        swal.fire("Excelente", "Equipo registrado correctamente", "success");
      } else if (resp[0] == "42000") {
        swal.fire(
          "Ups",
          "Este equipo ya tiene una asignación activa, elige otro",
          "warning"
        );
      } else {
        console.log(respuesta);
        console.log(JSON.parse(respuesta));
        swal.fire("Ups", respuesta, "warning");
      }
    },
  });
}

function listarUsuarios() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Generales/controllersGenerales/listarUsuario.php",
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
          `<option value="${e.UsuarioID}" data-codigo="${e.codigoUsuario}">${e.nombre}</option>`
        );
      });
    },
  });
}

function listarEquipo() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Generales/controllersGenerales/listarEquipo.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#equipoID").append(
          `<option value="${e.equipoID}" data-proyecto="${e.np}">${e.serie} - ${e.descripcionGeneral}</option>`
        );
      });

      var columns = [
        {
          mDataProp: "codigoSAP",
        },
        {
          mDataProp: "np",
        },
        {
          mDataProp: "nombreMarca",
        },
        {
          mDataProp: "nombreModelo",
        },
        {
          mDataProp: "serie",
        },
        {
          className: "text-left",

          render: function (data, types, full, meta) {
            let btnModificar = `<button data-id = ${full.equipoID} name="registro-editar2" class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="Editar productor">
                                      <i class="fas fa-pencil-alt"></i>
                                    </button>`;
            let btnEliminar = `<button data-id2 = ${full.equipoID} name="registro-baja" class="btn btn-outline-danger" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar productor">
                                    <i class="fas fa-trash"></i>
                                  </button>`;
            return ` ${btnEliminar}  ${btnModificar}`;
          },
        },
      ];
      // Llamado a la función para crear la tabla con los datos
      cargarTabla("#TablaDisponibles2", datos, columns);
    },
  });
}
function listarTodo() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Equipo/Controllers/todo.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      var columns = [
        {
          mDataProp: "codigoSAP",
        },
        {
          mDataProp: "np",
        },
        {
          mDataProp: "nombreMarca",
        },
        {
          mDataProp: "nombreModelo",
        },
        {
          mDataProp: "serie",
        },
        {
          mDataProp: "descripcion",
        },
      ];
      // Llamado a la función para crear la tabla con los datos
      cargarTabla("#todo", datos, columns);
    },
  });
}
// Función para validar el formato de la fecha
function isValidDate(dateString) {
  // Formato de fecha esperada: YYYY-MM-DD
  const regex = /^\d{4}-\d{2}-\d{2}$/;
  if (!dateString.match(regex)) return false;

  // Verificar si la fecha es válida
  const date = new Date(dateString);
  const timestamp = date.getTime();
  if (typeof timestamp !== "number" || Number.isNaN(timestamp)) return false;
  return dateString === date.toISOString().split("T")[0];
}

function listarAsignaciones() {
  // Petición
  $.ajax({
    type: "GET",
    url: "./modules/Equipo/Controllers/cargaTablaAsignaciones.php",
    dataType: "json",
    error: function (error) {
      console.log(error);
      Swal.fire({
        title: "Reporte",
        icon: "warning",
        text: `${error}`,
        confirmButtonColor: "#3085d6",
      });
    },
    success: function (respuesta) {
      // Creamos las columnas de nuestra tabla
      console.log(respuesta);
      var columns = [
        {
          mDataProp: "codigoSAP",
          width: 5,
        },
        {
          mDataProp: "Asignado",
          width: 30,
        },
        {
          mDataProp: "Proyecto",
          width: 5,
        },
        {
          mDataProp: "nombreMarca",
          width: 5,
        },
        {
          mDataProp: "nombreModelo",
          width: 5,
        },
        {
          mDataProp: "serie",
          width: 5,
        },
        {
          className: "text-left",
          width: 5,
          render: function (data, types, full, meta) {
            let btnImprimir = `<button data-id = ${full.asignacionID} name="registro-imprimir" class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="Editar productor">
                                      <i class="bx bxs-printer"></i>
                                    </button>`;
            let btnEliminar = `<button data-id = ${full.asignacionID} name="registro-eliminar" class="btn btn-outline-danger" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar productor">
                                    <i class="fas fa-trash"></i>
                                  </button>`;
            return ` ${btnImprimir} ${btnEliminar}`;
          },
        },
      ];
      // Llamado a la función para crear la tabla con los datos
      cargarTabla("#TablaAsignaciones", respuesta, columns);
    },
  });
}

function cargarTabla(tableID, data, columns) {
  $(tableID).dataTable().fnClearTable();
  $(tableID).dataTable().fnDestroy();
  var params = {
    aaData: data,

    aoColumns: columns,
    bSortable: true,
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
  $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
    $($.fn.dataTable.tables(true))
      .DataTable()
      .columns.adjust()
      .fixedColumns()
      .relayout();
  });
}

function eliminarAsignacion(id) {
  console.log(1);
  Swal.fire({
    title: "¿Está seguro?",
    text: "La asignacion de este equipo se eliminara, pero quedara en el historico",
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
        url: "./modules/Equipo/Controllers/eliminarasignacion.php",
        data: {
          recio: id,
        },
        // Error en la petición
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Cagada mi dog",
            icon: "error",
            text: "una cosa te pido y la estas cagando",
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
              title: "Listo calixto",
              icon: "success",
              text: `${datos[0].mensaje}`,
              confirmButtonColor: "#3085d6",
            });

            // Actualizar los datos en tabla
            listarAsignaciones();
          }
          // Error
          else {
            Swal.fire({
              title: "Cagada",
              icon: "error",
              text: `Ocurrió un error al intentar eliminar la asignacion.`,
              confirmButtonColor: "#3085d6",
            });
          }
        },
      });
    }
  });
}
function mandarBaja(id) {
  console.log(id);
  Swal.fire({
    title: "¿Está seguro?",
    text: "Este equipo pasara a un estado inactivo, pero quedara en el historico",
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
        url: "./modules/Equipo/Controllers/baja.php",
        data: {
          recio: id,
        },
        // Error en la petición
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Cagada mi dog",
            icon: "error",
            text: "una cosa te pido y la estas cagando",
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
              title: "Listo calixto",
              icon: "success",
              text: `${datos[0].mensaje}`,
              confirmButtonColor: "#3085d6",
            });

            // Actualizar los datos en tabla
            listarAsignaciones();
          }
          // Error
          else {
            Swal.fire({
              title: "Cagada",
              icon: "error",
              text: `Ocurrió un error al intentar inactivar equipo.`,
              confirmButtonColor: "#3085d6",
            });
          }
        },
      });
    }
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
        $("#marca2").append(
          `<option value="${e.marcaID}">${e.nombreMarca}</option>`
        );
      });
    },
  });
}

function listarModelos() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/Generales/controllersGenerales/listarModelos.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#modelo2").append(
          `<option value="${e.modeloID}">${e.nombreModelo}</option>`
        );
      });
    },
  });
}

function listarCategorias() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules//Generales/controllersGenerales/listarCategorias.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#categoria2").append(
          `<option value="${e.categoriaID}">${e.descripcion}</option>`
        );
      });
    },
  });
}

function listarProyectos() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules//Generales/controllersGenerales/listarProyectos.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#proyecto2").append(
          `<option value="${e.proyectoID}">${e.nombreProyecto}</option>`
        );
      });
    },
  });
}
