<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Inventario General de Lineas</h5>
            <br>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a data-bs-toggle="modal" data-bs-target="#ExtralargeModal" id="btnNuevaLinea" name="btnNuevaLinea" type="button" class="btn btn-primary"><i class="fas fa-save "></i>Nueva linea </a>
                <a data-bs-toggle="modal" data-bs-target="#asignarLineaModal" id="btnAsignarLinea" name="btnAsignarLinea" type="button" class="btn btn-success"><i class="bi bi-chevron-bar-right"></i>Asignar linea</a>
                <a id="btnPrint" name="btnPrint" type="button" class="btn btn-warning"><i class="fas fa-print"></i>Imprimir Reporte</a>
            </div>
            <br>
            <hr>
            <!-- Default Tabs -->
            <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="asignadas" data-bs-toggle="tab" data-bs-target="#home-justified" type="button" role="tab" aria-controls="home" aria-selected="true">Lineas Asignadas</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="lineas" data-bs-toggle="tab" data-bs-target="#profile-justified" type="button" role="tab" aria-controls="profile" aria-selected="false">Lineas Disponibles</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="dispositivos" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Dispositivos Disponibles</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="original" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Listado Original</button>
                </li>
            </ul>

            <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
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
                <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-md-12 table-responsive">
                        <table class="table align-items-center table-flush table-striped" id="TablaLineasS" name="TablaLineas">
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
            </div><!-- End Default Tabs -->
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

<!-- Vertically centered Modal -->
<div class="modal fade" id="asignarLineaModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar Lineas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Floating Labels Form -->
                    <form id="modalLineas" name="modalLineas" class="row g-3 p-4">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="cempleado" name="cempleado" placeholder="City" disabled>
                                <label for="floatingCity">Codigo de Empleado</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="usuario" name="usuario" aria-label="State">
                                    <option selected value="-1">Selecciona un usuario</option>
                                </select>
                                <label for="floatingSelect">Usuario a asignar</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="linea2" name="linea2" aria-label="State">
                                    <option selected value="-1">Selecciona una Linea</option>
                                </select>
                                <label for="floatingSelect">Linea a asignar</label>
                            </div>
                        </div>

                        <div id="sugerencia">

                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="proyecto" name="proyecto" placeholder="City" disabled>
                                <label for="floatingCity">Linea pertenece al proyecto:</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="Imei2" name="Imei2">
                                    <option selected value="-1">Selecciona un dispositivo</option>
                                </select>
                                <label for="floatingSelect">Dispositivo celular (IMEI)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fechaAsignacion" name="fechaAsignacion" placeholder="City">
                                <label for="floatingCity">Fecha de asignación</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating" hidden>
                                <input type="date" class="form-control" id="fechadesAsignacion" name="fechadesAsignacion" placeholder="City">
                                <label for="floatingCity">Fecha de desasignación</label>
                            </div>
                        </div>
                    </form><!-- End floating Labels Form -->
                </div>
            </div>
            <div class="modal-footer">
                <a type="submit" class="btn btn-primary" id="btnGuardarAsignarLinea"><i class="bi bi-cloud-check-fill"></i> Guardar</a>
                <a type="reset" class="btn btn-secondary" id="btnLimpiarModalLinea"><i class="bi bi-cloud-fog2"></i> Limpiar</a>
            </div>
        </div>
    </div>
</div><!-- End Extra Large Modal-->