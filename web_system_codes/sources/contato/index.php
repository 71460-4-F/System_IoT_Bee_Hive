<?php
session_start();
if(isset($_SESSION['nameuser'])){
    header("Location: /inicio");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title> Contato</title>
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
      <a class="nav-item text-light nav-link active" href="/"><span class="sr-only"></span></a>
      <a class="nav-item text-light nav-link" href="/">Início</a>
      <a class="nav-item nav-link" href="/contato" id="active">Contato</a>
      <a class="nav-item text-light nav-link" href="/sobre">Sobre</a>
      <a class="nav-item text-light nav-link" href="/ajuda">Ajuda</a>
    </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item text-light nav-link active" href="/login">Entrar<span class="sr-only"></span></a>
    </div>
  </div>
</nav>
<div>
		<br/>
		<h2 align="center"></h2>
	
</div>
	
	
</body>
</html>