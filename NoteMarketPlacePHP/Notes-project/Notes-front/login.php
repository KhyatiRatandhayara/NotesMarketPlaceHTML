<?php
include "connection.php";
 session_start();
 $_SESSION['login'] = true;
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
    <!--login-->
    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-login">
                    <!--logo-->
                    <div id="logo" class="text-center">
                        <img src="image/pre-login/top-logo.png">
                    </div>

                    <form class="bg-white" method="post">
                        <h3 id="login-form">Login</h3>
                        <p>Enter your email address and password to login</p>

                        <div class="form-group login-label">
                            <label for="email">Email</label>
                            <?php
                           if(isset($_COOKIE['email'])){
                               $new_email=$_COOKIE['email'];
                            echo "<input type='email' class='form-control' id='email' name='email' value='$new_email' aria-describedby='emailHelp' placeholder='Enter email' required>";
                           }
                           else{
                           echo "<input type='email' class='form-control' id='email' name='email' aria-describedby='emailHelp' placeholder='Enter email' required>";
                           }
                            ?>
                        </div>

                        <div class="form-group login-label">
                            <label for="password" class="pwd">Password</label>  
                              <label class="fpwd"><a href="forgot.php">Forgot Password?</a></label>
                            <div class="password-input">
                                <img src="image/pre-login/eye.png" toggle="#password-field" class="toggle-password">
                            </div>
                             <?php 
                             if(isset($_COOKIE['password'])){
                               $new_password=$_COOKIE['password'];
                            echo "<input id='password-field' type='password' class='form-control' value='$new_password' name='password' placeholder='Password'>";
                           }
                           else{
                           echo "<input id='password-field' type='password' class='form-control' name='password' placeholder='Password'>";
                           }
                            ?>     
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check" name="rememberme">&nbsp;
                            <label class="form-check-label login-check-label" for="check">
                                Remember me
                            </label>
                        </div>

                        <button type="submit" class="btn  btn-block btn-login" name="login">LOGIN</button>
                        <div class="alreadySign">
                            Don't have an account?
                            <a href="signup.php">Sign Up</a>
                        </div>
                        <?php
                       
                        
                        if(isset($_POST['login'])){

                        $email =$_POST['email'];
                        $password =$_POST['password'];

                        $email = mysqli_real_escape_string($conn,$email);
                        $password = mysqli_real_escape_string($conn,$password);

                        $query = "select * from users where Email='$email' and Password='$password' and UserRole_id=1 and IsEmailVerified='1'and IsActive=1";
                        $result = mysqli_query($conn,$query);
                        if(!$result){
                        die("query failed".mysqli_error($conn));
                        }
                        $count = mysqli_num_rows($result);
                            
                        if($count == 1){
                        $_SESSION['email']=$email;
                            if(isset($_POST['rememberme'])){
                                 setcookie('email',$email,time()+60*60*24*7);
                                setcookie('password',$password,time()+60*60*24*7);
                            }
                        header("location:search.php");
                        }
                        else{
                            echo "<h6 style='color:red; padding-top:10px'>Please verified your email address<h6>";
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

    <!------script js--------->
    <script src="javascript/script.js"></script>

</body>

</html>