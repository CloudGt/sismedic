<?php require_once('Model/proveedores.php'); ?>
<style type="text/css">.activo {width: 1rem;height: 1rem;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;background: #5cb85c;}.noactivo {width: 1rem;height: 1rem;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;background: red;}
</style>

<button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#addproveedor">
  Agregar Proveedor
</button>
<table id="contenido" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Nit</th>
                  <th>Credito</th>
                  <th>Días de Credito</th>
                  <th>Pais</th>
                  <th>Nota</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                 <?php tabla($info); ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Telefono</th>
                  <th>Nit</th>
                  <th>Credito</th>
                  <th>Días de Credito</th>
                  <th>Pais</th>
                  <th>Nota</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
                  </tr>
                </tfoot>
              </table>
<!-- Add -->
<div class="modal fade" id="addproveedor" tabindex="-1" role="dialog" aria-labelledby="addproveedorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addproveedorLabel">Agregar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $send; ?>" method="POST" class="form">
      <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" required="true" name="nombre" id="nombre" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" class="form-control" required="true" name="direccion" id="direccion" placeholder="Direccion">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="number" class="form-control" required="true" name="telefono" id="telefono" placeholder="Telefono">
        </div>
        <div class="form-group">
          <label for="credito">Credito</label>
          <input type="text" class="form-control" required="true" name="credito" id="credito" placeholder="Credito">
        </div>
        <div class="form-group">
          <label for="dias_credito">Dias del Credito</label>
          <input type="number" class="form-control" required="true" name="dias_credito" id="dias_credito" placeholder="Dias del credito">
        </div>
        <div class="form-group">
          <label for="nit">Nit</label>
          <input type="text" class="form-control" required="true" name="nit" id="nit" placeholder="Nit">
        </div>
        <div class="form-group">
          <?php require_once('paises.html'); ?>
        </div>
        <div class="form-group">
          <label for="nota">Nota</label>
          <textarea class="form-control" name="nota" id="nota" placeholder="Nota"></textarea>
        </div>
        <div class="modal-footer">
        <button type="submit" name="new" class="btn btn-success">Guardar</button>
      </div>
    </form>
      </div>
      
    </div>
  </div>
</div>
<!-- view -->
<div class="modal fade" id="viewproveedor" tabindex="-1" role="dialog" aria-labelledby="viewproveedorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewproveedorLabel">Agregar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $send; ?>" method="POST" class="form">
      <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" required="true" name="nombre" id="nombre" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" class="form-control" required="true" name="direccion" id="direccion" placeholder="Direccion">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="number" class="form-control" required="true" name="telefono" id="telefono" placeholder="Telefono">
        </div>
        <div class="form-group">
          <label for="credito">Credito</label>
          <input type="text" class="form-control" required="true" name="credito" id="credito" placeholder="Credito">
        </div>
        <div class="form-group">
          <label for="dias_credito">Dias del Credito</label>
          <input type="number" class="form-control" required="true" name="dias_credito" id="dias_credito" placeholder="Dias del credito">
        </div>
        <div class="form-group">
          <label for="nit">Nit</label>
          <input type="text" class="form-control" required="true" name="nit" id="nit" placeholder="Nit">
        </div>
        <div class="form-group">
          <?php require_once('paises.html'); ?>
        </div>
        <div class="form-group">
          <label for="nota">Nota</label>
          <textarea class="form-control" name="nota" id="nota" placeholder="Nota"></textarea>
        </div>
        <div class="modal-footer">
        <button type="submit" name="new" class="btn btn-success">Guardar</button>
      </div>
    </form>
      </div>
      
    </div>
  </div>
</div>
