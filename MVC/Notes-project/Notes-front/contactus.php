<?php
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit']) && ($_POST['email'] != '')){
                    
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                $username = $_POST['username'];
                $subject = $_POST['subject'];
                $comment = $_POST['comment'];
                $email = $_POST['email'];

                $body = "From: ".$username. "\r\n";
                $body .= "subject:".$subject. "\r\n";
                $body .= "comment :".$comment. "\r\n";

                require 'phpmailer/Exception.php';
                require 'phpmailer/PHPMailer.php';
                require 'phpmailer/SMTP.php';


                $mail = new PHPMailer(true);

                try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $config_email = 'kthakkar9426@gmail.com';
                $mail->Username = $config_email;
                $mail->Password = 'khyati@17';

                $mail->setFrom($email,'NotesMarketPlace');

                $mail->addAddress('kthakkar9426@gmail.com', 'khyati');
                $mail->addReplyTo($email, $username );



                $mail->IsHTML(true);
                $mail->Subject = $subject;

                $mail->Body ="From:<b>$username</b><br><br> subject:<b> $subject</b> <br><br> comment :$comment<br><br> sendername:<b>$email</b>";

                $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

                $mail->send();

                }

                catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                }


                }
                }
?>

<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">


    <title>Notes MarketPlace</title>

    <!--favicon-->
    <link rel="shortcut icon" href="image/home/favicon.ico">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--font Awesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--Responsive tabs css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
      <?php
    include "header.php";
    ?>

    <!--header end-->
    <section id="userprofile">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Contact Us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Get In Touch</h3>
                    <p>Let us know how to get back to you</p>
                </div>
            </div>
            <form action="contactus.php" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full-name">Full Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="full-name" name="username" placeholder="Enter your full name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject<span class="required">*</span></label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comment">Comment/Questions<span class="required">*</span></label><br>
                            <textarea id="comment" name="comment" rows="4" cols="65" placeholder="Comment..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-contact" name="submit">SUBMIT</button>
                    </div>
                </div>
                <?php
                
                        
                ?>
            </form>

        </div>
    </section>

    <?php
    include "footer.php";
    ?>


    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
</body>

</html>