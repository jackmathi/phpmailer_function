<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="main">
           
            <div id="login">
                <form action="index.php" method="post">


                    <input type="hidden" value="mathivanan@madebyfire.com" name="email"/>
                    <input type="hidden"  name="password" value="map@960085" />


                    <input type="hidden" value="kumaravel@madebyfire.com" name="toid"/> 


                    <input type="text" placeholder="Subject : " name="subject"/>
                    <textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message"></textarea>
                    <input type="submit" value="Send" name="send"/>
                </form>    
            </div>
        </div>
          <?php
        
              //require 'phpmailer/PHPMailerAutoload.php';

require_once('phpmailer/class.phpmailer.php');
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.smtp.php';

              if(isset($_POST['send']))
                  {
                    //$email = $_POST['email'];                    
                    //$password = $_POST['password'];
                    $email='mathivanan@madebyfire.com';
                    $password='map@960085';

                    $to_id = $_POST['toid'];
                    $message = $_POST['message'];
                    $subject = $_POST['subject'];
                  // echo $email,'<br>', $password; exit;

                    $mail = new PHPMailer;

                    $mail->isSMTP();
                    //$mail->IsSMTP();

                    $mail->Host = 'smtp.gmail.com';
                   // $mail->Host = "ssl://smtp.madebyfire.com"; // specify main and backup server
                   // $mailer->Port = 465;//587;
                    $mail->SMTPAuth = true; // turn on SMTP authentication

                    //$mail->Port = 587;
                    //$mail->SMTPSecure = 'tls';
                  

                    $mail->Username = $email;

                    $mail->Password = $password;
                    //$mailer->SMTPSecure = 'tls';


                    $mail->setFrom('jackmathi2016@gmail.com', 'First ');

                    $mail->addReplyTo('mathibsc20@gmail.com', 'Last');

                    $mail->addAddress($to_id);

                    $mail->WordWrap = 50;

                    $mail->IsHTML(true);

                    $mail->Subject = $subject;

                    $mail->msgHTML($message);

                    if (!$mail->send()) {
                       $error = "Mailer Error: " . $mail->ErrorInfo;
                        ?><script>alert('<?php echo $error ?>');</script><?php
                    } 
                    else {
                       echo '<script>alert("Message sent!");</script>';
                    }
               }
        ?>
    </body>
</html>
