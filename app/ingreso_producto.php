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

<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xid_proveedor">Casa Medica</span>
  <?php if ($edit == 0): ?>
      <select id="id_proveedor" name="id_proveedor" class="form-control">
      <?php casa_medica($casa_medica); ?>
    </select>
    <?php endif ?>
    <?php if ($edit == 1): ?>
      <select id="id_proveedor" name="id_proveedor" class="form-control">
        <?php echo "<option value='$id'>$n_proveedor</option>" ?>
        <?php casa_medica($casa_medica); ?>
      </select>
    <?php endif ?>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xidproducto">Codigo Producto</span>
   <?php if ($edit == 0): ?>
    <input id="idproducto" name="idproducto" type="text" placeholder="Codigo Producto" class="form-control input-md" required>
  <?php endif ?>  
  <?php if ($edit == 1): ?>
    <input id="idproducto" name="idproducto" type="text" placeholder="Codigo Producto" class="form-control input-md" value="<?php echo $idproducto; ?>" required>
  <?php endif ?>   
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xproducto">Producto</span>
  <select id="producto" name="producto" class="form-control">
      <?php if ($edit == 0): ?>
        <?php producto($producto); ?>
      <?php endif ?>  
      <?php if ($edit == 1): ?>
            <?php echo "<option value='$idproducto'>$n_producto</option>"; ?>
            <?php producto($producto); ?>
      <?php endif ?>  
    </select>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xcantidad">Cantidad</span>
  <?php if ($edit == 0): ?>
    <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control">
  <?php endif ?> 
  <?php if ($edit == 1): ?>
    <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $cantidad; ?>">
  <?php endif ?> 
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xfechaingreso">Fecha Ingreso</span>
  <?php if ($edit == 0): ?>
      <input id="fechaingreso" name="fechaingreso" type="date" value="<?php echo date('Y'); ?>" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
      <input id="fechaingreso" name="fechaingreso" type="date" class="form-control input-md" value="<?php echo $fechaingreso; ?>" required>
    <?php endif ?>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xfechavence">Fecha Vencimiento</span>
         <?php if ($edit == 0): ?>
         <input id="fechavence" name="fechavence" type="date" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input id="fechavence" name="fechavence" type="date" class="form-control input-md" value="<?php echo $fechavence; ?>" required>
    <?php endif ?>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xdocumento">Documento</span>
  <?php if ($edit == 0): ?>
          <input id="documento" name="documento" type="text" placeholder="Documento" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input id="documento" name="documento" type="text" placeholder="Documento" class="form-control input-md" value="<?php echo $documento; ?>" required>
    <?php endif ?>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xserie_fac">Serie</span>
  <?php if ($edit == 0): ?>
        <input id="serie_fac" name="serie_fac" type="text" placeholder="Serie" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
        <input id="serie_fac" name="serie_fac" type="text" placeholder="Serie" class="form-control input-md" value="<?php echo $serie_fac; ?>" required>
    <?php endif ?>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xlote">Codigo Barra/Lote</span>
   <?php if ($edit == 0): ?>
          <input id="lote" name="lote" type="text" placeholder="Codigo Barra/Lote" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input id="lote" name="lote" type="text" placeholder="Codigo Barra/Lote" class="form-control input-md" value="<?php echo $lote; ?>" required>
    <?php endif ?>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xusuario">Usuario</span>
   <?php if ($edit == 0): ?>
          <input type="text" placeholder="Usuario" value="<?php echo $usuario; ?>" class="form-control input-md" required disabled="true">
          <input type="hidden" name="usuario" value="<?php echo $id_usuario; ?>">
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input type="text" placeholder="Usuario" value="<?php echo $n_usuario; ?>" class="form-control input-md" required disabled="true">
          <input type="hidden" name="usuario" value="<?php echo $usuario_edit; ?>">
    <?php endif ?>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xid_bodega">Bodega</span>
  <select id="id_bodega" name="id_bodega" class="form-control">
         <?php if ($edit == 0): ?>
          <?php bodega($bodega); ?>
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <?php echo "<option value='$id_bodega'>$n_bodega</option>" ?>
          <?php bodega($bodega); ?>
    <?php endif ?>
    </select>
</div>
<div class="input-group">
  <span class="input-group-addon col-7 col-sm-4 col-md-4 col-xl-2" id="xpreciounitario">Precio Unitario</span>
  <?php if ($edit == 0): ?>
         <input type="number" name="preciounitario" plaeholder="Precio Unitario"  id="preciounitario" class="form-control">
    <?php endif ?>
    <?php if ($edit == 1): ?>
         <input type="number" name="preciounitario" plaeholder="Precio Unitario" id="preciounitario" value="<?php echo $preciounitario; ?>" class="form-control">
    <?php endif ?>
</div>
<?php if ($edit == 1): ?>
  <input type="hidden" name="idupdate" id="idupdate"  value="<?php echo $idupdate; ?>">
<?php endif ?>
</fieldset>
</form>
<div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3 mt-3" style="margin-left: -0.9rem;">
     <?php if ($edit == 0): ?>
      <br />
        <button id ="btn_addprod" class="btn btn-success"  name="btn_addprod">Guardar</button>
    <?php endif ?>
    <?php if ($edit == 1): ?>
        <button id ="btn_addprod_update" class="btn btn-success"  name="btn_addprod_update">Actualizar</button>
    <?php endif ?>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#producto").change(function(){
      $('#idproducto').val($(this).val());
    });
    $("#idproducto").change(function(){
      $('#producto').val($(this).val());
    });

  });
</script>
</body>
</html>