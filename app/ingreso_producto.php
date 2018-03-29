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
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="idproducto">Codigo Producto</label>  
  <div class="col-md-8">
  <?php if ($edit == 0): ?>
    <input id="idproducto" name="idproducto" type="text" placeholder="Codigo Producto" class="form-control input-md" required>
  <?php endif ?>  
  <?php if ($edit == 1): ?>
    <input id="idproducto" name="idproducto" type="text" placeholder="Codigo Producto" class="form-control input-md" value="<?php echo $idproducto; ?>" required>
  <?php endif ?>       
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="producto">Producto</label>
  <div class="col-md-8">
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
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="cantidad">Cantidad</label>
  <div class="col-md-8">
  <?php if ($edit == 0): ?>
    <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control">
  <?php endif ?> 
  <?php if ($edit == 1): ?>
    <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $cantidad; ?>">
  <?php endif ?> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fechaingreso">Fecha Ingreso</label>  
  <div class="col-md-8">
    <?php if ($edit == 0): ?>
      <input id="fechaingreso" name="fechaingreso" type="date" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
      <input id="fechaingreso" name="fechaingreso" type="date" class="form-control input-md" value="<?php echo $fechaingreso; ?>" required>
    <?php endif ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fechavence">Fecha Vencimiento</label>  
  <div class="col-md-8">
       <?php if ($edit == 0): ?>
         <input id="fechavence" name="fechavence" type="date" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input id="fechavence" name="fechavence" type="date" class="form-control input-md" value="<?php echo $fechavence; ?>" required>
    <?php endif ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="documento">Documento</label>  
  <div class="col-md-8">
       <?php if ($edit == 0): ?>
          <input id="documento" name="documento" type="text" placeholder="Documento" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input id="documento" name="documento" type="text" placeholder="Documento" class="form-control input-md" value="<?php echo $documento; ?>" required>
    <?php endif ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="serie_fac">Serie</label>  
  <div class="col-md-8">
       <?php if ($edit == 0): ?>
        <input id="serie_fac" name="serie_fac" type="text" placeholder="Serie" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
        <input id="serie_fac" name="serie_fac" type="text" placeholder="Serie" class="form-control input-md" value="<?php echo $serie_fac; ?>" required>
    <?php endif ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="lote">Codigo Barra/Lote</label>  
  <div class="col-md-8">
       <?php if ($edit == 0): ?>
          <input id="lote" name="lote" type="text" placeholder="Codigo Barra/Lote" class="form-control input-md" required>
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input id="lote" name="lote" type="text" placeholder="Codigo Barra/Lote" class="form-control input-md" value="<?php echo $lote; ?>" required>
    <?php endif ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="usuario">Usuario</label>  
  <div class="col-md-8">
       <?php if ($edit == 0): ?>
          <input type="text" placeholder="Usuario" value="<?php echo $usuario; ?>" class="form-control input-md" required disabled="true">
          <input type="hidden" name="usuario" value="<?php echo $id_usuario; ?>">
    <?php endif ?>
    <?php if ($edit == 1): ?>
          <input type="text" placeholder="Usuario" value="<?php echo $n_usuario; ?>" class="form-control input-md" required disabled="true">
          <input type="hidden" name="usuario" value="<?php echo $usuario_edit; ?>">
    <?php endif ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="id_bodega">Bodega</label>
  <div class="col-md-8">
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
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="preciounitario">Precio Unitario</label>
  <div class="col-md-8">
       <?php if ($edit == 0): ?>
         <input type="number" name="preciounitario" plaeholder="Precio Unitario"  id="preciounitario" class="form-control">
    <?php endif ?>
    <?php if ($edit == 1): ?>
         <input type="number" name="preciounitario" plaeholder="Precio Unitario" id="preciounitario" value="<?php echo $preciounitario; ?>" class="form-control">
    <?php endif ?>
  </div>
</div>
<?php if ($edit == 1): ?>
  <input type="text" name="idupdate" id="idupdate"  value="<?php echo $idupdate; ?>">
<?php endif ?>
</fieldset>
</form>
<div class="col-xs-12 col-sm-12 col-md-12 form-inline mb-3">
     <?php if ($edit == 0): ?>
        <button id ="btn_addprod" class="btn btn-success"  name="btn_addprod">Guardar</button>
    <?php endif ?>
    <?php if ($edit == 1): ?>
        <button id ="btn_addprod_update" class="btn btn-success"  name="btn_addprod_update">Actualizar</button>
    <?php endif ?>
</div>
</div>
</body>
</html>