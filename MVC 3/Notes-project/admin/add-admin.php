<?php 
include "connection.php";

$firstname = " ";
$lastname = " ";
$email_admin = " ";
$phoneno = " ";
$phonecode_id = " ";

if(isset($_GET['userid'])){
   $userid = $_GET['userid']; 
   $query_fetch_details = mysqli_query($conn,"SELECT users.FirstName,users.LastName,users.Email,userprofile.PhoneNumber,userprofile.Phonenumber_Countrycode FROM  users LEFT JOIN userprofile ON users.User_id=userprofile.User_id WHERE users.User_id=$userid");
   while($row=mysqli_fetch_assoc($query_fetch_details)){
     $firstname = $row['FirstName'];
     $lastname = $row['LastName'];
     $email_admin = $row['Email'];
     $phoneno = $row['PhoneNumber'];
     $phonecode_id = $row['Phonenumber_Countrycode'];   
        
   }
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
       $phoneno = $_POST['phoneno'];
        $phonecode_name = $_POST['phonecode'];
        
        $query_update = mysqli_query($conn,"UPDATE users SET FirstName='$firstname',LastName='$lastname',email='$email' WHERE User_id=$userid");
        $query_upadte_2 = mysqli_query($conn,"UPDATE userprofile SET PhoneNumber='$phoneno',Phonenumber_Countrycode=$phonecode_name WHERE User_id=$userid");
        header("Refresh:0;");
       
    }
}
else if(isset($_POST['submit'])){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonecode = $_POST['phonecode'];
    $phoneno = $_POST['phoneno'];
    
    $query = mysqli_query($conn,"INSERT INTO users(UserRole_id,	FirstName,LastName,	Email,Password,IsEmailVerified,CreatedDate,CreatedBy,ModifiedDate,IsActive) VALUES(2,'$firstname','$lastname','$email','admin123',1,NOW(),1,NOW(),1)");
    
     $admin_id = mysqli_insert_id($conn);
    
    $query_phonecode = mysqli_query($conn,"INSERT INTO userprofile(User_id,Phonenumber_Countrycode,PhoneNumber) VALUES ($admin_id,$phonecode,'$phoneno')");
    if(!$query_phonecode){
        die(mysqli_error($conn));
    }
    header("location:administrator-admin.php");
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
    <form method="post">

    <div class="bottom-footer">

        <section id="add-admin">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Add Administrator</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fn"> First Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="fn" placeholder="Enter your first name" name="firstname" value="<?php echo $firstname ?>">
                        </div>
                        <div class="form-group">
                            <label for="ln"> Last Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="ln" placeholder="Enter your last name" name="lastname" value="<?php echo $lastname ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email_admin ?>">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-5">
                                <div class="form-group">
                                    <label for="phone">Phone No.</label>
                                    <select id="phone" class="form-control arrow-down" name="phonecode">
                                        <?php 
                                          if(isset($_GET['userid'])){
                                          $query_fetch = mysqli_query($conn,"SELECT * FROM countries");
                                          while($row=mysqli_fetch_assoc($query_fetch)){
                                          $phonecode = $row['CountryCode'];
                                          $phone_id = $row['Country_id'];
                                          if($phone_id==$phonecode_id){
                                          echo "<option value='$phone_id' selected='selected'>+$phonecode</option>";
                                          }
                                          else{
                                          echo "<option value='$phone_id'>+$phonecode</option>";
                                          }
                                          }

                                          }

                                          else{

                                          $query_fetch = mysqli_query($conn,"SELECT * FROM countries");
                                          while($row=mysqli_fetch_assoc($query_fetch)){
                                          $phonecode = $row['CountryCode'];
                                          $phone_id = $row['Country_id'];
                                          echo "<option value='$phone_id'>+$phonecode</option>";
                                          }

                                          }
                                        
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-7">
                                <div class="form-group">
                                    <label for="phone"><br></label>
                                    <input type="tel" class="form-control" id="phone" placeholder="phone no." name="phoneno" value="<?php echo $phoneno ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-add-admin" name="submit">SUBMIT</button>

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