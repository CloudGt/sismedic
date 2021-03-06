<?php


session_start();
if(isset($_GET["doc"])){
  $xiddoc=$_GET["doc"];
    require_once 'Config/conexion.php';
    require_once 'Model/Producto.php';
    require_once 'Model/nit.php';
    $detalle = $cnx->query("
        SELECT distinct d.id, d.idventa, d.idproducto,p.descripcion,d.cantidad, d.precio,d.subtotal,d.estado, 
        d.chk_despacho,d.chk_revision, v.estado
        FROM venta_detalle d
        INNER JOIN producto p on d.idproducto= p.id 
        INNER JOIN VENTA V ON d.idventa= v.id 
        where d.idventa= $xiddoc
        ORDER BY idventa ASC 
      ");

  echo '

<html lang="es">
  <head>
      <script type="text/javascript" src="libs/ajax.js"></script>  
   <!-- Alertity -->
    <link rel="stylesheet" href="libs/js/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="libs/js/alertify/lib/alertify.min.js"></script>
  </head>

  <body>


  ';




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
          $estado = $prod['estado'];
          
          
      
          echo '
          <div class="input-group input-group-sm ">
            <span class="input-group-addon">
            '. $cantidad .'
            </span>
            <input type="text" class="form-control input-lg" value=" '. $xProd.'" disabled>
            <span class="input-group-addon">
              <input id=  "'.$iddetalle.'" estado= "'.$estado .'" value= "'.$iddetalle.'" class= "chkproducto lista" type="checkbox">
            </span>
          </div>';
        }
      // fin de ciclo documentos
  echo '      
      </div>
      <hr>
      <div class="col-md-12" style="margin-top: 10px;">
        <button type="submit" class="btn btn-primary" id= "enviar_rev" name= "enviar_rev" estado= "'.$estado.'" iddoc= "'.$xiddoc.'">
        ';
        if ($estado=="DSP"){ 
         echo 'Enviar a revisión';
        }
        if ($estado=="REV"){ 
         echo 'Enviar a Impresion';
        } 
  echo '    
        </button>
      </div>
    </div>
  </div>
  </body>
</html>


  ';

}else{
  $xiddoc=0;
  echo '<h1>No se recibio documento</h1>';
}
require_once 'Config/conexion.php';
?>