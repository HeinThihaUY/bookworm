<?php
	session_start();
	$id = $_POST['id'];
	$qty = $_POST['qty'];
	if($qty<=0){
		header("location: remove-item.php?id=$id");
	}else{
		$_SESSION['cart'][$id] = $qty;
		header("location: view-cart.php?");
	}
?>