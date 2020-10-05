<?php
// print_r($_POST);
$product =  new PostData();
foreach ($_POST as $k => $v) {
	$product->$k = $v;
	# code...
}

////////////////////////////////////// / / / / / / / / / / / / / / / / / / / / / / / / /
$handle = new Upload($_FILES['image']);
if ($handle->uploaded) {
	$url="storage/products/";
	$handle->Process($url);

    $product->image = $handle->file_dst_name;
    $product->update_image();
}
////////////////////////////////////// / / / / / / / / / / / / / / / / / / / / / / / / /

if(isset($_POST["is_public"])) { $product->is_public=1; }else{ $product->is_public=0; }
if(isset($_POST["is_featured"])) { $product->is_featured=1; }else{ $product->is_featured=0; }
if(isset($_POST["precio"])) { $product->preciopost=$_POST["precio"]; }else{ $product->preciopost=$_POST["precio"]; }
if(isset($_POST["marca"])) { $product->marca=$_POST["marca"]; }else{ $product->marca=$_POST["marca"]; }

 $product->update();
$_SESSION["product_updated"]= 1;
Core::redir("index.php?view=posts");
?>