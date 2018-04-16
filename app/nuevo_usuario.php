<?php 
  session_start();
  $_SESSION['detalle'] = array();

  require_once 'Config/conexion.php';
  require_once 'Model/Producto.php';
  require_once 'Model/newuser.php';

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
<form class="form-horizontal" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
<fieldset>
<legend>Nuevo Usuario</legend>
<?php if ($edit == 1): ?>
  <div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="nombre">Nombre Colaborador</span>
  <input id="xnombre" name="xnombre" type="text" placeholder="Nombre de colaborador" class="form-control input-md" required value="<?php echo $nombre; ?>">
</div>
<input type="hidden" name="xid" id="xid" value="<?php echo $id; ?>">
<?php endif ?>
<?php if ($edit == 0): ?>
  <div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="nombre">Nombre Colaborador</span>
  <input id="xnombre" name="xnombre" type="text" placeholder="Nombre de colaborador" class="form-control input-md" required>
</div>
<?php endif ?>
<?php if ($edit == 1): ?>
  <div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="usuario">Usuario</span>
  <input id="xusuario" name="xusuario" type="text" placeholder="Usuario" class="form-control input-md" required value="<?php echo $usuario; ?>">
</div>
<?php endif ?>
<?php if ($edit == 0): ?>
  <div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="usuario">Usuario</span>
  <input id="xusuario" name="xusuario" type="text" placeholder="Usuario" class="form-control input-md" required>
</div>
<?php endif ?>
<?php if ($edit == 1): ?>
   <div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="password">Contraseña</span>
  <input id="xpassword" name="xpassword" type="password" placeholder="Contraseña  (Dejar vacio si no se quiere modificar)" class="form-control input-md" required>
</div>
<?php endif ?>
<?php if ($edit == 0): ?>
  <div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="password">Contraseña</span>
  <input id="xpassword" name="xpassword" type="password" placeholder="Contraseña" class="form-control input-md" required>
</div>
<?php endif ?>
<?php if ($edit == 1): ?>
  
<?php endif ?>
<?php if ($edit == 0): ?>
  <div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xpic">Imagen de perfil</span>
  <input id="xpic" name="xpic" type="file" class="form-control input-md" required>
</div>
<?php endif ?>
</fieldset>
</form>
<?php if ($edit == 1): ?>
  <div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3 mt-3" style="margin-left: -0.9rem;">
    <button id ="btn_updateuser" class="btn btn-success"  name="btn_updateuser">Actualizar</button>
  </div>
<?php endif ?>
<?php if ($edit == 0): ?>
  <div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3 mt-3" style="margin-left: -0.9rem;">
    <button id ="btn_guardaruser" class="btn btn-success"  name="btn_guardaruser">Guardar</button>
  </div>
<?php endif ?>

</div>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
</body>
</html>