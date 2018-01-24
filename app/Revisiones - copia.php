<?php
@session_start();
if(isset($_GET["tipo_doc"])){
	$tipo_doc=$_GET["tipo_doc"];
  }else{
  	$tipo_doc='D';
  }
  require_once 'Config/conexion.php';
  require_once 'Model/Producto.php';
  $objProducto = new Producto();
  $documentos = $objProducto->ObtenerDocumentos($tipo_doc);
  $cuenta = $documentos->rowCount();
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
      echo '<div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Orden # '.$xdoc.'</h4>
              <p>'.$cliente.'.</p>
              <p class="mb-0">Hace:  '.$hace.' Minutos</p>
            </div>';
    }
?>
