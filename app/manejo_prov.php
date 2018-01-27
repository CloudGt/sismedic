<?php require_once('Model/proveedores.php'); ?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproveedor">
  Agregar Proveedor
</button>























<!-- Modal -->
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
  			  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
  			</div>
  			<div class="form-group">
  			  <label for="direccion">Direccion</label>
  			  <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion">
  			</div>
  			<div class="form-group">
  			  <label for="telefono">Telefono</label>
  			  <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
  			</div>
  			<div class="form-group">
  			  <label for="credito">Credito</label>
  			  <input type="text" class="form-control" name="credito" id="credito" placeholder="Credito">
  			</div>
  			<div class="form-group">
  			  <label for="dias_credito">Dias del Credito</label>
  			  <input type="number" class="form-control" name="dias_credito" id="dias_credito" placeholder="Dias del credito">
  			</div>
  			<div class="form-group">
  			  <label for="nit">Nit</label>
  			  <input type="text" class="form-control" name="nit" id="nit" placeholder="Nit">
  			</div>
  			<div class="form-group">
  			  <?php require_once('paises.html'); ?>
  			</div>
  			<div class="form-group">
  			  <label for="nota">Nota</label>
  			  <textarea class="form-control" name="nota" id="nota" placeholder="Nota"></textarea>
  			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
