<?php require('Model/nit.php'); ?>
<div class="form-inline mb-1 mt-3">
	<div class="col-xs-12 col-sm-6  col-md-5 input-group mb-2 mix">
		<input type="text" name="nombre" placeholder="Nombre" class="form-control" value="<?php echo $nombre; ?>" readonly="readonly">
	</div>
	<div class="col-xs-12 col-sm-6  col-md-5 input-group mb-2 mix lk1">
		<input type="text" name="ciudad" placeholder="Guatemala" class="form-control" value="<?php echo $direccion; ?>" readonly="readonly">
	</div>
	<hr />
</div>