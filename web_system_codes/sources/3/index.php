<?php
session_start();
?>
<?php
ob_start();
if ($_SESSION['iduser'] == "" || $_SESSION['nameuser']=="") {
	$_SESSION['secury'] = "Erro, faça login";
	header("Location: /login");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title> Colmeia 03</title>
	<link rel="shortcut icon" type="image/png" href="/Favicon.png"/>
	<link rel="stylesheet" href="/bootstrap.min.css">

<script src="/jquery-3.3.1.slim.min.js"></script>
<script src="/popper.min.js"></script>
<script src="/bootstrap.min.js"></script>

	<style>
		.page-wrapper
		{
			width:1000px;
			margin:0 auto;
		}
		#active  {
		    color:#DAA520;
		}	
	</style>
	
</head>

<body class="text-center">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="/">
      <img src="/Favicon.png" height="40">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item text-light nav-link" href="/">Início</a>
      <a class="nav-item text-light nav-link" href="/1">Colmeia 01</a>
      <a class="nav-item text-light nav-link" href="/2">Colmeia 02</a>
      <a class="nav-item nav-link" href="/3" id="active">Colmeia 03</a>
      <a class="nav-item text-light nav-link" href="/4">Colmeia 04</a>
      <a class="nav-item text-light nav-link" href="/5">Colmeia 05</a>
    </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item text-light nav-link active" href="/closed.php">Sair<span class="sr-only"></span></a>
    </div>
  </div>
</nav>
<div>
		<br/>
		<h2 align="center">Dados recebidos</h2>
</div>
	
	
</body>
</html>