<?php
include "connection.php";
?>
<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">


    <title>Notes MarketPlace</title>

    <!--favicon-->
    <link rel="shortcut icon" href="image/login/favicon.ico">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--responsive css-->
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
                        <img src="image/login/top-logo.png">
                    </div>

                    <form class="bg-white" method="post">
                        <h3 id="login-form">Login</h3>
                        <p>Enter your email address and password to login</p>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <div class="form-group login-label">
                            <label for="password" class="pwd">Password</label>
                            <label class="fpwd"><a href="forgot.html">Forgot Password?</a></label>
                            <div class="password-input">
                                <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
                                <img src="image/login/eye.png" toggle="#password-field" class="toggle-password">
                            </div>
                        </div>



                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check">&nbsp;
                            <label class="form-check-label" for="check">
                                Remember me
                            </label>
                        </div>

                        <button type="submit" class="btn btn-block btn-login" name="login">LOGIN</button>

                        <?php
                        if(isset($_POST['login'])){

                        $email =$_POST['email'];
                        $password =$_POST['password'];

                        $email = mysqli_real_escape_string($conn,$email);
                        $password = mysqli_real_escape_string($conn,$password);

                       $query = "select * from users where Email='$email' and Password='$password' and UserRole_id=2 and IsActive=1";
                        $result = mysqli_query($conn,$query);
                        if(!$result){
                        die("query failed".mysqli_error($conn));
                        }
                        $count = mysqli_num_rows($result);

                        if($count == 1){
                            echo "hello";
                        header("location:dashboard-admin.php");
                        }
                        else{
                        echo "<h6 style='color:red; padding-top:10px'>Login failed. Invalid username or password.<h6>";
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
</body>

</html>