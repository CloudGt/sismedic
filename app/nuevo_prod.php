<?php 
  session_start();
  $_SESSION['detalle'] = array();

  require_once 'Config/conexion.php';
  require_once 'Model/Producto.php';
  require_once 'Model/nit.php';

  $objProducto = new Producto();
  $resultado_producto = $objProducto->get();
  ?>

<html lang="es">
  <head>
    <title>Carrito de Compras</title>
    <script type="text/javascript" src="libs/ajax.js"></script>
   <!-- Alertity -->
    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="libs/js/alertify/lib/alertify.min.js"></script>
  </head>
<body>



<form class="form-horizontal" role="form" data-toggle="validator">
<fieldset>

<!-- Form Name -->
<legend>Nuevo Producto</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idpresentacion">Presentación</label>
  <div class="col-md-8">
    <select id="idpresentacion" name="idpresentacion" class="form-control">
      <option value="1">Presentacion 1</option>
      <option value="2">Presentacion 2</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Ingrese Nombre de producto</label>  
  <div class="col-md-8">
  <input id="descripcion" name="descripcion" type="text" placeholder="" class="form-control input-md" required>
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="idprov">Seleccione Proveedor</label>
  <div class="col-md-8">
    <select id="idprov" name="idprov" class="form-control">
      <option value="1">Prov 1</option>
      <option value="2">Prov 2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipomedicamento">Venta</label>
  <div class="col-md-4">
    <select id="tipomedicamento" name="tipomedicamento" class="form-control">
      <option value="1">Etico</option>
      <option value="2">Popular</option>
      <option value="3">Leches</option>
      <option value="4">Genericos</option>
    </select>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Costo</span>
      <input id="precio" name="precio" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">A</span>
      <input id="precioa" name="precioa" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>

  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">B</span>
      <input id="preciob" name="preciob" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>

  <div class="">
    <div class="input-group">
      <span class="input-group-addon">C</span>
      <input id="precioc" name="precioc" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>


  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">D</span>
      <input id="preciod" name="preciod" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">E</span>
      <input id="precioe" name="precioe" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">F</span>
      <input id="preciof" name="preciof" class="form-control" placeholder="0.00" type="text">
    </div>
  </div>

</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="afecto">IVA</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="afecto">
      <input type="radio" name="afecto" id="afecto" value="0" checked="checked">
      Afecto
    </label>
    </div>
  <div class="radio">
    <label for="afecto">
      <input type="radio" name="afecto" id="afecto" value="1">
      Excento
    </label>
    </div>
  </div>
</div>

</fieldset>

</form>

<div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3">
  <button id ="btn_guardarprod" class="btn btn-success"  name="btn_guardarprod">Guardar</button>
</div>
</body>
</html>