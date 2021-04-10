<?php 
include "connection.php";
session_start();
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_SESSION['email'])){
 $email=$_SESSION['email'];
    $query_contact="select * from users where Email='$email'";
    $result_contact=mysqli_query($conn,$query_contact);
    while($row=mysqli_fetch_assoc($result_contact)){
        $admin_user_id=$row['User_id'];
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
    
     <!--datatable css-->
     <link rel="stylesheet" href="css/jquery.dataTables.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    
    
    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    <script type="text/javascript">
    function dashboardsearch(){
        var dropdownmonth = $("#dropdownmonth").val();
        var mydash = $("#mydash").val();
    $.ajax({
        type : "GET",
        url : "AJAX/dashboard-admin-ajax.php",
        data : 
       {
           dropdownmonth_data : dropdownmonth,
           mydash_data : mydash
       },
      success: function (data) {
            $("#dash_table_display").html(data);
            }
    });    
    }
        </script>
        <script>
    $(document).ready(function(){
          dashboardsearch();  
    });      
    </script>
</head>

<body>
   <?php 
    include "admin-header.php";
    ?>
    <div class="bottom-footer">
        <section id="dashboard">
            <div class="container dash-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 common-space">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                <div class="row box-margin">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 dashboard-border">
                      <a href="notes-under-review.php" style='text-decoration:none; color:#6255a5'>
                       <?php
                        $query_review = mysqli_query($conn,"SELECT * FROM sellernote WHERE (Status=5 OR Status=4)");
                        
                        ?>
                        <h5 class="text-center"><?php echo mysqli_num_rows($query_review) ?></h5>
                        <p class="text-center">Number of Notes in Review for Publish</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 dashboard-border">
                      <a href="downloaded-notes.php" style='text-decoration:none; color:#6255a5'>
                       <?php
                        $query_download = mysqli_query($conn,"SELECT * FROM downloads WHERE AttachmentDownloaded=1 AND AttachmentDownloadedDate > now() - INTERVAL 7 day");
                         
                        ?>
                        <h5 class="text-center"><?php echo mysqli_num_rows($query_download) ?></h5>
                        <p class="text-center">Number of New Notes Downloaded(Last 7 days)</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 dashboard-border-2">
                     <a href="member-admin.php" style='text-decoration:none; color:#6255a5'>
                       <?php
                        $query_new_registration = mysqli_query($conn,"SELECT * FROM users WHERE UserRole_id=1 AND CreatedDate > now() - INTERVAL 7 day");
                        ?>
                        <h5 class="text-center"><?php echo mysqli_num_rows($query_new_registration) ?></h5>
                        <p class="text-center">Number of New Registrations(Last 7 days)</p>
                        </a> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-12 col-12  common-space">
                        <h3>Published Notes</h3>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12 col-12 dash-public-space common-space">

                        <div class="form-inline pull-right pub-left">
                            
                            <input type="search" placeholder=' &#xF002;  Search' class="mr-2" aria-controls="myTable" id="mydash" name="search_text" />
                            <button class="btn btn-dashboard mr-2" onclick="dashboardsearch()" type="submit" name="search">Search</button>
                          
                           
                           
                            <select class="arrow-down mr-2 margin-select" name="month" id="dropdownmonth" onchange="dashboardsearch()">

                            <?php 
                                for ($i = 0; $i <= 5; $i++) { // Store the months in an array 
                                    $months[]=date("m-Y", strtotime( date( 'Y-m-01' )." -$i months")); 
                                    echo "<option value='$months[$i]'>$months[$i]</option>";
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                     <div id="dash_table_display"></div>
                </div>
            </div>
        </section>
    </div>
    <?php
$query_fetch = "SELECT sellernote.Seller_Note_id,sellernote.Seller_id,sellernote.Title,users.FirstName,users.LastName,users.Email FROM sellernote LEFT JOIN users ON sellernote.Seller_id=users.User_id WHERE sellernote.Status=11 AND sellernote.IsActive=1";
$result_fetch = mysqli_query($conn,$query_fetch);
while($row=mysqli_fetch_assoc($result_fetch)){
    $title = $row['Title'];
    $seller_email = $row['Email'];
    $seller_fname = $row['FirstName'];
    $seller_lname = $row['LastName'];
}
    
if(isset($_POST['unpublishbtn'])){
    
    $remark = $_POST['remark'];
    $noteid = $_POST['noteid'];
    $unpublish_query = mysqli_query($conn,"UPDATE sellernote SET Status=8,ActionedBy=$admin_user_id,AdminRemarks='$remark' WHERE Seller_Note_id=$noteid");
    
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
    
    $mail->setFrom($config_email, 'NoteMarketPlace');

    $mail->addAddress($seller_email, $seller_fname."".$seller_lname); //receiver 
    $mail->addReplyTo($config_email, 'admin');
    
    $mail->IsHTML(true);  
    $mail->Subject = "Send email using Gmail SMTP and PHPMailer";  
    
     $mail->Body ="<b>Email from: $config_email<br>
Email sent to: $seller_email<br>
Subject: Sorry! We need to remove your notes from our portal. <br>

Hello $seller_fname $seller_lname , <br>
We want to inform you that, your note $title has been removed from the portal.<br>
Please find our remarks as below -
$remark<br>
Regards, <br>
Notes Marketplace</b>";
   
    
       $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
 
    $mail->send();
   
}
catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
    
    }
?>            
    <!--footer-->
    <?php include "admin-footer.php";
    ?>
    <!--footer end-->
    
    <!--popper js-->
    <script src="javascript/popper.min.js"></script>
    
    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>