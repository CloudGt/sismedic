<?php 
  session_start();
  $_SESSION['detalle'] = array();

  require_once 'Config/conexion.php';
  require_once 'Model/Producto.php';
  //require_once 'Model/newuser.php';

  $objProducto = new Producto();
  $resultado_producto = $objProducto->get();
  ?>
<html lang="es">
  <head>
    <title>Nuevo Usuario</title>
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
<legend>Nuevo Usuario</legend>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="nombre">Nombre Empleado</span>
  <input id="nombre" name="nombre" type="text" placeholder="Nombre del Empleado" class="form-control input-md" required>
</div>

<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="usuario">Usuario</span>
  <input id="usuario" name="usuario" type="text" placeholder="Usuario" class="form-control input-md" required>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="password">Contraseña</span>
  <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control input-md" required>
</div>
</fieldset>

</form>
<div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3 mt-3" style="margin-left: -0.9rem;">
  <button id ="btn_guardaruser" class="btn btn-success"  name="btn_guardaruser" type="submit">Guardar</button>
</div>
</div>

</body>
</html>