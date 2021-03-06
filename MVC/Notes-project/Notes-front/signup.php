<?php
include "connection.php";
?>
<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail_exist = false;
$mail_sent = false;
$message = "Email already exists!";
$password_match = true;
$length_check = true;

if(isset($_POST['signup'])){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confrmpassword=$_POST['conpwd']; 
    if ($password !=  $confrmpassword) {
        $password_match = false;
        } 
        if (strlen($password) <= 6) { 
             $length_check=false; 
                }
         $check = mysqli_num_rows(mysqli_query($conn,"select * from users where Email='$email'")); 
    
    if($check==0 && $password_match && $length_check){
    $query = "INSERT INTO users(Userrole_id,FirstName,LastName,Email,Password,IsEmailVerified,IsActive) VALUES (1,'$firstname','$lastname','$email','$password',0,1)";
    $result = mysqli_query($conn, $query);
    if(!$result){
            die("query failed".mysqli_error($conn));
        }
        $id = mysqli_insert_id($conn); 
        
      
        
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

    $mail->addAddress($email, $firstname); //receiver 
    $mail->addReplyTo($config_email, 'sendername'); 
    
     $mail->AddEmbeddedImage('image/User-Profile/logo.png', 'logo');
 
   
    $mail->IsHTML(true);  
    $mail->Subject = "Send email using Gmail SMTP and PHPMailer";  
    
     $mail->Body ="<table>
            <tr>
                <td style='height: 75px;'><img src='cid:logo' alt='logo'></td>
            </tr>
            <tr>
                <td
                    style='color: #6255a5; font-size: 26px; font-weight: 600; line-height: 30px; height: 50px;'>
                    Email Verification</td>
            </tr>
            <tr>
                <td style='height: 30px; font-size: 18px; color: #333333;font-weight: 400;'>
                
                <b>Dear $firstname $lastname,</b>
                </td>
            </tr>
            <tr>
                <td style=' font-size: 16px;font-weight: 400; height: 25px; color: #333333;'>
                    Thanks for signing up</td>
            </tr>
            <tr>
                <td style=' font-size: 16px; font-weight: 400; height: 25px; color: #333333;'>
                    Simply click below for email verification.</td>
            </tr>
            <tr>
                <td style='height: 50px;'>
                <a href='http://localhost/Notes-project/Notes-front/check.php?id=$id'> 
                <button
                        style='width: 300px;background-color: #6255a5;height: 35px;border-radius: 3px;font-size: 18px; border:transparent;text-transform: uppercase;color: #fff;line-height: 22px;'>verify
                        email address</button>
                        </a></td>
            </tr>
        </table>";
   
    
       $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
 
    $mail->send();
   
}

catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}

    }
    else{
    $mail_exist=true;
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

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--Responsive tabs css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>

    <!--signup-->
    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-signup">

                    <div id="logo" class="text-center">
                        <img src="image/pre-login/top-logo.png">
                    </div>

                    <form action="signup.php" method="post" class="bg-white-signup">
                        <h3 id="login-form-signup">Create an Account</h3>
                        <p>Enter your details to signup</p>

                        <div class="form-group signup">
                            <label for="fn"> First Name<span class="required">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="fn" name="firstname" placeholder="Enter your first name" required>
                        </div>
                        <div class="form-group signup">
                            <label for="ln"> Last Name<span class="required">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="ln" name="lastname" placeholder="Enter your last name" required>
                        </div>

                        <div class="form-group signup">
                            <label for="email"> Email<span class="required">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <div class="correct-email">
                            <?php
                            if($mail_exist){
                                echo $message;
                            }
                            ?>
                            </div>
                        </div>

                        <div class="form-group signup">
                            <label for="password" class="pwd"> Password</label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
                            <div class="correct-email">
                             <?php
                                    if (!$password_match)
                                    echo "The Password doesn't match!";
                                    else if (!$length_check) {
                                    echo "The Password Length Should be more then 6 characters";
                                    }
                                        ?>
                            </div>
                        </div>

                        <div class="form-group signup">
                            <label for="conpwd" class="pwd">Confirm Password</label>
                            <input type="password" class="form-control form-control-sm" id="conpwd" name="conpwd" placeholder="Re-Enter your Password">
                        </div>

                        <button type="submit" class="btn btn-block btn-signup" name="signup">SIGNUP</button>


                        <div class="already-account">
                            Already have an account?
                            <a href="login.php">Sign in</a>
                        </div>
                        <?php
                        
                      
                        
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

    <script src="javascript/script.js"></script>

</body>

</html>