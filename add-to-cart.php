<?php
	session_start();
	$id = $_GET['id'];
	$qty = $_GET['qty'];
	$location = $_GET['location'];
	$code = $_GET['code'];
	$page = $_GET['page'];

	$_SESSION['cart'][$id] += $qty;
	switch ($location) {
		case 1:
			header("location: book-detail.php?id=$id");
			break;
		case 2:
			header("location: book-detail.php?id=$code");
			break;
		case 3:
			header("location: index.php?page=$code");
			break;
		case 4:
			header("location: category-detail.php?id=$code&page=$page");
			break;
		case 5:
			header("location: search-result.php?search=$code");
			break;
		default:
			header("location: index.php");
			break;
	}
?>