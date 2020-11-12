<?php

    namespace App\Libs;

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;

   
    class Email 
    {
        private $email;
        

        public function __construct()
        {
            
            $this->email = new PHPMailer();


                //$this->email->SMTPDebug = SMTP::DEBUG_CLIENT;
                $this->email->CharSet = "UTF-8";
                $this->email->isSMTP();
                $this->email->Host = 'smtp.gmail.com';
                $this->email->Port    = 587;
                //$email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $this->email->SMTPAuth = true;
                $this->email->Username = EMAIL_USER;
                $this->email->Password = EMAIL_PASS;
                

                $this->email->setFrom(EMAIL_USER);
                /*$email->addAddress('viniciusdnb@hotmail.com');
                    $email->addAddress('suporte01@vitalhospitalar.com.br');
                    
                    $email->isHTML(true);
                    $email->Subject = 'este é o assunto';
                    $email->Body = 'corpo da mensagem';

                    $email->send();
                    echo 'mensagem enviada com sucesso';*/
             
        }

        public function submitEmail(array $emails, array $factorys)
        {
            $tot = count($emails);

            for ($i=0; $i < $tot ; $i++) 
            { 
                try
                {
                    $this->email->addAddress($emails[$i]);
                    $this->email->isHTML(true);
                    $this->email->Subject = "TESTE DE ENVIO AUTOMATICO DE EMAIL";
                    $this->email->Body = '<h1>TESTE DE ENVIO AUTOMATICO DE EMAIL</h1><p>Boa tarde' . $factorys[$i] . '</p><p>ha novos itens para cotar</p><p>atenção cotar somente se atender 100% do descritivo</p><p>acesse o link para fazer a cotação</p>';

                    $submit = $this->email->send();

                    if($submit)
                    {
                        return TRUE;
                    }
                    else
                    {
                        return FALSE;
                    }
                    
                }
                 catch (Exception $e) 
                {
                    echo "Message could not be sent. Mailer Error: {$this->email->ErrorInfo}";
                }

            }

            
        }
    }

?>