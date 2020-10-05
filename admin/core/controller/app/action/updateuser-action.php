<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}


// $user = UserData::getById($_POST["user_id"]);
$user = new UserData();


	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->nameshop = $_POST["nameshop"];
	$user->idusuario = $_POST["user_id"];
	$user->is_active= $_POST['is_active'];
	$user->update();

print "<script>window.location='index.php?view=users';</script>";


}


?>