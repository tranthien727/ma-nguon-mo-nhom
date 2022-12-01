<?php ob_start();
include 'partials/header.php'; ?>
<?php
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";

include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$Email=$_SESSION['Email'];
if(isset($_POST['submit'])){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tran.thien727@gmail.com';                 // SMTP username
        $mail->Password = 'sjxxyaaaislajeyd';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
     
        //Recipients
        $mail->setFrom($Email, 'User ICTShop');
        $mail->addAddress('tran.thien727@gmail.com', 'Admin ICTShop');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
     
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
     
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['tieude'];
        $mail->Body    = $_POST['noidung'];
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
     
        $mail->send();
        // echo 'Message has been sent';
        header('Location: home.php');
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}


?>
<section class="phanhoi" style="height:500px">
<div class="container">
    <form action='' method='POST' >
        <table cellpadding='0' cellspacing='0' border='0' align="center">
            <tr>
                <td colspan="2"><h1>Phản hồi</h1></td>
            </tr>
            <tr>
                <td>
                    Tiêu đề :
                </td>
                <td>
                    <input type='text' name='tieude' size="40"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nội dung :
                </td>
                <td>
                    <textarea name="noidung" cols="43" rows="10" ></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="signupbtn" name="submit"> Gửi</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
</section>
<?php include 'partials/footer.php';
ob_end_flush(); ?>