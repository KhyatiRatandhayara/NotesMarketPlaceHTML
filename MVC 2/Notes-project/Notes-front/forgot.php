<?php
include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--Responsive tabs css-->
    <link rel="stylesheet" href="css/responsive.css">


</head>

<body>
    <!--forgot password-->
    <section id="forgot">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-forgot">

                    <div id="logo" class="text-center">
                        <img src="image/pre-login/top-logo.png">
                    </div>

                    <form class="bg-white-fpwd" method="post">
                        <h3 id="login-form">FORGOT PASSWORD?</h3>
                        <p>Enter your email to reset your password</p>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <button type="submit" class="btn btn-block fbtn" name="submit">SUBMIT</button>
                        <?php
                   if(isset($_POST['submit'])){
             $email = $_POST['email'];
    
             $query ="select * from users where Email='$email'";
             $result =mysqli_query($conn,$query);
             if(!$result){
        die("query failed".mysqli_error($conn));
       
    }
    
     $row = mysqli_num_rows($result);
   
  

    if($row==1){
        
        function new_password($length = 8){
          $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                    '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';

          $str = '';
          $max = strlen($chars) - 1;

          for ($i=0; $i < $length; $i++)
            $str .= $chars[random_int(0, $max)];

          return $str;
        }
        $new_password = new_password();
        
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
    
    $mail->setFrom($config_email,'NotesMarketPlace');

    $mail->addAddress($email, 'Username');  
    $mail->addReplyTo($config_email, 'sendername');  
    


    $mail->IsHTML(true);  
    $mail->Subject = "New Temporary Password has been created for you"; 
    
     $mail->Body ="Hello,<br>We have generated a new password for you Password: <b>$new_password</b><br>
     Regards,<br>Notes Marketplace";
   
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   
 
    $mail->send();
    $query = "update users set Password='$new_password' where Email='$email'";
    mysqli_query($conn,$query);
 
}

catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
        echo "<h6 style='color:black'>Your password has been changed successfully and <b>newly generated password</b> is sent on your registered email address $email</h6>";

    }
    else{
       echo "Your email id <b>$email</b> is not registered."; 
    }
    
    }
  ?>

                    </form>

                </div>
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>
            </div>

        </div>
    </section>


    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
    
     <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>