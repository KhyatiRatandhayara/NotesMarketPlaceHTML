<?php
include "connection.php";
$query_support_email = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='SE'");
while($row=mysqli_fetch_assoc($query_support_email)){
    $support_mail = $row['Value'];
}
$count_support_email = mysqli_num_rows($query_support_email);

$query_phone_no = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='PN'");
$count_phone_no = mysqli_num_rows($query_phone_no);
while($row=mysqli_fetch_assoc($query_phone_no)){
    $phone_num = $row['Value'];
}

$query_email = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='E'");
$count_email = mysqli_num_rows($query_email);
while($row=mysqli_fetch_assoc($query_email)){
    $email_id = $row['Value'];
}


$query_facebook = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='FB'");
$count_facebook = mysqli_num_rows($query_facebook);
while($row=mysqli_fetch_assoc($query_facebook)){
    $facebook = $row['Value'];
}

$query_twitter = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='TW'");
$count_twitter = mysqli_num_rows($query_twitter);
while($row=mysqli_fetch_assoc($query_twitter)){
    $twitter = $row['Value'];
}

$query_linkedin = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='LI'");
$count_linkedin  = mysqli_num_rows($query_linkedin);
while($row=mysqli_fetch_assoc($query_linkedin)){
    $linkedin = $row['Value'];
}

$query_note_upload = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='NU'");
$count_note_upload  = mysqli_num_rows($query_note_upload);
while($row=mysqli_fetch_assoc($query_note_upload)){
    $note_upload = $row['Value'];
}

$query_display_pic = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='DP'");
$count_display_pic  = mysqli_num_rows($query_display_pic);
while($row=mysqli_fetch_assoc($query_display_pic)){
    $display = $row['Value'];
}

if(isset($_POST['submit'])){
     $support_email = $_POST['supportemail'];
     $phone_no = $_POST['phoneno'];
     $email_admin = $_POST['email'];
     $facebook_url = $_POST['facebook'];
     $twitter_url = $_POST['twitter'];
     $linkedin_url = $_POST['linkedin'];
    
    $files1 =$_FILES['note_upload'];
    $filename1 =$files1['name'];
    $filetmp1 = $files1['tmp_name'];
    $extention1 =explode('.',$filename1);
    $filecheck1 = strtolower(end($extention1));

    $fileextstored1 =array('jpg','png','jpeg');
    //display picture

    if(in_array($filecheck1, $fileextstored1)){
    if(!is_dir('../Members/')){
    mkdir('../Members/');
    }
        
    $destinationfile1 ='../Members/' .'Default_'.time(). '.' .$filecheck1;

    move_uploaded_file($filetmp1,$destinationfile1);
    if($count_note_upload==0){
      $query_note_upload = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('NU','$destinationfile1',1)");  
    }
    else{
    $query_note_upload = mysqli_query($conn,"UPDATE system_configuration SET Value='$destinationfile1' WHERE ConfigKey='NU'");     
    }
        
    }
    
    $files2 =$_FILES['profile_picture'];
    $filename2 =$files2['name'];
    $filetmp2 = $files2['tmp_name'];
    $extention2 =explode('.',$filename2);
    $filecheck2 = strtolower(end($extention2));

    $fileextstored2 =array('jpg','png','jpeg');
    //display picture

    if(in_array($filecheck2, $fileextstored2)){
    if(!is_dir('../Members/')){
    mkdir('../Members/');
    }
        
    $destinationfile2 ='../Members/' .'Default_'.time(). '.' .$filecheck2;

    move_uploaded_file($filetmp2,$destinationfile2);
    if($count_display_pic==0){
      $query_config = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('DP','$destinationfile2',1)");  
    }
    else{
    $query_config = mysqli_query($conn,"UPDATE system_configuration SET Value='$destinationfile2' WHERE ConfigKey='DP'");     
    }
        
    }
    
      
    //support email
    if($count_support_email==0)
    {
    $query_config = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('SE','$support_email',1)");
    }
    else{
    $query_config = mysqli_query($conn,"UPDATE system_configuration SET Value='$support_email' WHERE ConfigKey='SE'");    
    }
    
     //phone number
    if($count_phone_no==0)
    {
    $query_config = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('PN','$phone_no',1)");
    }
    else{
    $query_config = mysqli_query($conn,"UPDATE system_configuration SET Value='$phone_no' WHERE ConfigKey='PN'");    
    }
    
    //email
    if($count_email==0)
    {
    $query_config = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('E','$email_admin',1)");
    }
    else{
    $query_config = mysqli_query($conn,"UPDATE system_configuration SET Value='$email_admin' WHERE ConfigKey='E'");    
    }
    
    //facebook url
    if($count_facebook==0)
    {
    $query_config = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('FB','$facebook_url',1)");
    }
    else{
    $query_config = mysqli_query($conn,"UPDATE system_configuration SET Value='$facebook_url' WHERE ConfigKey='FB'");    
    }
    
    //twitter url
    if($count_twitter==0)
    {
    $query_config = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('TW','$twitter_url',1)");
    }
    else{
    $query_config = mysqli_query($conn,"UPDATE system_configuration SET Value='$twitter_url' WHERE ConfigKey='TW'");    
    }
    
    //twitter url
    if($count_linkedin==0)
    {
    $query_config = mysqli_query($conn,"INSERT INTO system_configuration(ConfigKey,Value,IsActive) VALUES('LI','$linkedin_url',1)");
    }
    else{
    $query_config = mysqli_query($conn,"UPDATE system_configuration SET Value='$linkedin_url' WHERE ConfigKey='LI'");    
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
        <section id="config">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4>Manage System Configuration</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="email">Support emails address<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"  required name="supportemail" value="<?php echo $support_mail ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Support phone number<span class="required">*</span></label>
                            <input type="tel" class="form-control" id="phone" placeholder="enter phone number" value="<?php echo $phone_num ?>" name="phoneno">
                        </div>
                        <div class="form-group">
                            <label for="email">Emails Address(es) (for various events system will send notifications to these userd)<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" name="email" value="<?php echo $email_id ?>">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook URL</label>
                            <input type="text" class="form-control" id="facebook" placeholder="Enter facebook url" name="facebook" value="<?php echo $facebook ?>">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter URL</label>
                            <input type="text" class="form-control" id="twitter" placeholder="Enter twitter url" name="twitter" value="<?php echo $twitter ?>">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linkedin URL</label>
                            <input type="text" class="form-control" id="linkedin" placeholder="Enter linkedin url" name="linkedin" value="<?php echo $linkedin ?>">
                        </div>

                        <div class="form-group">
                            <label>Default image for notes(if seller do not upload)</label>
                            <div class="picture-2">
                                <label for="file-input">
                                    <img src="image/myprofile/upload-file.png">
                                </label>
                                <input id="file-input" type="file" name="note_upload" value="<?php echo $note_upload ?>">
                                <div id="note_name" style="margin-top:-35px"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Default Profile Picture(if seller do not upload)</label>
                            <div class="picture-2">
                                <label for="file-input-display">
                                    <img src="image/myprofile/upload-file.png">
                                </label>
                                <input id="file-input-display" type="file" name="profile_picture" value="<?php echo $display ?>">
                                <div id="display_name" style="margin-top:-35px"></div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="row btn-config-space">
                    <button class="btn btn-config" name="submit">SUBMIT</button>
                </div>

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
    <script>
        var input1 = document.getElementById("file-input");
        var infoArea1 = document.getElementById("note_name");
        input1.addEventListener("change", showProfileName1);

        function showProfileName1(event) {
            var input1 = event.srcElement;
            var fileName1 = input1.files[0].name;
            infoArea1.textContent = "File name: " + fileName1;
        }
        
         var input3 = document.getElementById("file-input-display");
        var infoArea3 = document.getElementById("display_name");
        input3.addEventListener("change", showProfileName3);

        function showProfileName3(event) {
            var input3 = event.srcElement;
            var fileName3 = input3.files[0].name;
            infoArea3.textContent = "File name: " + fileName3;
        }
    </script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>
