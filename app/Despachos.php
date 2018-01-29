<?php
session_start();
if(isset($_GET["doc"])){
  $xiddoc=$_GET["doc"];
  require('Config/conexion.php');
    $detalle = $cnx->query("
        SELECT d.id, d.idventa, d.idproducto,p.descripcion,d.cantidad, d.precio,d.subtotal,d.estado, 
        d.chk_despacho,d.chk_revision
        FROM venta_detalle d
        INNER JOIN producto p on d.idproducto= p.id 
        where d.idventa= $xiddoc
        ORDER BY idventa ASC 
      ");
  echo'
  <STYLE TYPE="text/css" >

  input[type=checkbox], input[type=radio] {
      box-sizing: border-box;
      padding: 0;
      -webkit-transform: scale(2);
  }

  .input-group {
       margin-top: 12px;
  }

  div[class*="col-""] {
      margin-bottom: 2px;
  }
  </STYLE>
  ';


  echo'
  <div class="container ">
  <!-- Header -->

    <div class="row header" style="margin-top: 5px">
    <div class="alert alert-primary col-md-4" role="alert"> Documento #'.
      $xiddoc
    .'
    </div>
      <div class="col-md-12">
      ';
      // ciclo de documentos
       foreach ($detalle as $prod) {
          $iddetalle = $prod['id'];
          $xProd = $prod['descripcion'];
          $cantidad = $prod['cantidad'];
          $despachado = $prod['chk_despacho'];
          $revisado = $prod['chk_revision'];
          
          
      
          echo '
          <div class="input-group input-group-sm ">
            <span class="input-group-addon">
            '. $cantidad .'
            </span>
            <input type="text" class="form-control input-lg" value=" '. $xProd.'" disabled>
            <span class="input-group-addon">
              <input id= "chkproducto" value= "'.$iddetalle.'"class= "lista" type="checkbox">
            </span>
          </div>';
        }
      // fin de ciclo documentos
  echo '      
      </div>
      <hr>
      <div class="col-md-12" style="margin-top: 10px;">
        <button type="submit" class="btn btn-primary">
          Enviar a revisión
        </button>
      </div>

    </div>
  </div>';









}else{
  $xiddoc=0;
  echo '<h1>No se recibio documento</h1>';




}
require_once 'Config/conexion.php';

?>
