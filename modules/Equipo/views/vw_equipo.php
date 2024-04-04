<div class="card">
  <div class="card-body">
    <h5 class="card-title">Formulario para Ingresar Equipo</h5>



    <!-- Floating Labels Form -->
    <form class="row g-3">

      <div class="col-md-6">
        <div class="form-floating mb-3">
          <select class="form-select" id="categoriaID" name="categoriaID" aria-label="State">
            <option value="-1" selected>Selecciona una categoria</option>
          </select>
          <label for="floatingSelect">Categoria</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="date" class="form-control" id="fechaAdquisicion" name="fechaAdquisicion" placeholder="Password">
          <label for="floatingPassword">Fecha de Compra</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="number" class="form-control" id="precioAdquisicion" placeholder="City">
          <label for="precioAdquisicion">Precio de Compra</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating mb-3">
          <select class="form-select" id="proveedorID" name="proveedorID" aria-label="State">
            <option selected>Selecciona un proveedor</option>

          </select>
          <label for="floatingSelect">Proveedor</label>
        </div>
      </div>

      <div class="col-12">
        <div class="form-floating">
          <textarea class="form-control" placeholder="" id="floatingTextarea" id="descripcionGeneral" name="descripcionGeneral" style="height: 100px;"></textarea>
          <label for="floatingTextarea">Descripcion</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="serie" name="serie" placeholder="City">
            <label for="floatingCity">Serie</label>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating mb-3">
          <select class="form-select" id="ubicacionID" name="ubicacionID" aria-label="State">
            <option selected>Selecciona una ubicación</option>

          </select>
          <label for="floatingSelect">Ubicación</label>
        </div>
      </div>

      <div class="text-center">
        <a type="submit" class="btn btn-primary" id="btnGuardarEquipo"><i class="bi bi-cloud-check-fill"></i> Guardar</a>
        <a type="reset" class="btn btn-secondary" id="btnLimpiarEquipo"><i class="bi bi-cloud-fog2"></i> Limpiar</a>
      </div>
    </form><!-- End floating Labels Form -->
            </div>
</div>