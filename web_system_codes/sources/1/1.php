<?php
// add all dependences for PHPMailer
// PHPMailer GitHub project: https://github.com/PHPMailer/PHPMailer
include("connect.php");
$date = date("Y-m-d G:i:s");
$key = $_GET["k"];
$url = "https://maps.google.com/?q=" . $_GET["p"] . "&t=h";
$n_sat = $_GET["s"];
$volt = $_GET["t"];
$sinal = $_GET["a"];
if ($key == '<key>') {
	$query = "INSERT INTO `data_base`.`table` (`timeStamp`,`link_maps`,`n_sat`,`volt_bat`,`sinal`) 
  VALUES ('$date','" . $url . "', '" . $n_sat . "', '" . $volt . "', '" . $sinal . "')";
	mysqli_query($conexao, $query);
	mysqli_close($conexao);
	
	try {
		$mail->isSMTP();
		$mail->Host = 'smtp.service';
		$mail->SMTPAuth = true;
		$mail->Username = 'user';
		$mail->Password = 'pass';
		$mail->Port = '<port>';
		$mail->setFrom('from', '');
		$mail->addAddress('mail');
		$mail->isHTML(true);
		$mail->Subject = '<Subject>';
		$mail->Body = 'text';
	} catch (Exception $e) {
		$erroLog = "Erro ao enviar mensagem: {$mail->ErrorInfo}";
	}
}