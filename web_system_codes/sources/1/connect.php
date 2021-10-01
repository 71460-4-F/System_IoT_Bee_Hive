<?php
require 'config.php';
$conexao = new mysqli(HOST, USER, PASS, DB);
if ($conexao->connect_error) {
	echo $conexao->connect_error;
}else {
}
?>