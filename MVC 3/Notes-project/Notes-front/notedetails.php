<?php
include "connection.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail_sent = false;

if(isset($_SESSION['email'])){
   $email =$_SESSION['email'];
   $query ="SELECT * FROM users WHERE Email='$email'" ;
   $result = mysqli_query($conn,$query);
   while($row=mysqli_fetch_assoc($result)){
   $user_id = $row['User_id'];
    $user_firstname = $row['FirstName'];
    $user_lastname = $row['LastName'];   
   }
}

if(isset($_GET['id'])){
    $seller_id = $_GET['id'];
   
   }

    $query_fetch = "SELECT sellernote.Seller_id,sellernote.Title,sellernote.Description,sellernote.Course,sellernote.UniversityName,countries.CountryName,sellernote.CourseCode,sellernote.Professor,sellernote.NumberofPages,sellernote.PublishedDate,sellernote.DisplayPicture,sellernote.NotesPreview,sellernote.Ispaid,sellernote.SellingPrice,sellernote.Seller_id,note_categories.Name,users.FirstName,users.Email,users.LastName FROM sellernote LEFT JOIN countries ON sellernote.Country=countries.Country_id LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN users ON  sellernote.Seller_id=users.User_id WHERE Seller_Note_id=$seller_id";
    $result_fetch = mysqli_query($conn,$query_fetch);
    while($row=mysqli_fetch_assoc($result_fetch)){
        
        $title =$row['Title'];
        $description = $row['Description'];
        $institutename = $row['UniversityName'];
        $country_name_fetch=$row['CountryName'];
        $coursename = $row['Course'];
        $coursecode =$row['CourseCode'];
        $professor = $row['Professor'];
        $pages = $row['NumberofPages'];
        $publisheddate = $row['PublishedDate'];
        $display_picture =$row['DisplayPicture'];
        $note_preview = $row['NotesPreview'];
        $radio = $row['Ispaid'];
        $sellprice = $row['SellingPrice'];
        $category_name_fetch=$row['Name'];
        $seller = $row['Seller_id'];
        $seller_firstname=$row['FirstName'];
        $seller_email = $row['Email'];
        $seller_lastname = $row['LastName'];
    }
$query_downloaded = "SELECT * FROM downloads WHERE Seller_note_id=$seller_id AND Downloaders=$user_id";
$result_downloaded = mysqli_query($conn,$query_downloaded);
$count_downloaded= mysqli_num_rows($result_downloaded);

    $filepath ="";

    if(isset($_POST['freedownload'])){
     if($count_downloaded == 0 && $seller != $user_id){    
        
    $query_attach = "SELECT * FROM sellernotesattachments WHERE Seller_note_id=$seller_id";
    $result_attach = mysqli_query($conn,$query_attach);
    while($row=mysqli_fetch_assoc($result_attach)){
        
    $attatch_path = $row['FilePath'];
    $query_download = "INSERT INTO downloads(Seller_note_id,Seller,Downloaders,SellerAllowedDownload,	AttachmentPath,AttachmentDownloadedDate,AttachmentDownloaded,IsPaid,PurchasedPrice,NoteTitle,NoteCategory,CreatedDate,CreatedBy,ModifiedDate) VALUES ($seller_id,$seller,$user_id,1,'$attatch_path',NOW(),1,2,$sellprice,'$title','$category_name_fetch',NOW(),$user_id,NOW())"; 
    $result_download=mysqli_query($conn,$query_download);
    if(!$result_download){
        echo "failed";
    } 
     }    
    }
       $zipname = 'file.zip';
       $zip = new ZipArchive;
       $zip->open($zipname, ZipArchive::CREATE);
        
    $query_fetch = "SELECT FilePath FROM sellernotesattachments WHERE Seller_Note_id=$seller_id";
    $result_fetch = mysqli_query($conn,$query_fetch);
    while($row=mysqli_fetch_assoc($result_fetch)){
        $filepath = $row['FilePath'];
        $zip->addFile($filepath);
    }
    $zip->close();
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zipname);
    header('Content-Length: ' . filesize($zipname));
    readfile($zipname);  
   
    }
 

    if(isset($_POST['yes'])){

    if($count_downloaded == 0 && $seller != $user_id){
        
    $query_attach = "SELECT * FROM sellernotesattachments WHERE Seller_note_id=$seller_id";
    $result_attach = mysqli_query($conn,$query_attach);
    while($row=mysqli_fetch_assoc($result_attach)){
    $attatch_path = $row['FilePath'];
    $query_yes= "INSERT INTO downloads(Seller_note_id,Seller,Downloaders,SellerAllowedDownload, AttachmentPath,AttachmentDownloadedDate,AttachmentDownloaded,IsPaid,PurchasedPrice,NoteTitle,NoteCategory,CreatedDate,CreatedBy,ModifiedDate) VALUES ($seller_id,$seller,$user_id,0,'$attatch_path',NOW(),1,1,$sellprice,'$title','$category_name_fetch',NOW(),$user_id,NOW())";
    $result_yes=mysqli_query($conn,$query_yes);

    }

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

     $mail->setFrom($email,'NotesMarketPlace');

     $mail->addAddress($seller_email,$seller_firstname.''.$seller_lastname); //receiver
     $mail->addReplyTo($email,$user_firstname);

     $mail->IsHTML(true);
     $mail->Subject = "Send email using Gmail SMTP and PHPMailer";

     $mail->Body ="<b>Email from: $email
         Email sent to: $seller_email<br>
             Subject: $user_firstname $user_lastname wants to purchase your notes<br>

             Hello <b>$seller_firstname $seller_lastname</b>,<br>
             We would like to inform you that, wants to purchase your notes. Please see
             Buyer Requests tab and allow download access to Buyer if you have received the payment from
             him. <br>
             Regards, <br>
             Notes Marketplace</b>";


             $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.'; //Alternate body of email

             $mail->send();
             $mail_sent = true;

             }
             catch (Exception $e) {
             echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
             }
    }
         }
?>
<html>

<head>
    <meta charset="utf-8">
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

    <!--star css-->
    <link rel="stylesheet" href="css/jsRapStar.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--Responsive tabs css-->
    <link rel="stylesheet" href="css/responsive.css">

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--star js-->
    <script src="javascript/jsRapStar.js"></script>
</head>

<body>
    <!--note details-->
    <?php
    include "header.php";
    ?>
    <!--header end-->
    <section id="note-details">
        <div class="container line">

            <div class="row">
                <div class="col-md-12">
                    <h3>Notes Details</h3>
                </div>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-5 col-12">
                                <?php 
                            echo "<img src='$display_picture' alt='book' class='img-fluid' style='height: 300px'>";
                            ?>
                            </div>
                            <div class="col-md-7 col-12">
                                <h4><?php echo $title ?></h4>
                                <p><span><?php echo $category_name_fetch ?></span></p>
                                <p id="details"><?php echo $description?></p>
                                <?php
    
                            if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
                            if($radio == 2){
                               echo "<button class='btn btn-note-details1' name='freedownload'>DOWNLOAD</button>";
                            }
                            if($radio == 1){
                                 echo "<a type='submit' class='btn btn-note-details1' data-toggle='modal' data-target='#exampleModal2' name='download'>DOWNLOAD/$ $sellprice</a>";
                            }
                            }else
                            {
                            echo "<button type='submit' class='btn btn-note-details'>DOWNLOAD</button>";
                            }
                            ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row">

                            <div class="col-md-6 col-6">
                                <div class="user-note-details">
                                    <p>Institute:</p>
                                    <p>Country:</p>
                                    <p>Course Name:</p>
                                    <p>Course Code:</p>
                                    <p>Professor:</p>
                                    <p>Number Of Pages:</p>
                                    <p>Approved Date:</p>
                                    <p>Rating:</p><br>
                                </div>

                            </div>

                            <div class="col-md-6 col-6">
                                <div class="user-note-details-ans">
                                   <?php if(!empty($institutename) && $institutename=''){ ?>
                                    <p><?php echo $institutename ?></p>
                                    <?php } else{ ?>
                                    <p><?php echo "NULL" ?></p>
                                    <?php } ?>
                                    <?php if(!empty($country_name_fetch) && $country_name_fetch=''){ ?>
                                    <p><?php echo $country_name_fetch ?></p>
                                   <?php } 
                                    else{
                                    ?>
                                   <p><?php echo "NULL" ?></p>
                                   <?php } ?>
                                   
                                   <?php if(!empty($coursename) && $coursename=''){ ?>
                                    <p><?php echo $coursename ?></p>
                                    <?php } else{ ?>
                                       <p><?php echo "NULL" ?></p>
                                    <?php  } ?>
                                    
                                     <?php if(!empty($coursecode) && $coursecode=''){ ?>
                                    <p><?php echo $coursecode ?></p>
                                    <?php } else{ ?>
                                    <p><?php echo "NULL" ?></p>
                                    <?php } ?>
                                    
                                     <?php if(!empty($professor) && $professor=''){ ?>
                                    <p><?php echo $professor ?></p>
                                    <?php } else{ ?>
                                    <p><?php echo "NULL" ?></p>
                                    <?php } ?>
                                    
                                    <p><?php echo $pages ?></p>
                                    <p><?php echo $publisheddate ?></p>
                                    <?php 
                                 $query_avg=mysqli_query($conn,"SELECT AVG(Rating) FROM sellernotesreviews WHERE Seller_note_id=$seller_id AND IsActive=1");
                                 while($row=mysqli_fetch_assoc($query_avg)){
                                 $avg_rate = $row['AVG(Rating)'];
                                 }
                                    
                                $query_count = mysqli_query($conn,"SELECT * FROM sellernotesreviews WHERE Seller_note_id=$seller_id AND IsActive=1");
                                $total_count = mysqli_num_rows($query_count);
                                ?>
                                    <div class="row">

                                        <div id="rate<?php echo $seller_id?>" start="<?php echo $avg_rate ?>" style="margin-top:-12px"></div>
                                        <?php if($avg_rate !=0){ ?>
                                        <script>
                                            $('#rate<?php echo $seller_id ?>').jsRapStar({
                                                length: 5,
                                                value: '<?php echo $avg_rate ?>',
                                                enabled: false

                                            });
                                        </script>
                                        <?php  }
                            else{ ?>
                                        <script>
                                            $('#rate<?php echo $seller_id ?>').jsRapStar({
                                                length: 5,
                                                value: 0,
                                                enabled: false

                                            });
                                        </script>

                                        <?php } 
                                     if($total_count != 0){ ?>
                                        <p id="p-review"><?php echo $total_count ?> Reviews</p>
                                        <?php  } 
                       else{ ?>
                                        <p id="p-review">No Reviews</p>
                                        <?php  } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row red" style="margin-left:110px">
                                <?php 
                            $query_report = mysqli_query($conn,"SELECT * FROM sellernotereportedissues WHERE Seller_note_id= $seller_id");
                            $report_count = mysqli_num_rows($query_report);
                        
                           if($report_count != 0){ ?>
                                <h6 class="result-red"><?php echo  $report_count ?> Users have marked this note as
                                    inappropriate</h6>
                                <?php }
                           else{  ?>
                                <h6 class="result-red">No Users have marked this note as
                                    inappropriate</h6>
                                <?php }  ?>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>

    </section>


    <section id="notes-preview">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">

                    <h5>Notes Preview</h5>
                    <!-- responsive iframe -->
                    <!-- ============== -->

                    <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                        <div class="responsive-wrapper 
     responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                            <?php 
                            echo "<iframe src='$note_preview'>"; 
                            ?>
                            <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                                    An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file<?php echo "<a href='$note_preview'>with this link.</a>"; ?></p>
                            <?php echo "</iframe>"; ?>
                        </div>
                    </div>

                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <h5>Customer Reviews</h5>
                    <iframe src="customer_review.php?id=<?php echo $seller_id ?>" width="100%" height="400">
                    </iframe>
                </div>

            </div>

        </div>
    </section>
<?php
$query_config = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='PN'"); 
while($row=mysqli_fetch_assoc($query_config)){
    $admin_phone_no = $row['Value'];
}                            
?>
    <form method="post">

        <!-- Modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="modal-body">
                        <div class="tnx">

                            <img src="image/Notesdetails/SUCCESS.png" alt="success">
                            <h4>Thank you for Purchasing!</h4>
                            <p><b>Dear  <?php echo $user_firstname?> ,</b></p>
                            <p>As this is paid notes-you need to pay to seller <b><?php echo $seller_firstname.''.$seller_lastname ?></b> offline.We will send him an email that you want to download this note.He may contact you further for payment process completion.</p>
                            <p>In case you have urgancy, <br>Please Contact us on +91<?php echo $admin_phone_no ?>.</p>
                            <p>Once he receives the payment and acknowledge us-selected notes you can see over my download tab for download.</p>
                            <p>Have a good day.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        <p>“Are you sure you want to download this Paid note. Please confirm.”</p>
                        <button class="btn yes" id="yesid" style="background-color:#6255a5; color:#fff" name="yes">Yes</button>
                        <button class="btn" data-dismiss="modal" style="background-color:#6255a5; color:#fff">No</button>

                    </div>
                </div>
            </div>
        </div>
    </form>



    <!--footer-->

    <?php
    include "footer.php";
    ?>
    


    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!--script js-->
    <script src="javascript/script.js"></script>
    
    <script>
        <?php
        if($mail_sent) { ?>
       
        $("#exampleModal2").modal('hide');
         $("#exampleModal").modal('show');
        <?php } ?>
    </script>
   
</body>

</html>
