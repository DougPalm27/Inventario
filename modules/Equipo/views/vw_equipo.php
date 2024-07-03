<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Inventario General de Equipo</h5>
            <br>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a data-bs-toggle="modal" data-bs-target="#ExtralargeModal" id="btnNuevoEquipo" name="btnNuevoEquipo" type="button" class="btn btn-primary"><i class="fas fa-save "></i>Nuevo equipo</a>
                <a data-bs-toggle="modal" data-bs-target="#asignarEquipoModal" id="btnAsignarEquipo" name="btnAsignarEquipo" type="button" class="btn btn-success"><i class="bi bi-chevron-bar-right"></i>Asignar equipo</a>
                <a data-bs-toggle="modal" data-bs-target="#asignarLineaModal" id="btnAsignarExtra" name="btnAsignarExtra" type="button" class="btn btn-secondary"><i class="bi bi-chevron-bar-right"></i>Asignacion extraordinaria</a>
                <a id="btnPrint" name="btnPrint" type="button" class="btn btn-warning"><i class="fas fa-print"></i>Imprimir Reporte</a>
            </div>
            <br>
            <hr>

            <!-- Default Tabs -->
            <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="equipoAsignado" data-bs-toggle="tab" data-bs-target="#ss" type="button" role="tab" aria-controls="home" aria-selected="true">Equipo Asignado</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="equipoDisponible" data-bs-toggle="tab" data-bs-target="#disponible" type="button" role="tab" aria-controls="profile" aria-selected="false">Equipo disponible</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="dispositivos" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Equipo de baja</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="original" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Todo el equipo</button>
                </li>
            </ul>

            <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="ss" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-md-12 table-responsive">
                        <table class="table align-items-center table-flush table-striped" id="TablaAsignaciones" name="TablaAsignaciones">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Codigo SAP</th>
                                    <th scope="col">Asignado a</th>
                                    <th scope="col">Proyecto</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Serie</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="disponible" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-md-12 table-responsive">
                    <table class="table align-items-center table-flush table-striped" id="TablaDisponibles2" name="TablaDisponibles2">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Codigo SAP</th>
                                    <th scope="col">Proyecto</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Serie</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Default Tabs -->
        </div>
    </div>
</div>
</div>

<!-- Extra Large Modal -->
<!-- <div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingreso de Lineas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">

                    <form id="modalLineas" name="modalLineas" class="row g-3 p-4" novalidate>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="numeroLinea" name="numerolinea" placeholder="City"  require>
                                <label for="floatingCity">Número Linea</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="codigoProyecto" name="codigoProyecto" php-email-form aria-label="State">
                                    <option selected>Selecciona un Proyecto</option>
                                </select>
                                <label for="floatingSelect">Proyecto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fechaActivacion" php-email-form  name="fechaActivacion">
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
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <a type="submit" class="btn btn-primary" id="btnGuardarLinea"><i class="bi bi-cloud-check-fill"></i> Guardar</a>
                <a type="reset" class="btn btn-secondary" id="btnLimpiarModal"><i class="bi bi-cloud-fog2"></i> Limpiar</a>
            </div>
        </div>
    </div>
</div> -->

<!-- Vertically centered Modal -->
<div class="modal fade" id="asignarEquipoModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar Equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Floating Labels Form -->
                    <form id="modalLineas" name="modalEquiposAsignacion" class="row g-3 p-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="cempleado" name="cempleado" placeholder="City" disabled>
                                <label for="cempleado">Codigo de Empleado</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="usuarioID" name="usuarioID" aria-label="State">
                                    <option selected value="-1">Selecciona un usuario</option>
                                </select>
                                <label for="floatingSelect">Usuario a asignar</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="equipoID" name="equipoID" aria-label="State">
                                    <option selected value="-1">Selecciona un Equipo</option>
                                </select>
                                <label for="floatingSelect">Equipo a asignar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="proyectoID" name="proyectoID" placeholder="City" disabled>
                                <label for="proyectoID">Pertenece al proyecto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fechaAsignacionEquipo" name="fechaAsignacionEquipo" placeholder="City">
                                <label for="floatingCity">Fecha de asignación</label>
                            </div>
                        </div>

                        <div id="sugerencia">

                        </div>

                    </form><!-- End floating Labels Form -->
                </div>
            </div>
            <div class="modal-footer">
                <a type="submit" class="btn btn-primary" id="btnGuardarAsignarEquipo"><i class="bi bi-cloud-check-fill"></i> Guardar</a>
                <a type="reset" class="btn btn-secondary" id="btnLimpiarModalEquipo"><i class="bi bi-cloud-fog2"></i> Limpiar</a>
            </div>
        </div>
    </div>
</div><!-- End Extra Large Modal-->