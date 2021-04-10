<?php
include "connection.php"; 
session_start();
if(isset($_SESSION['email'])){
    
    $email = "";
    $gender = "";
    $dob = "";
    $countrycode = "";
    $phoneno = "";
    $address1 = "";
    $city = "";
    $zipcode = "";
    $address2 = "";
    $state = "";
    $country = "";
    $university = "";
    $college = ""; 
    $display_default_img ="";

$email=$_SESSION['email'];
$query = "select * from users where Email='$email'";
$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
    $user_id = $row['User_id'];
    $firstname =$row['FirstName'];
    $lastname = $row['LastName'];
}
$valid_1 = true;
    
$query_fetch="SELECT * FROM userprofile WHERE User_id=$user_id"; 
$result_fetch =mysqli_query($conn,$query_fetch);
    
    
while($row=mysqli_fetch_assoc($result_fetch)){
    $city = $row['City'];
    $country = $row['Country'];
    $dob = $row['DOB'];
    $gender = $row['Gender'];
    $email = $row['SecondaryEmail'];
    $countrycode = $row['Phonenumber_Countrycode'];
    $phoneno = $row['PhoneNumber'];
    $address1 = $row['AddressLine1'];
    $address2 = $row['AddressLine2'];
    $state = $row['State'];
    $zipcode = $row['State'];
    $university = $row['University'];
    $college = $row['College'];
}
  
$id_count=mysqli_num_rows($result_fetch);    
if($id_count>0){
    if(isset($_POST['submit'])){
        
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $countrycode = $_POST['countrycode'];
    $phoneno = $_POST['phoneno'];
    $address1 = $_POST['address1'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $address2 = $_POST['address2'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $university = $_POST['university'];
    $college = $_POST['college'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
        
     $query_path_fetch=mysqli_query($conn,"SELECT ProfilePicture FROM userprofile WHERE User_id=$user_id");
    while($row=mysqli_fetch_assoc($query_path_fetch)){
       $profile_path = $row['ProfilePicture']; 
    }    
        
    $query_update = "UPDATE userprofile SET DOB='$dob',Gender=$gender,SecondaryEmail='$email',Phonenumber_Countrycode=$countrycode,PhoneNumber='$phoneno',AddressLine1='$address1',AddressLine2='$address2',City='$city',State='$state',ZipCode='$zipcode',Country=$country,University='$university',College='$college' WHERE User_id=$user_id";
    $result_update = mysqli_query($conn,$query_update);
    if(!$result_update){
        die("failed".mysqli_error($conn));
    }
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
    if(!is_dir('../Members/'. $user_id)){
    mkdir('../Members/'. $user_id);
    }
    $destinationfile1 ='../Members/' .$user_id. '/' .'DP_'.time(). '.' .$filecheck1;
    move_uploaded_file($filetmp1,$destinationfile1);
        
     if($profile_path != $display_default_img){
     unlink($profile_path);
     }

    $query_profile = "update userprofile set ProfilePicture='$destinationfile1' WHERE User_id=$user_id";
    $result_profile =mysqli_query($conn,$query_profile);
    }
    else{
    $valid_1 = false;
    }      
        
    $query_update_users="UPDATE users SET FirstName='$firstname',LastName='$lastname' WHERE User_id=$user_id";
    $result_update_users=mysqli_query($conn,$query_update_users);
    if(!$result_update_users){
        die("failed".mysqli_error($conn));
    }    
        
    
        
}
    
 }   
else if(isset($_POST['submit'])){
    
   
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $countrycode = $_POST['countrycode'];
    $phoneno = $_POST['phoneno'];
    $address1 = $_POST['address1'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $address2 = $_POST['address2'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $university = $_POST['university'];
    $college = $_POST['college'];
    $display_default_img="../Members/default/DP.jpg";
    
    
    $query = "INSERT INTO userprofile(User_id,DOB,Gender,SecondaryEmail,Phonenumber_Countrycode,PhoneNumber,ProfilePicture,	AddressLine1,AddressLine2,City,State,ZipCode,Country,University,College,CreatedDate) VALUES($user_id,'$dob',$gender,'$email',$countrycode,'$phoneno',' $display_default_img','$address1','$address2','$city','$state','$zipcode','$country','$university','$college',NOW())";
    $result = mysqli_query($conn,$query);
    if(!$result){
       die("failed".mysqli_error($conn));
    }
    
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
    if(!is_dir('../Members/'. $user_id)){
    mkdir('../Members/'. $user_id);
    }
    $destinationfile1 ='../Members/' .$user_id. '/' .'DP_'.time(). '.' .$filecheck1;
    move_uploaded_file($filetmp1,$destinationfile1);

    $query_profile = "update userprofile set ProfilePicture='$destinationfile1' WHERE User_id=$user_id";
    $result_profile =mysqli_query($conn,$query_profile);
    }
    else{
    $valid_1 = false;
    }
}
}
else{
    header("location:login.php");
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
    <!--user-profile-->
  <?php
    include "header.php";
    ?>

    <!--header end-->
    <section id="userprofile">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>User Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form method="post" enctype="multipart/form-data">
    <section id="u-profile1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>Basic Profile Details</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="fn"> First Name<span class="required">*</span></label>
                     
                         <input type="text" class="form-control" id="fn" value="<?php echo $firstname ?>" name="firstname" placeholder="Enter your first name" required>   
                        
                       
                    </div>

                    <div class="form-group">
                        <label for="email">Email<span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" value="<?php echo $email?>" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control arrow-down">
                           <?php
                           if($id_count>0){
                                $query_gender = "SELECT * FROM reference_data WHERE Refdata_id=9 OR Refdata_id=10 OR Refdata_id=12";
                                $result_gender = mysqli_query($conn,$query_gender);
                                while($row=mysqli_fetch_assoc($result_gender)){
                                $gender_id = $row['Refdata_id'];
                                $value = $row['Value'];
                                    if($gender==$gender_id){
                                       echo "<option value='$gender' selected='selected'>$value</option>"; 
                                    }
                                    else{
                                       echo "<option value='$gender_id'>$value</option>"; 
                                    }
                                }
                           }
                            else{
                                
                            echo "<option selected disabled>select your gender</option>"; 
                            $query_gender = "SELECT * FROM reference_data WHERE Refdata_id=9 OR Refdata_id=10 OR Refdata_id=12";
                            $result_gender = mysqli_query($conn,$query_gender);
                            while($row=mysqli_fetch_assoc($result_gender)){
                               $gender_id = $row['Refdata_id'];    
                               $value = $row['Value'];
                                echo "<option value='$gender_id'>$value</option>";
                            }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Profile Picture</label>
                        <div class="picture">
                            <label for="file-input">
                                <img src="image/Add-notes/upload-file.png">
                            </label>
                            <input id="file-input" type="file" name="profile_pic">
                             <div class="incorrect">
                                <?php
                        if($valid_1 == false){
                            echo "only JPEG,JPG and PNG should be supported";
                        }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ln"> Last Name<span class="required">*</span></label>
                        
                        <input type="text" class="form-control" id="ln" value="<?php echo $lastname ?>" name="lastname" placeholder="Enter your last name" required>
                    
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value=<?php echo $dob; ?> placeholder="Enter Your Date Of Birth">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-5">
                            <div class="form-group">
                                <label for="phone">Phone No.</label>
                                <select id="phone" class="form-control arrow-down" name="countrycode">
                                    <?php 
                                    if($id_count>0){
                                 
                                         $query_country = "SELECT * FROM countries";
                                         $result_country = mysqli_query($conn,$query_country);
                                         while($row=mysqli_fetch_assoc($result_country)){
                                         $country_id = $row['Country_id'];
                                         $country_code = $row['CountryCode'];
                                             
                                        if($countrycode == $country_id){
                                            echo "<option value='$countrycode' selected='selected'>+$country_code</option>"; 
                                        }
                                        else{
                                           echo "<option value='$country_id'>+$country_code</option>";  
                                        }     
                                         }
                                    } 
                               else{
                                   $query_country = "SELECT * FROM countries";
                                   $result_country = mysqli_query($conn,$query_country); 
                                    while($row=mysqli_fetch_assoc($result_country)){
                                        $country_id = $row['Country_id'];
                                        $country_code = $row['CountryCode'];
                                        echo "<option value='$country_id'>+$country_code</option>";
                                    }
                                   }
                                  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-7">
                            <div class="form-group">
                                <label for="phone"><br></label>
                                <input type="tel" class="form-control" id="phone" name="phoneno" value="<?php echo $phoneno?>" placeholder="phone no.">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section id="u-profile2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>Address Details</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="al1">Address Line 1<span class="required">*</span></label>
                        <input type="text" class="form-control" id="al1" name="address1" value="<?php echo $address1 ?>" placeholder="Enter your Address" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City<span class="required">*</span></label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city ?>" placeholder="Enter Your City" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">ZipCode<span class="required">*</span></label>
                        <input type="text" class="form-control" id="zip" name="zipcode"  value="<?php echo $zipcode ?>" placeholder="Enter Your Zipcode" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="al2">Address Line 2</label>
                        <input type="text" class="form-control" id="al2"  name="address2" value="<?php echo $address2?>" placeholder="Enter your Address">
                    </div>
                    <div class="form-group">
                        <label for="state">State<span class="required">*</span></label>
                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $state?>" placeholder="Enter Your State">
                    </div>
                    <div class="form-group">
                        <label for="country">Country<span class="required">*</span></label>
                          <select id="country" class="form-control arrow-down" name="country">
                                    <?php 
                              if($id_count>0){
                               
                                    $query_country = "SELECT * FROM countries";
                                   $result_country = mysqli_query($conn,$query_country); 
                                    while($row=mysqli_fetch_assoc($result_country)){
                                        $country_id = $row['Country_id'];
                                        $country_name = $row['CountryName'];
                                        if($country == $country_id){
                                           echo "<option value='$country' selected='selected'>$country_name</option>"; 
                                        }
                                        else{
                                           echo "<option value='$country_id'>$country_name</option>";  
                                        }
                                    }
                              }
                               else{
                               echo "<option selected disabled>select your country</option>"; 
                                   $query_country = "SELECT * FROM countries";
                                   $result_country = mysqli_query($conn,$query_country); 
                                    while($row=mysqli_fetch_assoc($result_country)){
                                        $country_id = $row['Country_id'];
                                        $country_name = $row['CountryName'];
                                        echo "<option value='$country_id'>$country_name</option>";
                                    }
                                   }
                                  ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="u-profile3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>University and College information</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="university">University</label>
                        <input type="text" class="form-control" id="university" value="<?php echo $university ?>" name="university" placeholder="Enter your university">
                    </div>


                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="college">College</label>
                        <input type="text" class="form-control" id="college" name="college" value="<?php echo $college ?>" placeholder="Enter your college">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-user-profile" name="submit">SUBMIT</button>
                </div>
            </div>
        </div>
    </section>
    </form>

    <?php
    include "footer.php";
    ?>


    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
    
     <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>