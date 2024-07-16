$(document).ready(function () {
     listarTarjetas();
     listarPorCategorias();
     listarPorProyecto();
       
  });
  
  
  
  function listarTarjetas() {
    // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
    $.ajax({
      type: "GET",
      url: "./modules/dasboard/controllers/listarEquipoPorGrupo.php",
      data: {},
      // Error en la petición
      error: function (error) {
        console.log(error);
      },
      // Petición exitosa
      success: function (respuesta) {
        let datos = JSON.parse(respuesta);
        datos.forEach((e) => {
          switch (e.descripcion) {
            case "lineas":
                    $("#cantidadLinea").text(e.disponible)
                break;
            case "equipo":
                    $("#cantidadEquipo").text(e.disponible)
                break;
            case "kit":
                    $("#cantidadKit").text(e.disponible)
                break;
            
          
            default:
                break;
          }
        });
      },
    });
  }
  
  function listarPorCategorias() {
    // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
    let categoria =[];
    let cantidad =[];
    $.ajax({
      type: "GET",
      url: "./modules/dasboard/controllers/listarEquipoPorCategoria.php",
      data: {},
      // Error en la petición
      error: function (error) {
        console.log(error);
      },
      // Petición exitosa
      success: function (respuesta) {
        let datos = JSON.parse(respuesta);
        datos.forEach((e) => {
            cantidad.push(e.cantidad);
            categoria.push(e.nombreCategoria);
        });

        new ApexCharts(document.querySelector("#barChart"), {
            series: [{
                data:cantidad,
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: categoria,
            }
        }).render();
  
        
      },
    });
  }

  function listarPorProyecto() {
    // POST  // GET   POST -Envia Recibe   | GET RECEPCIÓ
    let categoria =[];
    let cantidad =[];
    $.ajax({
      type: "GET",
      url: "./modules/dasboard/controllers/listarEqipoPorProyecto.php",
      data: {},
      // Error en la petición
      error: function (error) {
        console.log(error);
      },
      // Petición exitosa
      success: function (respuesta) {
        let datos = JSON.parse(respuesta);
        datos.forEach((e) => {
            cantidad.push(parseInt(e.cantidad));
            categoria.push(e.proyecto);
        });
       

        new ApexCharts(document.querySelector("#donutChart"), {
            series:cantidad,
            chart: {
                height: 350,
                type: 'donut',
                toolbar: {
                    show: true
                }
            },
            labels: categoria,
        }).render();
  
        
      },
    });
  }

  

  
  
  
  