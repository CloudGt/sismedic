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
    <title>Usuarios</title>
    <script type="text/javascript" src="libs/ajax.js"></script>
   <!-- Alertity -->
    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="libs/js/alertify/lib/alertify.min.js"></script>
      <style type="text/css">.activo {width: 1rem;height: 1rem;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;background: #5cb85c;}.noactivo {width: 1rem;height: 1rem;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;background: red;}</style>
  </head>
<body>
<div class="container">
<table id="contenido" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                 <?php tabla($info); ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                  </tr>
                </tfoot>
              </table>

</div>
</body>
<!-- view -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#nuevoprov").load("nuevo_proveedor.php"); 
})
 </script>
<script type="text/javascript">
$(document).ready(function() {
  $('#contenido').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>
</html>