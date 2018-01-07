<?php
session_start();
include('data/conexion.php');	
//prsiskevin
$_SESSION['Bandera'] = "";
$_SESSION['Usr'] = "";
$_SESSION['Pwd'] = "";
$_SESSION['Nip'] = "";
$_SESSION['Nombre'] = "";
$_SESSION['Nivel'] = "";
$_SESSION['Total'] = "";
$_SESSION['PagNow'] = "";
$_SESSION['query'] = "";
$_SESSION['matriz'] = "";
$_SESSION['filas'] = "";
$_SESSION['Bfarmacia'] = "";
$_SESSION['facturaA'] = "";
$_SESSION['action'] = "";
//$_SESSION['id']="";
//
$id="";
function protecVars($str)
		{
			$str =addslashes($str);
			$str= htmlspecialchars($str);
			return $str;

		}

foreach($_POST as $param => $value)
		{
			$_POST[$param]= protecVars($value);
		}
foreach($_GET as $param => $value)
	{
		$_GET[$param]= protecVars($value);
	}

if (isset ($_POST['username']) && isset ($_POST['password']))
{
	$u=$_POST['username'];
	$p=$_POST['password'];
	$fail=false;
	$sql = "SELECT * FROM empleado where USUARIO = '$u' and PASSWORD = '$p' and ACTIVO = 1" ;
	$GetUser = mysqli_query($conn, $sql);
if( $GetUser === false) { 
			die( print_r( "Descripcion de Error " . mysqli_error($conn)) );
		}
while( $row = mysqli_fetch_array( $GetUser)) {
	$id=$row["NIP"];
	$ususs=$row["USUARIO"];
	$nom1=$row["NOMBRE"];
	$apep=$row["ACTIVO"];

}
if(empty($u) && empty($p))
{
	echo "los datos estan vacios";

}
elseif($id=='')
{
	echo "El usuario no existe o la contraseña es incorecta";
	$fail=true;
}

if($fail==false)
{	

	if($id>0)
	{
		$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
		$cookie_val=crypt($uname[$user_id]);
		$_SESSION['this_cookie']=$cookie_val;
		$_SESSION['username']=$ususs;
		$_SESSION['password']=$p;
		$_SESSION['dato1']=$ususs;
		$_SESSION['usern']=$ususs;
		$_SESSION['nom1']=$nom1;
		$_SESSION['apellidop']=$apep;
	}
}


}


 if(isset($_SESSION['username']) && isset($_SESSION['password']) )
 {
 	$su=$_SESSION['username'];
	$sp=$_SESSION['password'];
	//print_r($su);
	$sql = "
	SELECT * FROM empleado where USUARIO = '$su' and PASSWORD = '$sp' and ACTIVO = 1
	" ;
 	$GetUser = mysqli_query( $conn, $sql );
	
 if( $GetUser === false) {//if get
 	die( print_r( mysqli_error()) );
 } //if get
 while( $row = mysqli_fetch_array( $GetUser)) {//while
 //echo  "ID  ".$row["usuario"]."<br>"; 
 	$dd=$row["id_usu"];
 	$jd=$row["usuario"];
 	$rl=$row["Nombre_rol"];
 	$_SESSION['usern']=$id;
 } //while
 if($dd>0)

 {
 	$_SESSION['usern']=$lml=$jd;

 	define('user',true); 

 }
 }

 else {
 	define ('user',false);
 }

/*if ($_GET['action'] =='exit')
{
	session_destroy();
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>APDAHUM Sistem APP`s</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/login.css" />
</head>
<body >
	<?php  if(user==false) { ?>

	<div class="main">
		<div class="container">
			<center>
				<div class="middle">
					<div id="login">
						<form action="" method="post">
							<fieldset class="clearfix">
								<p ><span class="fa fa-user"></span><input type="text" name="username" Placeholder="Usuario" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
								<p><span class="fa fa-lock"></span><input type="password" name="password" Placeholder="Contraseña" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
								<div>
									<span style="width:48%; text-align:left;  display: inline-block;"><a href="http://192.168.2.79/phpformularioveta/olvidomipass.php" class="small-text" href="#">Olvidaste tu
										contraseña?</a></span>
										<span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Entrar"></span>
									</div>
								</fieldset>
								<div class="clearfix"></div>
							</form>
							<div class="clearfix"></div>
						</div> <!-- end login -->
						<div class="logo">
							<img src="img/logo.png" alt="" />

							<div class="clearfix"></div>
						</div>
					</div>
				</center>
			</div>
		</div>
		<?php } if(user==true) { ?>
			<pre>
				<?php 
					print_r($_SESSION);
					header("Location: app/principal.php");
				 }?>
			</pre>
		<b></b>	>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
