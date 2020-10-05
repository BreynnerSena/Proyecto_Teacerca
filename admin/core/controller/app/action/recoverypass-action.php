<?php

require 'correos/enviarcorreo.php';
$action = $_POST["action"];

if ($action == 0) { // Validar email para cambiar contraseña
    $user = new UserData();
    $em = $_POST["email"];
    $user->email = $_POST["email"];
    $sendcorreo = new enviarEmail();

    if ($_POST["email"] != null) {


        $idusuario = $user->validarCorreo();

        if ($idusuario > 0) {
            $_SESSION["IDUSUARIO"] = $idusuario;

            try {


                $sendcorreo->enviarCorreo($em,1,null);
               
            } catch (Exception $e) {
                echo "ERROR EN EL ENVIO DE CORREO";
            }

            print "<script>window.location='../index.php?view=code';</script>";
        } else {
            //$_SESSION["IDUSUARIO"] = null;
            print "<script>window.location='../index.php?view=forgotpassword';</script>";
        }
    } else {
        //$_SESSION["IDUSUARIO"] = null;
        print "<script>window.location='../index.php?view=forgotpassword';</script>";
    }
} else if ($action == 1) { // Cambiar contraseña

    $user = new UserData();
    $idusuario = $_SESSION["IDUSUARIO"];
    $password = $_POST["contraseña"];
    $passdos = $_POST["contraseña2"];

    if ($password == $passdos) {
        $user->password = sha1(md5($_POST["contraseña"]));

        if ($user->updatePassword($idusuario) == true) {
            print "<script>window.location='index.php?view=index';</script>";
        } else {
            print "<script>window.location='index.php?view=index';</script>";
        }
    } else {
        print "<script>window.location='../index.php?view=updatepassword';</script>";
    }
} else if ($action == 3) {

    $code = $_POST["code"];
    $codigo =  $_SESSION["CODIGO"];

    if($code == $codigo){
        print "<script>window.location='../index.php?view=updatepassword';</script>";
    } else {
        print "<script>window.location='../index.php?view=code';</script>";
    }
} 


