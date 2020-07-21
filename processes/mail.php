<?php     

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../classes/mailer/Exception.php';
require '../classes/mailer/PHPMailer.php';
require '../classes/mailer/SMTP.php';
if($_POST["page"]=="business"){
    $mail = new PHPMailer(true);
    $name=$_POST["name"];
    $email=$_POST["email"];
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '';                     // SMTP username
        $mail->Password   = '';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;
        $mail->CharSet = 'UTF-8';                                    // TCP port to connect to

        //Recipients
        $mail->setFrom("josecarlosmendes015@gmail.com","Warren Winston"); // igual o de cima
        $mail->AddReplyTo("josecarlosmendes015@gmail.com");
        $mail->addAddress($email, $name);     // vai chegar o e-mail nesse aqui

        $mail->addAttachment('../img/1.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->Subject = "How To Explode Your Success In 90 Days";
        $mail->Body    = "Hello ".$name." I am glad you want to improve your business, I am sending you this attachment with the 10 steps to help you increase your numbers.";
        $mail->WordWrap = 50;  

        $mail->send();
        header("location:../pages/business.php?status=sent");
    } catch (Exception $e) {
        header("location:../pages/business.php?status=erro&error=".$mail->ErrorInfo);
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

}else{
    $mail = new PHPMailer(true);
    $nome=$_POST["name"];
    $email=$_POST["email"];
    $assunto=$_POST["subject"];
    $mensagem=$_POST["message"];
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'josecarlosmendes015@gmail.com';                     // SMTP username
        $mail->Password   = '91236233';                               // SMTP password
        $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 465;
        $mail->CharSet = 'UTF-8';                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($email,$nome); // igual o de cima
        $mail->AddReplyTo($email);
        $mail->addAddress('zagamendes@hotmail.com', 'Izaac');     // vai chegar o e-mail nesse aqui

        //$mail->addAttachment('1.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->Subject = $assunto;
        $mail->Body    = $mensagem;
        $mail->WordWrap = 50;  

        $mail->send();
        header("location:../connect?status=sent");
    } catch (Exception $e) {
        header("location:../connect?status=erro&error=".$mail->ErrorInfo);
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}


?>