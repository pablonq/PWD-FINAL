<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mail extends PHPMailer {

public function enviarCorreo($mailUsuario, $nombreUsuario, $asunto, $body) {
   
        $this->SMTPDebug = 2;                                     //Activacion salida errores
        $this->isSMTP();                                          //Enviar usando protocolo SMTP
        $this->Host       = 'smtp.gmail.com';                     //Host
        $this->SMTPAuth   = true;                                 //Autenticacion de protocolo
        $this->Username   = 'pablo.navarro@est.fi.uncoma.edu.ar'; //Remitente
        $this->Password   = '27493233';                           //password
        $this->SMTPSecure = 'ssl';                                //Encryption
        $this->Port       = 465;                                   //TCP port to connect

        $this->setFrom('pablo.navarro@est.fi.uncoma.edu.ar', 'Ferreteria Chaneton');
        $this->addAddress($mailUsuario, $nombreUsuario);     //Destinatario

        //Adjuntos
        //$this->addAttachment('/var/tmp/file.tar.gz');         
        //$this->addAttachment('/tmp/image.jpg', 'new.jpg');    

        //Contenido
        $this->isHTML(true);                                  //Formato email
        $this->Subject = $asunto;         //Asunto
        $this->Body = $body; //Mensaje
       /*  $this->send(); */
        $resp = true;
        if (!$this->send()){
          $resp=false;
        }
        return $resp;

    
}
}
?>