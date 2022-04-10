<?php
use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer/src/PHPMailer.php";
    require_once "PHPMailer/src/SMTP.php";
    require_once "PHPMailer/src/Exception.php";

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $objet = $_POST['objet'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sog.inform@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = '@mehdijp2022'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('sog.inform@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('sog.inform@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Objet : $objet <br>Message : $message</h3>";

    $mail->send();
    $alert = '<script> swal("Message envoyé !", "Nous vous répondrons dans les plus brefs délais", "success") </script>';
    
    /*'<div class="alert-success"> <span>Message Envoyé ! Nous vous répondrons dans les plus brefs délais.</span> </div>';*/
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}

include 'vue/vue_formulaire_de_contact.php';

?>