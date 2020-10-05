<?php
require 'correos/enviarcorreo.php';
$sendcorreo = new enviarEmail();

if(count($_POST)>0){
	$user = new UserData();

if($user->validarCorreoExiste($_POST["email"]) == true){


	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}

	$clave = rand ( 8,4000 * 100 );


	$opcion = $_POST['opcion'];

	$password;

	if($opcion == 1){
		$password = $_POST['password'];
		$user->password = sha1(md5($password));
	} else {
		$user->password = sha1(md5($clave));
	}

	$ciudad = $_POST["ciudad"];
	$calle = $_POST["calle"];
	$numerouno = $_POST["numerouno"];
	$numerodos = $_POST["numerodos"];
	$numerotres = $_POST["numerotres"];
	$direccion = $ciudad . $calle . $numerouno . ' # ' .$numerodos . ' - ' . $numerotres;
	

	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->nameshop = $_POST["nameshop"];
	$user->address = $direccion;
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	
	$user->add();

	if($opcion == 2){
		$sendcorreo->enviarCorreo($_POST["email"],2,$clave);
	}


}


print "<script>window.location='index.php?view=users';</script>";

} 


?>