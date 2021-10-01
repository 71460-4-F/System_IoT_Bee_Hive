<?php  
	session_start();
	session_destroy();
	unset($_SESSION['iduser']);
	$_SESSION['nameuser'];
	header("Location: /");
	exit();
