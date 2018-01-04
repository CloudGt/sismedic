<?php 
date_default_timezone_set('America/Guatemala'); 
session_start();
require('../data/conexion.php');
$usr = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistema de Control APDAHUM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/diaco.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrapmin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>
  <script src="../bootstrap/jquery/jquery-ui/jquery-ui.js"></script>
  <script src="../bootstrap/datepicker/jquery.js"></script>
  <link rel="stylesheet" href="../bootstrap/jquery/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
  <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
  <script type="text/javascript">

  $(document).ready(function(){



    $("#ActualizarMenú").click(function(event) {
      $("#contenido").load('../reg_menu.php');
    });
    $("#AsignarPrivilegios").click(function(event) {
      $("#contenido").load('../reg_ud_menu.php');
    });
    $("#CambiarmiClave").click(function(event) {
      $("#contenido").load('../reg_ud_pass.php');
    });
    $("#Usuarios").click(function(event) {
      $("#contenido").load('../reg_nusuario.php');
    });
    $("#Medicamentos").click(function(event) {
      $("#contenido").load('../reg_bodegas.php');
    });
        $("#Clientes").click(function(event) {
      $("#contenido").load('../reg_cliente.php');
    });
    $("#Proveedores").click(function(event) {
      $("#contenido").load('../reg_proveedor.php');
    });
    $("#CambiarPrecios").click(function(event) {
      $("#contenido").load('../reg_ud_precios.php');
    });
    $("#CambiarDatosM").click(function(event) {
      $("#contenido").load('../reg_ud_bodega.php');
    });
    $("#Ventas").click(function(event) {
      $("#contenido").load('../reg_ventas.php');
    });
        $("#Devoluciones").click(function(event) {
      $("#contenido").load('../reg_devolucion.php');
    });
    $("#ingresos").click(function(event) {
      $("#contenido").load('../reg_ingresos.php');
    });
    $("#VentasxTipo").click(function(event) {
      $("#contenido").load('../rep_ventasxtipo.php');
    });
    $("#VentasxCliente").click(function(event) {
      $("#contenido").load('../rep_ventasxclie.php');
    });
    $("#InversiónGeneral").click(function(event) {
      $("#contenido").load('../rep_inversion.php');
    });
        $("#GenerarArchivo").click(function(event) {
      $("#contenido").load('../rep_inventario.php');
    });
    $("#ProductoAgotado").click(function(event) {
      $("#contenido").load('../rep_agotado.php');
    });
    $("#Medicamentos2").click(function(event) {
      $("#contenido").load('../consulta1.php');
    });
    $("#VentasFarmacias").click(function(event) {
      $("#contenido").load('../rep_ventasxfarm.php');
    });

    $("#Inventario").click(function(event) {
      $("#contenido").load('../reg_inventario.php');
    });
    $("#AyudaenLinea").click(function(event) {
      $("#contenido").load('../help.php');
    });
    $("#PedirMedicamento").click(function(event) {
      $("#contenido").load('../pedido_solicita.php');
    });
    $("#Presentaciones").click(function(event) {
      $("#contenido").load('../reg_presenta.php');
    });
    $("#ConfirmaPedido").click(function(event) {
      $("#contenido").load('../reg_pedido.php');
    });
    $("#DetalleFactura").click(function(event) {
      $("#contenido").load('../rep_facturas.php');
    });
    $("#Cotizaciones").click(function(event) {
      $("#contenido").load('../reg_cotiza.php');
    });
    $("#Afecto-Exento").click(function(event) {
      $("#contenido").load('../reg_ivasat.php');
    });
    $("#DetalleVentas").click(function(event) {
      $("#contenido").load('../rep_ventasdetalle.php');
    });
    $("#GenerarEnvios").click(function(event) {
      $("#contenido").load('../envio_download1.php');
    });
    $("#PedidoFarmacia").click(function(event) {
      $("#contenido").load('../pedido_upload1.php');
    });
    $("#IngresarEnvio").click(function(event) {
      $("#contenido").load('../envio_upload1.php');
    });


      $(".menuP").click(function(){
          var id = $(this).attr("id");
         
          $("."+id).toggle("fast");
  });

  });





  </script>


</head>

<body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#myPage">Sistema de Control APDAHUM </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><span >
            <?php 
            if (!isset($_SESSION['this_cookie'])) {

            }else{
              $nombre=($_SESSION["username"]);
                  //print_r($nombre);
              echo "<div class=\"login\"> Bienvenido: $nombre <br><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i>
              <a href='logout.php' target='_parent' >SALIR</a></span><br><i class=\"fi-x-circle\"></i>
              <a href='cambio_password.php' target='_parent'>Cambiar Contraseña</a></div>"; 
              echo "";
              $dia_numero= date("d");
              $dia_letras = date('D');
            }
            ?></span>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Menu Vertical -->



  <nav>
    <div class="col-md-3 column dropdwn">
      <ul class="nav nav-pills nav-stacked boton" id="menu">
              <?php 

              $query = "SELECT * FROM menu where Padre = 0";
              $resultado = mysqli_query($conn,$query);

               

              if (!$resultado) {
                die("No se encontraron Datos");
              }else{
                  $x = 0;
                      while($data = mysqli_fetch_assoc($resultado)){
                            
                             echo "<li class=\"active menuP \" id=\"primero".$x."\"><a>".$data['Descr']."</a>";
                             $query2 = "SELECT Id_Menu,replace(Descr, ' ', '') as SinEspacios,Descr,Padre,Pagina FROM menu where Padre = ".$data['Id_Menu'];
                             $result = mysqli_query($conn,$query2);
                            if(mysqli_num_rows($result) > 0) {
                                echo '<div class="primero'.$x.' segundo" ><ul>';
                                while($query2 = mysqli_fetch_assoc($result)){
                                 
                                  echo '<li style="list-style:none;"><a id="'.$query2['SinEspacios'].'" >'.$query2['Descr'].' </a></li>';
                                }
                                mysqli_free_result($result);
                                echo '</ul></div>';
                            }
                      echo  "</li>";
                      $x += 1;
                  }
              }
              mysqli_free_result($resultado);




               ?>

      </ul>
    </div>
  </nav>
  <!-- */************************************* -->
  <div class="col-lg-9 container" id="contenido">
    <!-- <img src="IMAGENES\fondo sistema ariane.JPG" style="padding-left:25%; padding-top:10%;"> -->
  </div>
<!--   <pre> 
  <?php 
    print_r($_SESSION);

   ?>
 </pre> --> 
</div>

</body>
</html>
