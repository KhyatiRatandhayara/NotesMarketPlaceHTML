<?php 
include "connection.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_SESSION['email'])){
 $email =$_SESSION['email'];
    $query ="SELECT * FROM users WHERE Email='$email'";
 $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $user_id = $row['User_id'];
        $user_firstname = $row['FirstName'];
        $user_lastname = $row['LastName'];  
    }
}
if(isset($_POST['search'])){
    $search_text = $_POST['search_text'];
    
     $query_fetch = "SELECT downloads.Seller,downloads.NoteTitle,downloads.NoteCategory,reference_data.Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate,downloads.Seller_note_id,users.Email,users.FirstName FROM downloads LEFT JOIN reference_data ON downloads.IsPaid = reference_data.Refdata_id LEFT JOIN users ON downloads.Seller=users.User_id WHERE (downloads.NoteTitle LIKE '%$search_text%' OR downloads.NoteCategory LIKE '%$search_text%' OR downloads.PurchasedPrice LIKE '%$search_text%' OR reference_data.Value LIKE '%$search_text%' OR downloads.AttachmentDownloadedDate LIKE '%$search_text%') AND Downloaders=$user_id AND SellerAllowedDownload=1";
     $result_fetch = mysqli_query($conn,$query_fetch);
}
else{
    
 $query_fetch = "SELECT downloads.Seller,downloads.NoteTitle,downloads.NoteCategory,reference_data.Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate,downloads.Seller_note_id,users.Email,users.FirstName FROM downloads LEFT JOIN reference_data ON downloads.IsPaid = reference_data.Refdata_id LEFT JOIN users ON downloads.Seller=users.User_id WHERE Downloaders=$user_id AND SellerAllowedDownload=1";
 $result_fetch = mysqli_query($conn,$query_fetch);
    
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
     $zipname = 'file.zip';
     $zip = new ZipArchive;
     $zip->open($zipname, ZipArchive::CREATE);
    
    $query_attach = "SELECT * FROM sellernotesattachments WHERE Seller_note_id=$id";
    $result_attach = mysqli_query($conn,$query_attach);
    while($row=mysqli_fetch_assoc($result_attach)){
    $attatch_path = $row['FilePath'];
    $zip->addFile($attatch_path);
    }
     $zip->close();
     header('Content-Type: application/zip');
     header('Content-disposition: attachment; filename='.$zipname);
     header('Content-Length: ' . filesize($zipname));
     readfile($zipname);  
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
    
   <!--datatable css-->
   <link rel="stylesheet" href="css/jquery.dataTables.css">
   
   <!--star css-->
   <link rel="stylesheet" href="css/jsRapStar.css">
   
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--Responsive tabs css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
     <?php
    include "header.php";
    ?>
    <!--header end-->
    <section id="my-downloads">
        <div class="container dash-space">
             
            
            <div class="row">
                <div class="">
                    <table class="table common-table-width-3 text-center mydownload-table" id="myTable">
                    <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                               <h4>My Downloads</h4>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                              <form method="post">
                               <button type="submit" class="btn" name="search">Search</button>
                                  <lable><input type="search" placeholder=' &#xf002  Search...' aria-controls="myTable" name="search_text" /></lable>
                               </form>
                           </div>
                       </div>
                     
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">NOTE TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">BUYER</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DOWNLOADED DATE/TIME</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $i=1;
                            while($row=mysqli_fetch_assoc($result_fetch)){
                                $title = $row['NoteTitle'];
                                $category = $row['NoteCategory'];
                                $ispaid = $row['Value'];
                                $price = $row['PurchasedPrice'];
                                $downloaded_date = $row['AttachmentDownloadedDate'];
                                $seller_note_id = $row['Seller_note_id'];
                                $seller = $row['Seller'];
                                $seller_email =$row['Email'];
                                $seller_name = $row['FirstName'];
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <?php echo"<td><a href='notedetails.php?id=$seller_note_id' style='text-decoration:none; color:#6255a5'> $title</a></td>"; ?>
                                <td><?php echo $category ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $ispaid ?></td>
                                <td><?php echo $price ?></td>
                                <td><?php echo $downloaded_date ?></td>
                                <td>
                                    <div class="join-image">
                                        <a href='notedetails.php?id=<?php echo $seller_note_id ?>' style='text-decoration:none; color:#6255a5'><img src="image/Dashboard/eye.png" alt="eye" class="table-img-1"></a>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/Dashboard/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <?php 

                                                echo "<a class='dropdown-item' href='mydownload.php?id=$seller_note_id'>Download Notes</a>";
                                                ?>
                                                <a role="button" data-id="<?php echo $seller_note_id ?>" class="btn add-reviews-popup" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                
                                                <a class="dropdown-item inappropriate-popup" data-toggle="modal" data-id="<?php echo $seller_note_id ?>" data-titletext-id="<?php echo $title ?>" data-target="#exampleModal1" >Report as Inappropriate</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             <?php
                            $i++;
                             } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php
    if(isset($_POST['reportbtn'])){
    $note_id = $_POST['title_note'];
    $remark = $_POST['remark'];
   
    $query_report = "INSERT INTO sellernotereportedissues(Seller_note_id,ReportedByID,AgainstDownloadID,Remarks,ModifiedDate) VALUES($note_id,$user_id ,$seller,'$remark',NOW())";
    $result_report = mysqli_query($conn,$query_report);
    if(!$result_report){
        die(mysqli_error($conn));
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

     $mail->addAddress($seller_email,$seller_name); //receiver
     $mail->addReplyTo($email, $user_firstname.''.$user_lastname);

     $mail->IsHTML(true);
     $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
     $mail->Body ="<b>Email from: $email<br>
     Email sent to: $seller_email<br>
     Subject:$user_firstname $user_lastname Reported an issue for $title<br>
     Body:
    
             Hello Admins,We want to inform you that, $user_firstname $user_lastname Reported an issue for ’s Note with
             title $title. Please look at the notes and take required actions.<br>
             Regards,<br>
             Notes Marketplace</b>";
             $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.'; //Alternate body of email

             $mail->send();
             $mail_sent = true;

             }
             catch (Exception $e) {
             echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
             }
    
}
    if(isset($_POST['submit'])){
    $value = $_POST['value'];
    $comment = $_POST['comment'];
    $noteid = $_POST['noteid'];
    
    $query_against_seller_id = mysqli_query($conn,"SELECT * FROM sellernote WHERE Seller_Note_id=$noteid");
    while($row=mysqli_fetch_assoc($query_against_seller_id)){
        $against_seller_id = $row['Seller_id'];
    }
    $query_review_check = mysqli_query($conn,"SELECT * FROM sellernotesreviews WHERE Seller_note_id=$noteid AND ReviewedByID=$user_id");
    $count_review_check = mysqli_num_rows($query_review_check);
    if($count_review_check == 0){
     $query_review = "INSERT INTO sellernotesreviews (Seller_note_id, ReviewedByID, AgainstDownloadsID,Rating, Comments, CreatedDate, CreatedBy, ModifiedDate, ModifiedBy, IsActive) VALUES ($noteid, $user_id, $against_seller_id, $value, '$comment', NOW(), '1', NOW(), '1', '1')";
    $result_review = mysqli_query($conn,$query_review);
    
    }
    
}

    ?>

    <!-- Modal -->
     <form method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add-review-popup">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>


                <div class="modal-body common-space">
                <div id="star"></div>
                <input type="hidden" name="value" id="rating_value" value="">
                <input type="hidden" id="noteid" name="noteid">
                </div>
               
                <label style="margin-top: 80px">Comment <span class="required">*</span></label>
                <input type="text" name="comment">
                <button type="submit" class="btn btn-primary btn-add-review" name="submit">SUBMIT</button>
                
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content add-review-popup">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                 <div class="modal-body common-space">
                    <input type="text" class="form-control" id="title_text" value="" disabled style="color:#6255a5">

                    <input type="hidden" id="title_note_id" name="title_note" value="">
                    <label style="margin-top: 20px">Remark <span class="required">*</span></label>
                    <textarea name="remark" id="report" cols="55" rows="4" style="margin-bottom: 10px"></textarea>
                    <button type="submit" class="btn btn-primary" style="background-color:#6255a5; color:#fff" name="reportbtn">Report an issue</button>
                    <button class="btn btn-primary" data-dismiss="modal" style="background-color:#6255a5; color:#fff">No</button>

                </div>
            </div>
        </div>
    </div>
 </form>
    <?php
    include "footer.php";
    ?>



    <!--popper js-->
    <script src="javascript/popper.min.js"></script>

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    
     <!--star js-->
    <script src="javascript/jsRapStar.js"></script>
     <script>
         $('#star').jsRapStar({
             step: false,
             value: 0,
             length: 5,
             starHeight: 64,
             colorFront: '##f0c420 ',
             onClick: function(score) {
             this.StarF.css({
             color: '#f0c420'
             });
             $('#rating_value').val(score);
             },
             onMousemove: function(score) {
             $(this).attr('title', 'Rate ' + score);
             }
         });
     </script>
    <!--datatable js-->
    <script src="javascript/datatables.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#myTable").DataTable();
    });
        
   $(document).on('click', '.add-reviews-popup', function() {
            $('#noteid').val($(this).data('id'));
        });
          
    $(document).on('click', '.inappropriate-popup', function() {
        
        $('#title_note_id').val($(this).data('id'));
         $('#title_text').val($(this).data('titletext-id'));
    });      
    </script>
    
    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>