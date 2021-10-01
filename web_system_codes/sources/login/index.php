<?php
session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <link rel="icon" type="image/png" href="/Favicon.png"/>
  <title>Acesso</title>
  <link href="/bootstrap.min.css" rel="stylesheet">
  
<link rel="stylesheet" href="/bootstrap.min.css">
<script src="/jquery-3.3.1.slim.min.js"></script>
<script src="/popper.min.js"></script>
<script src="/bootstrap.min.js"></script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    
    .page-wrapper
		{
			width:1000px;
			margin:0 auto;
		}
		#active  {
		    color:#DAA520;
		}
  </style>
  <!-- Estilo curstomizado para este template -->
  <link href="../signin.css" rel="stylesheet">
</head>

<?php  
// Destroi as variáveis especificadas
unset($_SESSION['iduser'], $_SESSION['nameuser']);

?>

<body class="text-center">

  <div class="container">
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
      <a class="nav-item text-light nav-link" href="/contato">Contato</a>
      <a class="nav-item text-light nav-link" href="/sobre">Sobre</a>
      <a class="nav-item text-light nav-link" href="/ajuda">Ajuda</a>
    </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/login" id="active">Entrar<span class="sr-only"></span></a>
    </div>
  </div>
</nav>
    <form class="form-signin" method="post" action="/proc_login.php">
      <img class="mb-4" src="/Favicon.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Credenciais de Acesso</h1>
      <label for="inputEmail" class="sr-only">Endereço de email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Endereço de email" name="email" required autofocus><br>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="pasword" required><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
    <p class="text-center text-danger">
      <?php 
      if (isset($_SESSION['errorlogin'])) {
        echo $_SESSION['errorlogin'];
        unset($_SESSION['errorlogin']);        
      }
      ?>
    </p>
    <p class="text-center text-danger">
      <?php  
      if (isset($_SESSION['secury'])) {
        echo $_SESSION['secury'];
        unset($_SESSION['secury']);
      }
      ?>     
    </p>
  </div>
</body>
</html>
