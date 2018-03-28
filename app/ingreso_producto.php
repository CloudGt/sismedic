<?php 
  session_start();
  $_SESSION['detalle'] = array();

  require_once 'Config/conexion.php';
  require_once 'Model/Producto.php';
  require_once 'Model/addproducto.php';

  $objProducto = new Producto();
  $resultado_producto = $objProducto->get();
  ?>
<html lang="es">
  <head>
    <title>Ingreso de producto</title>
    <script type="text/javascript" src="libs/ajax.js"></script>
   <!-- Alertity -->
    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="libs/js/alertify/lib/alertify.min.js"></script>
  </head>
<body>
<div class="container">
<form class="form-horizontal" role="form" data-toggle="validator" method="GET">
<fieldset>
<!-- Form Name -->
<legend>Ingreso de Mercaderia</legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="id_proveedor">Casa Medica</label>
  <div class="col-md-8">
    <select id="id_proveedor" name="id_proveedor" class="form-control">
      <?php casa_medica($casa_medica); ?>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="idproducto">Codigo Producto</label>  
  <div class="col-md-8">
  <input id="idproducto" name="idproducto" type="text" placeholder="" class="form-control input-md" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="producto">Producto</label>
  <div class="col-md-8">
    <select id="producto" name="producto" class="form-control">
      <?php producto($producto); ?>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="cantidad">Cantidad</label>
  <div class="col-md-8">
   <input type="number" name="cantidad" id="cantidad" class="form-control">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fechaingreso">Fecha Ingreso</label>  
  <div class="col-md-8">
  <input id="fechaingreso" name="fechaingreso" type="date" placeholder="" class="form-control input-md" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fechavence">Fecha Vencimiento</label>  
  <div class="col-md-8">
  <input id="fechavence" name="fechavence" type="date" placeholder="" class="form-control input-md" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="documento">Documento</label>  
  <div class="col-md-8">
  <input id="documento" name="documento" type="text" placeholder="" class="form-control input-md" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="serie_fac">Serie</label>  
  <div class="col-md-8">
  <input id="serie_fac" name="serie_fac" type="text" placeholder="" class="form-control input-md" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="lote">Codigo Barra/Lote</label>  
  <div class="col-md-8">
  <input id="lote" name="lote" type="text" placeholder="" class="form-control input-md" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="usuario">Usuario</label>  
  <div class="col-md-8">
  <input id="usuario" name="usuario" type="text" placeholder="None" value="<?php echo $usuario; ?>" class="form-control input-md" required disabled="true">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="id_bodega">Bodega</label>
  <div class="col-md-8">
    <select id="id_bodega" name="id_bodega" class="form-control">
      <?php bodega($bodega); ?>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="preciounitario">Precio Unitario</label>
  <div class="col-md-8">
    <input type="number" name="preciounitario" id="preciounitario" class="form-control">
  </div>
</div>
</fieldset>
</form>
<div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3">
  <button id ="btn_addprod" class="btn btn-success"  name="btn_addprod">Guardar</button>
</div>
</div>
</body>
</html>