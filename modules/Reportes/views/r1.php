<div class="col-lg-12">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Inventario General</h5>
      <br>
      <!--             <button id="btnIngresarEquipo" name="btnIngresarEquipo" class="btn btn-primary"><i class="fas fa-save "></i>Ingresar Equipo</button>
            <button id="btnPrint" name="btnPrint" class="btn btn-warning"><i class="fas fa-print"></i>Imprimir Reporte</button>
 -->
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button data-bs-toggle="modal" data-bs-target="#ExtralargeModal" id="btnIngresarEquipo" name="btnIngresarEquipo" type="button" class="btn btn-primary"><i class="fas fa-save "></i>Ingresar Equipo</button>
        <button id="btnPrint" name="btnPrint" type="button" class="btn btn-warning"><i class="fas fa-print"></i>Imprimir Reporte</button>
      </div>
      <br>
      <hr>
      <div class="col-md-12 table-responsive">
        <table class="table align-items-center table-flush table-striped" id="r1" name="r1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID Equipo</th>
              <th scope="col">Descripción</th>
              <th scope="col">Categoria</th>
              <th scope="col">Precio de compra</th>
              <th scope="col">Fecha de compra</th>
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
        <h5 class="modal-title">Extra Large Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulario</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingName" placeholder="Nombre Completo">
                <label for="floatingName">Nombre Completo</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" placeholder="Correo Electronico">
                <label for="floatingEmail">Correo Electronico</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Address</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingCity" placeholder="City">
                  <label for="floatingCity">City</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" aria-label="State">
                  <option selected>New York</option>
                  <option value="1">Oregon</option>
                  <option value="2">DC</option>
                </select>
                <label for="floatingSelect">State</label>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
                <label for="floatingZip">Zip</label>
              </div>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div><!-- End Extra Large Modal-->