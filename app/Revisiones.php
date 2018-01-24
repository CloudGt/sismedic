<?php echo "HOLA MUNDO";







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




echo "HOLA MUNDO";







 ?>