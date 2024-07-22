$(document).ready(function () {
  $(".Select2Modal1").select2({
    width: "100%",
    dropdownParent: $("#nuevoEquipo"),
  });
  listarKit();
  listarUsuarios();
  listarProyectos();

  $("#btnKit").on("click", function () {
    let losDatos = {
      descripcion: $("#descripcion").val(),
      precio: $("#precio").val(),
      proyecto: $("#proyecto").val(),
      fecha: $("#fecha").val(),
      sap: $("#sap").val(),
    };
    console.log(losDatos);
    if (losDatos.descripcion.trim() === "" || losDatos.descripcion.length < 3) {
      swal.fire({
        icon: "error",
        title: "Error en la descripción",
        text: "La descripción no debe estar vacía y debe tener al menos 3 caracteres.",
      });
      return false; // Detener el envío del formulario
    }

    // Validación del precio
    else if (
      !/^\d+$/.test(losDatos.precio) ||
      parseFloat(losDatos.precio) < 0
    ) {
      swal.fire({
        icon: "error",
        title: "Error en el precio",
        text: "El precio debe ser un número positivo.",
      });
      return false; // Detener el envío del formulario
    }

    // Validación del proyectoID
    else if (
      !/^\d+$/.test(losDatos.proyecto) ||
      parseInt(losDatos.proyecto) <= 0
    ) {
      swal.fire({
        icon: "error",
        title: "Error en el ID del proyecto",
        text: "El ID del proyecto debe ser un número mayor que 0.",
      });
      return false; // Detener el envío del formulario
    }
    if (losDatos.fecha.trim() === "") {
      swal.fire({
        icon: "error",
        title: "Error en la fecha",
        text: "La fecha no debe estar vacía.",
      });
      return false; // Detener el envío del formulario
    }

    // Validación del campo SAP
    if (!/^[a-zA-Z0-9]+$/.test(losDatos.sap)) {
      swal.fire({
        icon: "error",
        title: "Error en el campo SAP",
        text: "El campo SAP solo debe contener letras y números.",
      });
      return false; // Detener el envío del formulario
    }
    guardarKit(losDatos);
  });

  $("#btnAsgKit").on("click", function () {
    let losDatos = {
      usuario: $("#usuario2").val(),
      kit: $("#kitID").val(),
      fecha: $("#fechaAsignacionKit").val(),
      observaciones: $("#observaciones").val(),
    };
    console.log(losDatos);
    // Validación de usuario y kit
    if (losDatos.usuario <= 0) {
      swal.fire("Ups", "Debes seleccionar un usuario", "warning");
      return;
    }

    if (losDatos.kit <= 0) {
      swal.fire("Ups", "Debes seleccionar un equipo", "warning");
      return;
    }

    // Validación de fecha
    if (!isValidDate(losDatos.fecha)) {
      swal.fire("Ups", "La fecha proporcionada no es válida", "warning");
      return;
    }

    // Confirmación de observaciones vacías
    if (losDatos.observaciones.trim() === "") {
      swal
        .fire({
          title: "¿Deseas guardar la asignación sin observaciones?",
          text: "El campo de observaciones está vacío.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sí, guardar",
          cancelButtonText: "No, cancelar",
        })
        .then((result) => {
          if (result.isConfirmed) {
            console.log(losDatos);
            asignacionKit(losDatos);
          }
        });
    } else {
      console.log(losDatos);
      asignacionKit(losDatos);
    }
  });


  $("#usuario2").on("change", function () {
    const valor = $("#usuario2").val();
    $("#usuario2").val(valor);

    let cod =$("#usuario2 option:selected").attr("data-codigo");
    $("#cempleado").val(cod);
  });
  $("#kitID").on("change", function () {
    const valor = $("#kitID").val();
    let np = $("#kitID option:selected").attr("data-nombre");
    $("#proyectoID").val(np);
  });

  //Modal de registro de kitr
  $("#proyecto").on("change", function () {
    const valor = $("#proyecto").val();
    $("#proyecto").val(valor);
    console.log(valor);
  });
});

function guardarKit(losDatos) {
  console.log(losDatos);
  $.ajax({
    type: "POST",
    url: "./modules/Kit/controllers/ctr_kit.php",
    data: {
      losDatos: losDatos,
    },
    error: function (error) {
      console.log(error);
    },
    success: function (respuesta) {
      console.log(respuesta);
      const resp = JSON.parse(respuesta);
      console.log(resp);

      if (resp[0].status == "200") {
        swal
          .fire("Enhorabuena", "Kit registrado Correctamente", "success")
          .then(() => {
            window.location.reload();
          });
      } else if (resp[0] == "23000") {
        swal.fire(
          "Ups",
          "Parece que estas duplicando el Codigo SAP",
          "warning"
        );
      }
    },
  });
}
function listarKit() {
  // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
  $.ajax({
    type: "GET",
    url: "./modules/kit/controllers/listarKit.php",
    data: {},
    // Error en la petición
    error: function (error) {
      console.log(error);
    },
    // Petición exitosa
    success: function (respuesta) {
      let datos = JSON.parse(respuesta);
      datos.forEach((e) => {
        $("#kitID").append(
          `<option value="${e.kitID}" data-nombre="${e.nombreProyecto}" data-codigo="${e.proyectoID}">${e.kit}</option>`
        );
      });
      console.log(datos);
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

function capitalizeText(text) {
  return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

function asignacionKit(losDatos) {
  $.ajax({
    type: "POST",
    url: "./modules/Kit/controllers/ctr_kitAsignacion.php",
    data: {
      losDatos: losDatos,
    },
    error: function (error) {
      console.log(error);
    },
    success: function (respuesta) {
      console.log(respuesta);
      const resp = JSON.parse(respuesta);
      console.log(resp);

      if (resp[0].status == "200") {
        swal
          .fire("Enhorabuena", "Kit registrado Correctamente", "success")
          .then(() => {
            window.location.reload();
          });
      }
    },
  });
}

// Función para validar la fecha
function isValidDate(dateString) {
  let regEx = /^\d{4}-\d{2}-\d{2}$/;
  if (!dateString.match(regEx)) return false; // Formato inválido
  let d = new Date(dateString);
  let dNum = d.getTime();
  if (!dNum && dNum !== 0) return false; // Fecha inválida
  return d.toISOString().slice(0, 10) === dateString;
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
        $("#usuario2").append(
          `<option value="${e.UsuarioID}" data-codigo="${e.codigoUsuario}">${e.nombre}</option>`
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
        $("#proyecto").append(
          `<option value="${e.proyectoID}">${e.nombreProyecto}</option>`
        );
      });
    },
  });
}

