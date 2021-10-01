<?php
session_start();
?>
<?php
ob_start();
if ($_SESSION['iduser'] == "" || $_SESSION['nameuser'] == "") {
	$_SESSION['secury'] = "Erro, faça login";
	header("Location: /");
	exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title> Monitoramento</title>
	<link rel="shortcut icon" type="image/png" href="/Favicon.png" />
	<link rel="stylesheet" href="/bootstrap.min.css">

	<script src="/jquery-3.3.1.slim.min.js"></script>
	<script src="/popper.min.js"></script>
	<script src="/bootstrap.min.js"></script>

	<style>
		body {
			background-image: url(favo1.jpg);
		}

		.page-wrapper {
			width: 1000px;
			margin: 0 auto;
		}

		#active {
			color: #DAA520;
		}

		#img {
			display: block;
			margin: auto;
			max-width: 50%;
		}

		@media screen and (max-width: 640px) {
			#img {
				display: block;
				margin: auto;
				max-width: 70%;
			}
		}


		#btn {
			border-color: orange;
		}

		h3 {
			-webkit-text-stroke-width: 2px;
			-webkit-text-stroke-color: black;
			font-weight: bold;
		}
	</style>

</head>

<body class="text-center">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/" style="pading:0px">
			<img src="/Favicon.png" height="40">
		</a>
		<button id="btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="/" id="active">Início</a>
				<a class="nav-item text-light nav-link" href="/1">Colmeia 01</a>
				<a class="nav-item text-light nav-link" href="/2">Colmeia 02</a>
				<a class="nav-item text-light nav-link" href="/3">Colmeia 03</a>
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
		<br />
		<h3 style="color:white" align="center">Seja bem vindo!</h3>
	</div>
	<div align="center">
		<br />
		<a class="navbar-brand" href="/">
			<img src="/iot2.png" id="img" ;">
		</a>
	</div>


</body>

</html>