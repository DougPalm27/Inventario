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

      <div class="tab-content pt-2" id="myTabjustifiedContent">
        <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
          <div class="col-md-12 table-responsive">
            <table class="table align-items-center table-flush table-striped" id="tablaCategorias" name="tablaCategorias">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Categoria</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- End Default Tabs -->

      <div class="text-center">
        <a id="btnGuardar" onclick="guardarDatos()" class="btn btn-primary">Guardar</a>
        <button type="reset" class="btn btn-secondary">Limpiar</button>
      </div>
    </form>
  </div>
</div>