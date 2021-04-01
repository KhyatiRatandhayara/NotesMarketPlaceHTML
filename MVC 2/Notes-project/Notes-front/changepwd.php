<?php
include "connection.php";
session_start();
$message_old=true;
$message_new =true;
$changed_success =false;
if(isset($_SESSION['email'])){
 $email =$_SESSION['email'];
 $query ="SELECT * FROM users WHERE Email='$email'" ;
 $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $password_db = $row['Password'];
    }
if(isset($_POST['submit'])){
    
  $oldpassword =$_POST['oldpassword']; 
  $newpassword =$_POST['newpassword'];  
  $confirmpassword = $_POST['confirmpassword'];
  if($password_db != $oldpassword){
    $message_old = false;  
  }
  if($newpassword != $confirmpassword){
      $message_new =false;
  }    
  if($message_old && $message_new){
      $query_update="UPDATE users SET Password='$newpassword' WHERE Email='$email'";
      $result_update = mysqli_query($conn,$query_update);
      $changed_success = true;
      if(!$result_update){
          echo "failed";
      }
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
    <!--change password-->
    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-changepwd">

                    <div id="logo" class="text-center">
                        <img src="image/pre-login/top-logo.png">
                    </div>
                    <form class="bg-white" method="post">
                        <h3 id="login-form">Change Password</h3>
                        <p>Enter your new password to change your password</p>

                        <!--old password-->

                        <div class="form-group">
                            <label for="password" class="pwd">Old Password</label>
                            <div class="password-input">
                                <input id="password-field" type="password" class="form-control" name="oldpassword" placeholder="Enter your old password">
                                <div class="incorrect">
                                <?php 
                                if(!$message_old){
                                echo "please enter valid password"; 
                                }
                                ?>
                                </div>
                                <img src="image/pre-login/eye.png" toggle="#password-field" class="toggle-password">
                            </div>
                        </div>

                        <!--new password-->
                        <div class="form-group">
                            <label for="password" class="pwd">New Password</label>
                            <div class="password-input">
                                <input id="password-field-2" type="password" class="form-control" name="newpassword" placeholder="Enter your new password">
                                <img src="image/pre-login/eye.png" toggle="#password-field-2" class="toggle-password">
                            </div>
                        </div>

                        <!--confirm password-->
                        <div class="form-group">
                            <label for="password" class="pwd">confirm Password</label>
                            <div class="password-input">
                                <input id="password-field-3" type="password" class="form-control" name="confirmpassword" placeholder="Enter your confirm password">
                                 <div class="incorrect">
                                <?php 
                                if(!$message_new){
                                echo "password and confirm password should be same"; 
                                }
                                ?>
                                </div>
                                <img src="image/pre-login/eye.png" toggle="#password-field-3" class="toggle-password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-change-pwd" name="submit">SUBMIT</button>
                        <div class="correct">
                        <?php
                      if($changed_success){
                          echo "your password changed successfully";
                      }
                        ?>
                        </div>
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

    <!-----script js------>
    <script src="javascript/script.js"></script>
</body>

</html>