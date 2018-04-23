
<?php 
@session_start();
?>
<?php
  
  require_once 'Config/conexion.php';
  require_once 'Model/Producto.php';
  $tipo_doc='IMP';
  echo '<h1>Ordenes pendientes de Impresión</h1>';
  $objProducto = new Producto();
  $documentos = $objProducto->ObtenerDocumentos($tipo_doc);
  
  $documento = $documentos->fetchObject();
  foreach ($documentos as $documento) {
      $id = $documento['id'];
      $xdoc = $documento['xdoc'];
      $factura = $documento['factura'];
      $serie = $documento['SERIE'];
      $fecha = $documento['fecha'];
      $cliente = $documento['cliente'];
      $fechaop = $documento['FECHAOP'];
      $hace= $documento['hace'];
     // $nombre = $nombre." ".$apellido;
      echo '<div class="alert alert-primary seleccionadoc" role="alert" id= '.$id.'>
              <h4 class="alert-heading">Orden # '.$xdoc.'</h4>
              <p>'.$cliente.'.</p>
              <p class="mb-0 seleccionadoc">Hace:  '.$hace.' Minutos</p>
            </div>';
    }
?>

 <script type="text/javascript">
$(document).ready(function(){
  $('body').on('click', '.seleccionadoc', function(){
    var xid = $(this).attr("id");
    $("#contenidos").load('Despachos.php?doc='+xid);
  })
})
 </script>