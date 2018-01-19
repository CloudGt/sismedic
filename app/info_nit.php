<?php require('Model/nit.php'); ?>
<div class="form-inline mb-1">
<br>
<!--
	<div class="col-sm-2 col-xl-2 col-md-2	 input-group mb-2 mr-sm-2">
		<input type="text" name="nit" placeholder="Nit" id="nit" class="form-control" value="<?php echo $nit;?>" disabled>
	</div> -->	
	<div class="col-sm-6 col-xl-6 col-md-6 input-group mb-2 mr-sm-2">
		<input type="text" name="nombre" placeholder="Nombre" class="form-control" value="<?php echo $nombre; ?>" disabled>
	</div>
	<div class="col-sm-5 col-xl-5 col-md-5 input-group mb-2 mr-sm-2">
		<input type="text" name="ciudad" placeholder="Guatemala" class="form-control" value="<?php echo $direccion; ?>"disabled>
	</div>
	<hr />
</div>