<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// o arquivo de autoload da classe PHPMailer
require __DIR__ . '/vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/vendor/phpmailer/phpmailer/src/SMTP.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obtendo os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $procedimento = $_POST['procedimentos'];


        // Envio de e-mail com os dados usando PHPMailer
        $mail = new PHPMailer(true);


        try {
            $mail->isSMTP();
            $mail->Host = ''; // Endereço do servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = ''; // Seu endereço de e-mail
            $mail->Password = ''; // Sua senha de e-mail
            $mail->SMTPSecure = PHPMailer:: ENCRYPTION_STARTTLS; // tls ou ssl
            $mail->Port = 587; // Porta do servidor SMTP

            $mail->setFrom('', 'Agendamento site');
            $mail->addAddress(''); // Endereço de e-mail de destino
            $mail->Subject = 'Novo agendamento';
            $mail->Body = "Novo agendamento realizado:\n\n" .
                          "Nome: " . $nome . "\n" .
                          "Telefone: " . $telefone . "\n" .
                          "Data: " . $data . "\n" .
                          "Hora: " . $hora . "\n" .
                          "Procedimento: " . $procedimento;

            if ($mail->send()) {
                echo "Agendamento Realizado, Te aguardo na Data e Hora Marcada! S2";
            } else {
                echo "Erro ao enviar o e-mail: " . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: " . $e->getMessage();
        }
      }



?>
