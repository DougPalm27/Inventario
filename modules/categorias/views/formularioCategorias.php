<div class="card">
  <div class="card-body">
    <h5 class="card-title">Categorias</h5>
    <form class="row g-3">
      <div class="col-md-6">
        <div class="form-floating">
          <input id="categoria" name="categoria" type="text" class="form-control" placeholder="Nueva Categoría">
          <label for="floatingName">Nueva Categoría</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input id="codigoCategoria" name="codigoCategoria" type="text" class="form-control"
            placeholder="Código Categoría">
          <label for="floatingEmail">Código Categoría</label>
        </div>
      </div>
      <div class="text-center">
        <a id="btnGuardar" onclick="guardarDatos()" class="btn btn-primary">Guardar</a>
        <button type="reset" class="btn btn-secondary">Limpiar</button>
      </div>
    </form>
  </div>
</div>