<?php
session_start();
require 'conexao.php';
$email = $_POST['email'];
$senha = $_POST['password'];
$descrypt = md5($senha);
$query = "SELECT * FROM tb_users WHERE email='$email' AND senha='$descrypt' LIMIT 1";
$exec = $conexao->query($query);
$result = $exec->fetch_assoc();
if (empty($result)) {
	$_SESSION['errorlogin'] = "Usuario ou Senha Invalidos";
	header("Location: /login/");
	exit();
} else {
	$_SESSION['iduser'] = $result['id'];
	$_SESSION['nameuser'] = $result['nome'];
	header("Location: /inicio");
	exit();
}
