<div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Reporte Historico a Nivel de Usuario</h5>


        <div class="row">
            <div class="col-md-4">
                <input type="date" id="fechaInput" placeholder="Fecha" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="text" id="usuarioInput" placeholder="Usuario ID" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="text" id="equipoInput" placeholder="Equipo ID" class="form-control">
            </div>
            <div class="col-md-12 mt-3">
                <button class="submit btn btn-primary" onclick="buscar()">Buscar</button>
            </div>
        </div>
        <br>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Usuario Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Equipo ID</th>
                            <th scope="col">Equipo</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Fecha Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los datos de los usuarios irían aquí. Ejemplo: -->
                        <tr>
                            <td>010101</td>
                            <td>Douglas</td>
                            <td>2020050HJF</td>
                            <td>Hp Pavilion</td>
                            <td>14/09/2022</td>
                            <td>14/11/2022</td>
                        </tr>
                        <tr>
                            <td>010101</td>
                            <td>Douglas</td>
                            <td>2023050HJF</td>
                            <td>Dell</td>
                            <td>14/11/2022</td>
                            <td>Actualidad</td>
                        </tr>
                        <tr>
                            <td>010101</td>
                            <td>Douglas</td>
                            <td>2023050HJF</td>
                            <td>Xiaomi</td>
                            <td>14/09/2022</td>
                            <td>Actualidad</td>
                        </tr>
                        <!-- Añadir más filas según sea necesario -->
                    </tbody>
                </table>
            </div>

            <!--grafico-->
<!-- Line Chart -->
<div id="reportsChart"></div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    new ApexCharts(document.querySelector("#reportsChart"), {
      series: [{
        name: 'Computadoras',
        data: [31, 40, 28, 51, 42, 82, 56],
      }, {
        name: 'Celulares',
        data: [11, 32, 45, 32, 34, 52, 41]
      },],
      chart: {
        height: 350,
        type: 'area',
        toolbar: {
          show: false
        },
      },
      markers: {
        size: 4
      },
      colors: ['#4154f1', '#2eca6a', '#ff771d'],
      fill: {
        type: "gradient",
        gradient: {
          shadeIntensity: 1,
          opacityFrom: 0.3,
          opacityTo: 0.4,
          stops: [0, 90, 100]
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 2
      },
      xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy HH:mm'
        },
      }
    }).render();
  });
</script>
<!-- End Line Chart -->

        </div>
    </div>
    </div>
        </div>

