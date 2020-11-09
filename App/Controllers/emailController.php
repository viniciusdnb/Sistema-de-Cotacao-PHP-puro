<?php

    namespace App\Controllers;

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;

   
    class EmailController extends Controller
    {
        public function index()
        {
            $email = new PHPMailer();
            try {
                $email->SMTPDebug = SMTP::DEBUG_CLIENT;
                $email->isSMTP();
                $email->Host = 'smtp.gmail.com';
                $email->Port    = 587;
                //$email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $email->SMTPAuth = true;
                $email->Username = 'viniciusdnb72@gmail.com';
                $email->Password = '@Vinicius42017343@';
                

                $email->setFrom('viniciusdnb72@gmail.com');
                $email->addAddress('viniciusdnb@hotmail.com');
                $email->isHTML(true);
                $email->Subject = 'este é o assunto';
                $email->Body = 'corpo da mensagem';

                $email->send();
                echo 'mensagem enviada com sucesso';

                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$email->ErrorInfo}";
            }
        }
    }

?>