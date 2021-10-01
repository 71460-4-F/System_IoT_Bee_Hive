<?php
session_start();
?>
<?php
ob_start();
if ($_SESSION['iduser'] == "" || $_SESSION['nameuser'] == "") {
	$_SESSION['secury'] = "Erro, faça login";
	header("Location: /login");
	exit();
}
if ($_SESSION['iduser'] == "_ref_id_user_") {
	include("connect.php");
	$query = "DELETE FROM `tb_dados2`";
	mysqli_query($conexao, $query);
	mysqli_close($conexao);
	echo '

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="generator" content="Jekyll v3.8.5">
	<meta http-equiv="refresh" content="3; URL=\'/1/\'"/>
	<title> Colmeia 01</title>
	<link rel="shortcut icon" type="image/png" href="/Favicon.png"/>
	<link rel="stylesheet" href="../bootstrap.min.css">

<script src="../jquery-3.3.1.slim.min.js"></script>
<script src="../popper.min.js"></script>
<script src="../bootstrap.min.js"></script>

	<style>
		body{
	      background-color:#E5E7E9;
	}
		.page-wrapper
		{
			width:1000px;
			margin:0 auto;
		}
		#active  {
		    color:#DAA520;
		}	
		
/* max-width  */
@media screen and (max-width: 640px) {
		table{
            max-width: auto;
            font-size:70%;
		}
		
		table tr td b{
		    margin:2px;
		}
		
}
		
	</style>
	
</head>

<body class="text-center">


<div>
		<br/>
		<h2 align="center"> <img src="/bee2.png" height="50"> Dados deletados com sucesso!</h2>
</div>

</body>
</html>
';
} else {
	echo '

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="generator" content="Jekyll v3.8.5">
	<meta http-equiv="refresh" content="5; URL=\'/1/\'"/>
	<title> Colmeia 01</title>
	<link rel="shortcut icon" type="image/png" href="/Favicon.png"/>
	<link rel="stylesheet" href="../bootstrap.min.css">

<script src="../jquery-3.3.1.slim.min.js"></script>
<script src="../popper.min.js"></script>
<script src="../bootstrap.min.js"></script>

	<style>
		body{
	      background-color:#E5E7E9;
	}
		.page-wrapper
		{
			width:1000px;
			margin:0 auto;
		}
		#active  {
		    color:#DAA520;
		}	
		
/* max-width  */
@media screen and (max-width: 640px) {
		table{
            max-width: auto;
            font-size:70%;
		}
		
		table tr td b{
		    margin:2px;
		}
		
}
		
	</style>
	
</head>

<body class="text-center">

<div>
		<br/>
		<h1 align="center"> Ação não autorizada! </h1>
</div>

</body>
</html>
';
}
?>
