<?php 
include "connection.php";
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $query_email = mysqli_query($conn,"SELECT * FROM users WHERE Email='$email'");
    while($row=mysqli_fetch_assoc($query_email)){
       $admin_user_id = $row['User_id']; 
        $firstname = $row['FirstName'];
        $lastname = $row['LastName'];
    }
    
    if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];    
    $secondary_email = $_POST['secondary_email'];
    $phonecode = $_POST['phonecode'];    
    $phoneno = $_POST['phoneno'];  
        
     $files1 =$_FILES['profile_pic'];

    $filename1 =$files1['name'];
    $filetmp1 = $files1['tmp_name'];
    $extention1 =explode('.',$filename1);
    $filecheck1 = strtolower(end($extention1));

    $fileextstored1 =array('jpg','png','jpeg');

    //profile picture

    if(in_array($filecheck1, $fileextstored1)){
    if(!is_dir('../Members/')){
    mkdir('../Members/');
    }
    if(!is_dir('../Members/'.$admin_user_id)){
    mkdir('../Members/'. $admin_user_id);
    }
   
    $destinationfile1 ='../Members/' .$admin_user_id. '/' .'Profile_picture_'.time(). '.' .$filecheck1;

    move_uploaded_file($filetmp1,$destinationfile1);;
    }
   
    
        
    $query_update = mysqli_query($conn,"UPDATE userprofile SET 	SecondaryEmail='$secondary_email',Phonenumber_Countrycode='$phonecode',PhoneNumber='$phoneno',ProfilePicture='$destinationfile1' WHERE User_id=$admin_user_id"); 
    $query_update_name = mysqli_query($conn,"UPDATE users SET FirstName='$firstname',LastName='$lastname' WHERE User_id=$admin_user_id");    
    }
    
    
    
}
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

    <!--font Awesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
  <?php 
    include "admin-header.php";
    ?>
   
    <form method="post" enctype="multipart/form-data">
    <div class="bottom-footer">
        <section id="my-profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4>My Profile</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="fn"> First Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="fn" placeholder="Enter your first name" value="<?php echo $firstname ?>" name="firstname">
                        </div>
                        <div class="form-group">
                            <label for="ln"> Last Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="ln" placeholder="Enter your last name" value="<?php echo $lastname ?>" name="lastname">
                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="email">Secondary Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" name="secondary_email">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-5">
                                <div class="form-group">
                                    <label for="phone">Phone No.</label>
                                    <select id="phone" class="form-control  arrow-down" name="phonecode">
                                        <?php 
                                        $query_fetch = mysqli_query($conn,"SELECT * FROM countries");
                                        while($row=mysqli_fetch_assoc($query_fetch)){
                                            $phonecode = $row['CountryCode'];
                                            $phone_id = $row['Country_id'];
                                            echo "<option value='$phone_id'>+$phonecode</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-7">
                                <div class="form-group">
                                    <label for="phone"><br></label>
                                    <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" name="phoneno">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <div class="picture-2">
                                <label for="file-input">
                                    <img src="image/myprofile/upload-file.png">
                                </label>
                                <input id="file-input" type="file" name="profile_pic">
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6"></div>

                </div>

                <button class="btn btn-profile" name="submit">SUBMIT</button>
            </div>
        </section>
    </div>
    </form>
    <!--footer-->
    <?php include "admin-footer.php";
    ?>
    <!--footer end-->

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>