        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reporte de Equipo Total por Categoria y Estado</h5>

                    <div class="row">
                        <!-- Inputs y botón de búsqueda aquí -->
                    </div>
                    <br>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Disponible</th>
                                    <th scope="col">En Reparación</th>
                                    <th scope="col">Fuera de Servicio</th>
                                    <th scope="col">Existencias Totales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Celulares</td>
                                    <td>40</td>
                                    <td>10</td>
                                    <td>5</td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>Portátil</td>
                                    <td>25</td>
                                    <td>7</td>
                                    <td>3</td>
                                    <td>35</td>
                                </tr>
                                <tr>
                                    <td>Tableta</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>2</td>
                                    <td>37</td>
                                </tr>
                                <tr>
                                    <td>Monitor</td>
                                    <td>17</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>Cámara</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>11</td>
                                </tr>
                                
                                <!-- Más filas aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>
                     <!-- Website Traffic -->
              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 40,
                          name: 'Celulares'
                        },
                        {
                          value: 25,
                          name: 'Portatiles'
                        },
                        {
                          value: 30,
                          name: 'Tabletas'
                        },
                        {
                          value: 17,
                          name: 'Monitor'
                        },
                        {
                          value: 10,
                          name: 'Camara'
                        }
                      ]
                    }]
                  });
                });
              </script>
          </div><!-- End Website Traffic -->
            </div>
    </div>

