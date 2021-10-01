<?php
ob_start();
if ($_SESSION['iduser'] == "" || $_SESSION['nameuser']=="") {
	$_SESSION['secury'] = "Erro, faça login";
	header("Location: /");
	exit();
}
