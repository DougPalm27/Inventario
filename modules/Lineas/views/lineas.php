<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Inventario General de Lineas</h5>
            <br>
            <!--             <button id="btnIngresarEquipo" name="btnIngresarEquipo" class="btn btn-primary"><i class="fas fa-save "></i>Ingresar Equipo</button>
            <button id="btnPrint" name="btnPrint" class="btn btn-warning"><i class="fas fa-print"></i>Imprimir Reporte</button>
 -->
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a data-bs-toggle="modal" data-bs-target="#ExtralargeModal" id="btnNuevaLinea" name="btnNuevaLinea" type="button" class="btn btn-primary"><i class="fas fa-save "></i>Nueva linea </a>
                <a id="btnAsignarLinea" name="btnAsignarLinea" type="button" class="btn btn-success"><i class="bi bi-chevron-bar-right"></i>Asignar linea</a>
                <a id="btnPrint" name="btnPrint" type="button" class="btn btn-warning"><i class="fas fa-print"></i>Imprimir Reporte</a>

            </div>
            <br>
            <hr>
            <div class="col-md-12 table-responsive">
                <table class="table align-items-center table-flush table-striped" id="TablaLineas" name="TablaLineas">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Linea</th>
                            <th scope="col">Asignado a</th>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Extra Large Modal -->
<div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingreso de Lineas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Floating Labels Form -->
                    <form id="modalLineas" name="modalLineas" class="row g-3 p-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="numeroLinea" name="numerolinea" placeholder="City">
                                <label for="floatingCity">Número Linea</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="codigoProyecto" name="codigoProyecto" aria-label="State">
                                    <option selected>Selecciona un Proyecto</option>
                                </select>
                                <label for="floatingSelect">Proyecto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fechaActivacion" name="fechaActivacion">
                                <label>Fecha de Activación</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="marca" name="marca">
                                    <option selected>Selecciona una Marca</option>
                                </select>
                                <label for="floatingSelect">Marca</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="modelo" name="modelo">
                                    <option selected>Selecciona un Modelo</option>
                                </select>
                                <label for="floatingSelect">Modelo</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Imei" name="Imei" placeholder="City">
                                <label for="floatingCity">IMEI</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fechaRenovacion" name="fechaRenovacion" placeholder="City">
                                <label for="floatingCity">Fecha de Renovacion</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento" placeholder="City">
                                <label for="floatingCity">Fecha de Vencimiento</label>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Quieres asignar este equipo de una vez?</label>
                        </div>
                    </form><!-- End floating Labels Form -->
                </div>
            </div>

            <div class="modal-footer">
                <a type="submit" class="btn btn-primary" id="btnGuardarLinea"><i class="bi bi-cloud-check-fill"></i> Guardar</a>
                <a type="reset" class="btn btn-secondary" id="btnLimpiarModal"><i class="bi bi-cloud-fog2"></i> Limpiar</a>
            </div>
        </div>
    </div>
</div><!-- End Extra Large Modal-->