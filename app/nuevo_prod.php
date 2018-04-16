<?php 
  session_start();
  $_SESSION['detalle'] = array();

  require_once 'Config/conexion.php';
  require_once 'Model/Producto.php';
  require_once 'Model/newproducto.php';

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
<div class="container">
<form class="form-horizontal" role="form" data-toggle="validator" method="GET">
<fieldset>
<!-- Form Name -->
<legend>Nuevo Producto</legend>
<!-- Select Basic -->

<div class="input-group">
    <span class="input-group-addon col-5 col-sm-5 col-md-5 col-xl-5" id="xEmpresa">Empresa</span>
    <select id="id_empresa" name="id_empresa" class="form-control input-md" required>
      <?php empresa($empresa); ?>
    </select>    
</div>

<div class="input-group">
    <span class="input-group-addon col-5 col-sm-5 col-md-5 col-xl-5" id="xPresentación">Presentación</span>
     <select id="idpresentacion" name="idpresentacion" class="form-control input-md">
      <?php presentacion($present); ?>
    </select>   
</div>
<div class="input-group">
    <span class="input-group-addon col-5 col-sm-5 col-md-5 col-xl-5" id="xdescripcion">Nombre de producto</span>
    <input id="descripcion" name="descripcion" type="text" placeholder="" class="form-control input-md" required>
</div>

<div class="input-group">
    <span class="input-group-addon col-5 col-sm-5 col-md-5 col-xl-5" id="xidprov">Casa medica</span>
    <select id="idprov" name="idprov" class="form-control  input-md">
      <?php casa_medica($provv); ?>
    </select>
</div>

<div class="input-group">
    <span class="input-group-addon col-5 col-sm-5 col-md-5 col-xl-5" id="xtipomedicamento">Tipo de medicamento</span>
    <select id="tipomedicamento" name="tipomedicamento" class="form-control">
      <?php tipomedicamento($tipo_medic); ?>
    </select>
</div>

<!-- 
<div class="form-group">
  <label class="col-md-4 control-label" for="id_empresa">Empresa</label>
  <div class="col-md-8">
    <select id="id_empresa" name="id_empresa" class="form-control">
      <?php empresa($empresa); ?>
    </select>    
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="idpresentacion">Presentación</label>
  <div class="col-md-8">
    <select id="idpresentacion" name="idpresentacion" class="form-control">
      <?php presentacion($present); ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Ingrese Nombre de producto</label>  
  <div class="col-md-8">
  <input id="descripcion" name="descripcion" type="text" placeholder="" class="form-control input-md" required>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="idprov">Seleccione Casa medica</label>
  <div class="col-md-8">
    <select id="idprov" name="idprov" class="form-control">
      <?php casa_medica($provv); ?>
    </select>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="tipomedicamento">Tipo de medicamento</label>
  <div class="col-md-4">
    <select id="tipomedicamento" name="tipomedicamento" class="form-control">
      <?php tipomedicamento($tipo_medic); ?>
    </select>
  </div>
</div>
-->
<hr />
<div class="input-group">
  <span class="input-group-addon col-3 col-sm-3 col-md-3 col-xl-3" id="xcosto">Costo</span>
  <input id="precio" name="precio" class="form-control" placeholder="0.00" type="text" class="form-control input-md" required>
</div>
<div class="input-group">
   <span class="input-group-addon col-1 col-sm-1 col-md-1 col-xl-1" id="xprecioa">A</span>
  <input id="precioa" name="precioa" class="form-control col-3 col-sm-3 col-md-3 col-xl-3" placeholder="0.00" type="text" class="form-control input-md" >

  <span class="input-group-addon col-1 col-sm-1 col-md-1 col-xl-1" id="xpreciob">B</span>
  <input id="preciob" name="preciob" class="form-control col-3 col-sm-3 col-md-3 col-xl-3" placeholder="0.00" type="text" class="form-control input-md" >

  <span class="input-group-addon col-1 col-sm-1 col-md-1 col-xl-1" id="xprecioc">C</span>
  <input id="precioc" name="precioc" class="form-control col-3 col-sm-3 col-md-3 col-xl-3" placeholder="0.00" type="text" class="form-control input-md" >
</div>
<div class="input-group">
  <span class="input-group-addon col-1 col-sm-1 col-md-1 col-xl-1" id="xpreciod">D</span>
  <input id="preciod" name="preciod" class="form-control col-3 col-sm-3 col-md-3 col-xl-3" placeholder="0.00" type="text" class="form-control input-md" >

  <span class="input-group-addon col-1 col-sm-1 col-md-1 col-xl-1" id="xprecioe">E</span>
  <input id="precioe" name="precioe" class="form-control col-3 col-sm-3 col-md-3 col-xl-3" placeholder="0.00" type="text" class="form-control input-md" >

  <span class="input-group-addon col-1 col-sm-1 col-md-1 col-xl-1" id="xpreciof">F</span>
  <input id="preciof" name="preciof" class="form-control col-3 col-sm-3 col-md-3 col-xl-3" placeholder="0.00" type="text" class="form-control input-md" >

</div>
<hr />
<div class="input-group">
  <label class="btn btn-default col-3 col-sm-3 col-md-3 col-xl-3">IVA</label>    
  <label class="btn btn-info"><input type="radio" name="afecto" id= "afecto"  value= 0 checked="checked">Afecto</label>
  <label class="btn btn-info"><input type="radio" name="afecto" id= "afecto"  value= 1>Execto</label>
  </span>
</div>
<hr />

<!-- Multiple Radios
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
 -->
<div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3">
  <button id ="btn_guardarprod" class="btn btn-success"  name="btn_guardarprod">Guardar</button>
</div>
</div>

</body>
</html>