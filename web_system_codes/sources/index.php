<?php
session_start();
if (isset($_SESSION['nameuser'])) {
  header("Location: /inicio");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="generator" content="Jekyll v3.8.5">
  <title> Monitoramento</title>
  <link rel="shortcut icon" type="image/png" href="Favicon.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

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

    h2 {
      -webkit-text-stroke-width: 2px;
      -webkit-text-stroke-color: black;
      font-weight: bold;
    }
  </style>
</head>

<body class="text-center">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
      <img src="Favicon.png" height="40">
    </a>
    <button id="btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item text-light nav-link active" href="/"><span class="sr-only"></span></a>
        <a class="nav-item nav-link" href="/" id="active">Início</a>
        <a class="nav-item text-light nav-link" href="/contato">Contato</a>
        <a class="nav-item text-light nav-link" href="/sobre">Sobre</a>
        <a class="nav-item text-light nav-link" href="/ajuda">Ajuda</a>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item text-light nav-link active" href="/login">Entrar<span class="sr-only"></span></a>
        </div>
      </div>
  </nav>
  <div align="center">
    <br />
    <h2 align="center" style="color:white">Sistema de Monitoramento de Colmeias</h2>
    <a class="navbar-brand" href="/">
      <img src="iot2.png" id="img" ;">
    </a>
  </div>
</body>

</html>