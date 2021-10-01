<?php
session_start();
ob_start();
if ($_SESSION['iduser'] == "" || $_SESSION['nameuser'] == "") {
  $_SESSION['secury'] = "Erro, faça login.";
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
  <meta http-equiv="refresh" content="10">
  <title> Colmeia 01</title>
  <link rel="shortcut icon" type="image/png" href="/Favicon.png" />
  <link rel="stylesheet" href="../bootstrap.min.css">

  <script src="../jquery-3.3.1.slim.min.js"></script>
  <script src="../popper.min.js"></script>
  <script src="../bootstrap.min.js"></script>

  <style>
    body {
      background-color: #E5E7E9;
    }

    .page-wrapper {
      width: 1000px;
      margin: 0 auto;
    }

    #active {
      color: #DAA520;
    }

    @media screen and (max-width: 640px) {
      table {
        max-width: auto;
        font-size: 70%;
      }

      table tr td b {
        margin: 2px;
      }

    }
  </style>

</head>

<body class="text-center">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
      <img src="/Favicon.png" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item text-light nav-link" href="/">Início</a>
        <a class="nav-item nav-link" href="/1" id="active">Colmeia 01</a>
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
    <h2 align="center"> <img src="/bee2.png" height="50"> Dados recebidos</h2>
  </div>

  <div align="center" style="margin:5px">
    <table border="1" cellspacing="0" cellpadding="0">
      <tr height="40px" style="background-color:#363636; color:#FAAC58">
        <td align='center' width='180px'><b> Data e Hora </b></td>
        <td align='center' width='180px'><b> Localização </b></td>
        <td align='center' width='150px'><b> Nº de Satélites </b></td>
        <td align='center' width='150px'><b> Tensão da Bateria </b></td>
        <td align='center' width='150px'><b> Sinal RSSI </b></td>
      </tr>

      <?php
      include("connect.php");
      $query = "SELECT * FROM `tb_dados2` ORDER BY `timeStamp` DESC";
      $result = mysqli_query($conexao, $query);
      if ($result) {
        $css = "#BDBDBD";
        while ($row = mysqli_fetch_array($result)) {
          $data = $row["timeStamp"];
          printf(
            "
          <tr style='background-color:%s'>
            <td align='center'>  %s </td>
            <td align='center'> <a href='%s' target='_blank'>Google Maps</a></td>
            <td align='center'>  %s </td>
            <td align='center'>  %s V </td>
            <td align='center'>  %s </td>
          </tr>",
            $css,
            date('d/m/Y H:i:s', strtotime($data)),
            $row["link_maps"],
            $row["n_sat"],
            $row["volt_bat"],
            $row["sinal"]
          );
        }
        mysqli_free_result($result);
        mysqli_close($conexao);
      }
      ?>

    </table>
  </div>
  <br>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
    Deletar Dados
  </button>
  <br><br>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background-color:#1C1C1C">
        <div class="modal-header">
          <h5 class="modal-title" id="idModal1"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color:#D7DF01">
          <h5 class="modal-title" id="idModal1" style="color:red">Atenção!</h5>
          <div>
            Ao confirmar, todos os dados da colmeia serão excluídos do banco de dados.
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" onclick="window.location.href = '/1/'">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>