<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once("controleur/config_bdd.php");
require_once("controleur/controleur.class.php");

$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
$unControleur->setTable("resetpassword");

require_once("vue/vue_mdp_oublie.php");

if (isset($_POST["email"])) {
    $emailTo = $_POST["email"];
    $code = uniqid(true);

    if (isset($_POST['submit'])) {


        $tab = array(
            "code" => $code,
            "email" => $emailTo

        );
        // var_dump($tab);
        $unControleur->insert($tab);
        $date = date('d/m/y');
        $heure = date('h:i');
        $erreur = "Votre mdp a bien été inséré le $date à $heure ! ";
    }

    // //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'sog.inform@gmail.com'; //SMTP username
        $mail->Password = '@mehdijp2022'; //SMTP password
        $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sog.inform@gmail.com', 'Reset Password');
        $mail->addAddress("$emailTo"); //Add a recipient
        $mail->addReplyTo('no-reply@sog.inform.com', 'No reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'SOG Mot de passe';
        $mail->Body = "<h1>Vous avez demandé une réinitialisation de mot de passe</h1>
                        <p>Voici votre nouveau mot de passe : $code</p>";

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script> swal("Demande acceptée","Si l\'email que vous avez fourni est valide, un mot de passe provisoir vous sera envoyé. Vous pourrez le modifier par la suite, directement depuis votre espace personnel", "success") </script> ';
    } catch (Exception $e) {
        echo '<script> swal("Une erreur est survenue ('.$mail->ErrorInfo.')", "Votre demande n\'a pas pu aboutir", "error") </script>';
    }
    exit();
}
?>

</body>
</html>