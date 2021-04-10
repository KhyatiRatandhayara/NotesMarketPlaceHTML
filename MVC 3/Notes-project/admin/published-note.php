<?php
include "connection.php";

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if(isset($_SESSION['email'])){
 $email=$_SESSION['email'];
    $query_contact="select * from users where Email='$email'";
    $result_contact=mysqli_query($conn,$query_contact);
    while($row=mysqli_fetch_assoc($result_contact)){
        $admin_user_id=$row['User_id'];
        $admin_fname = $row['FirstName'];
        $admin_lname = $row['LastName'];
    }
}    

if(isset($_GET['userid'])){
   $userid = $_GET['userid']; 
}
else{
   $userid = ''; 
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
        function publishednote() {
            var search_published = $("#search_published").val();
            var seller = $("#seller").val();
            var getid = '<?php echo $userid ?>';

            $.ajax({
                type: "GET",
                url: "AJAX/published-note-ajax.php",
                data: {
                    search_published_data: search_published,
                    seller_data: seller,
                    member_data: getid
                },
                success: function(data) {
                    $("#published_table_display").html(data);
                }

            });
        }
        $(document).ready(function() {
            publishednote();
        });
    </script>
</head>

<body>
    <?php 
    include "admin-header.php";
    ?>
    <div class="bottom-footer">
        <section id="published-note">
            <div class="container dash-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 common-space">
                        <h4>Published Notes</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 common-space">

                        <div class="form-group">
                            <label for="seller">Seller</label>
                            <select id="seller" class="form-control arrow-down" onchange="publishednote()">
                                <option selected disabled>Select seller</option>
                                <?php 
                                $query_seller_name = "SELECT DISTINCT sellernote.Seller_id,users.FirstName,users.LastName FROM sellernote LEFT JOIN users ON sellernote.Seller_id=users.User_id WHERE sellernote.Status=11 AND sellernote.IsActive=1";
                                $result_seller_name = mysqli_query($conn,$query_seller_name);
                                
                                while($row=mysqli_fetch_assoc($result_seller_name)){
                                    $seller_fetch_fname = $row['FirstName'];
                                    $seller_fetch_lname = $row['LastName'];
                                    $seller_id = $row['Seller_id'];
                                    echo "<option value='$seller_id'>$seller_fetch_fname&nbsp;$seller_fetch_lname</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-6 common-space"><br>
                        <button type="submit" class="btn search-published" onclick="publishednote()">Search</button>
                        <input type="search" placeholder=' &#xf002   Search...' id="search_published" />
                    </div>
                </div>
                <div id="published_table_display"></div>
            </div>
        </section>
    </div>

    <?php
if(isset($_POST['unpublishbtn'])){
   $noteid_unpublish = $_POST['noteid_unpublish']; 
   $remark = $_POST['remarks'];
    $query_unpublish = mysqli_query($conn,"UPDATE sellernote SET Status=8,ActionedBy=$admin_user_id,AdminRemarks='$remark' WHERE Seller_Note_id=$noteid_unpublish");
    
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

    $mail->addAddress($seller_email, $seller_fetch_fname); //receiver 
    $mail->addReplyTo($config_email, 'admin');
    
    $mail->IsHTML(true);  
    $mail->Subject = "Send email using Gmail SMTP and PHPMailer";  
    
     $mail->Body ="<b>Email from: $config_email<br>
Email sent to: $seller_email<br>
Subject: Sorry! We need to remove your notes from our portal. <br>

Hello $seller_fetch_fname $seller_fetch_lname , <br>
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

    <!--datatable js -->
    <script src="javascript/datatables.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>
