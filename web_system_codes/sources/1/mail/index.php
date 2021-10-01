<?php
// add all dependences for PHPMailer
// PHPMailer GitHub project https://github.com/PHPMailer/PHPMailer
try {
	$mail->isSMTP();
	$mail->Host = 'smtp.service';
	$mail->SMTPAuth = true;
	$mail->Username = 'mail';
	$mail->Password = 'pass';
	$mail->Port = 587;
	$mail->setFrom('mail_from', 'name');
	$mail->addAddress('mail_send');
	$mail->isHTML(true);
	$mail->Subject = 'subject';
	$mail->Body = 'text';
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>