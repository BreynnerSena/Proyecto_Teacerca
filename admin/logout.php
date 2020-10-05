<?php
session_start();


// -- eliminamos el usuario
if(isset($_SESSION['admin_id'])){
	unset($_SESSION['admin_id']);
}

session_destroy();
//estemos donde estemos nos redirije al index
print "<script>window.location='./';</script>";
?>