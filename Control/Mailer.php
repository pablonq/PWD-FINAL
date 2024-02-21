<?php 
class Mailer{
  public function enviarMail(){
   
      
      //Server settings
      $mail->SMTPDebug = 2;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'pablo.navarro@est.fi.uncoma.edu.ar';                     //SMTP username
      $mail->Password   = '27493233';                               //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('pablo.navarro@est.fi.uncoma.edu.ar', 'Ferreteria Chaneton');
      $mail->addAddress('navarropabloq@gmail.com', 'Pablo navarro');     //Add a recipient
                    //Name is optional
      
  
      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'testeando';
      $mail->Body    = 'Estamos <b>testeando!</b>';
      
  
      $mail->send();
      
  
  }
}
?>