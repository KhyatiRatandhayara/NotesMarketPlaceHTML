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
    $search_text=$_POST['search_text'];
    
      $query_buyer="SELECT downloads.NoteTitle,downloads.NoteCategory,reference_data.Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate,downloads.Seller_note_id,downloads.Seller,downloads.Downloaders,users.Email,users.FirstName,userprofile.PhoneNumber,userprofile.Phonenumber_Countrycode,countries.CountryCode FROM downloads LEFT JOIN reference_data ON downloads.IsPaid=reference_data.Refdata_id LEFT JOIN users ON downloads.Downloaders=users.User_id LEFT JOIN userprofile ON downloads.Downloaders=userprofile.User_id  LEFT JOIN countries ON userprofile.Phonenumber_Countrycode=countries.Country_id WHERE downloads.SellerAllowedDownload=0 AND downloads.Seller=$user_id AND downloads.IsPaid=1 AND (downloads.NoteTitle LIKE '%$search_text%' OR downloads.NoteCategory LIKE '%$search_text%' OR downloads.PurchasedPrice LIKE '%$search_text%')";
     $result_buyer=mysqli_query($conn,$query_buyer);
    if(!$result_buyer){
    echo "fail";
    }
}
else{
   
      $query_buyer="SELECT downloads.NoteTitle,downloads.NoteCategory,reference_data.Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate,downloads.Seller_note_id,downloads.Seller,downloads.Downloaders,users.Email,users.FirstName,userprofile.PhoneNumber,userprofile.Phonenumber_Countrycode,countries.CountryCode FROM downloads LEFT JOIN reference_data ON downloads.IsPaid=reference_data.Refdata_id LEFT JOIN users ON downloads.Downloaders=users.User_id LEFT JOIN userprofile ON downloads.Downloaders=userprofile.User_id  LEFT JOIN countries ON userprofile.Phonenumber_Countrycode=countries.Country_id WHERE downloads.SellerAllowedDownload=0 AND downloads.Seller=$user_id AND downloads.IsPaid=1";
      $result_buyer=mysqli_query($conn,$query_buyer);
    if(!$result_buyer){
        die(mysqli_error($conn));
    }

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
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

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
    <section id="buyer-request">
        <div class="container dash-space">
          
            
                <div>
                    <table id="myTable" class="table common-table-width-2 text-center">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <h4>Buyer Requests</h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                   <form method="post">
                                    <button type="submit" class="btn" name="search">Search</button>
                                    <label><input type="search" class="form-control" aria-controls="myTable" placeholder=' &#xf002   Search...' name="search_text" /></label>
                                    </form>
                                </div>
                            </div>
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">NOTE TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">BUYER</th>
                                <th scope="col">PHONE NO.</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DOWNLOADED DATE/TIME</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                         $i=1; 
                            while($row=mysqli_fetch_assoc($result_buyer)){
                               
                                $title=$row['NoteTitle'];
                                $category=$row['NoteCategory'];
                                $type=$row['Value'];
                                $price=$row['PurchasedPrice'];
                                $downloaded_date=$row['AttachmentDownloadedDate'];
                                $note_id = $row['Seller_note_id'];
                                $downloader = $row['Downloaders'];
                                $name = $row['FirstName'];
                                $phone_no = $row['PhoneNumber'];
                                $phone_code = $row['CountryCode'];   
                                $email_id = $row['Email'];
                            
                             
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>$title</td>";
                                echo "<td>$category</td>";
                                echo "<td>$email_id</td>";
                                 echo "<td>+$phone_code&nbsp;$phone_no</td>";
                                echo "<td>$type</td>";
                                echo "<td>$price</td>";
                                echo "<td>$downloaded_date</td>";
                                echo "
                                <td>
                                    <div class='join-image'>
                                        <a  href='notedetails.php?id=$note_id'><img src='image/Dashboard/eye.png' alt='eye' class='table-img-1'></a>
                                        <div class='dropdown dropleft'>
                                            <a class='btn' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <img src='image/Dashboard/dots.png' alt='dots'>
                                            </a>
                                            <div class='dropdown-menu dots-shadow' aria-labelledby='dropdownMenuLink'>
                                                <form method='post'>
                                                <a role='button' class='dropdown-item' name='allow' type='submit' href='buyerrequest.php?id=$note_id'>Allow Download</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>";

                                echo "</tr>";
                                $i++;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
           
            
        </div>
    </section>
    <?php 
    if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $query_update = "UPDATE downloads SET SellerAllowedDownload=1 WHERE Seller_note_id=$id";
    $result_update = mysqli_query($conn,$query_update);
        
    $query_buyer_email = mysqli_query($conn,"SELECT downloads.Downloaders,users.Email,users.FirstName,users.LastName FROM downloads LEFT JOIN users ON downloads.Downloaders=users.User_id WHERE Seller_note_id=$id");
        while($row=mysqli_fetch_assoc($query_buyer_email)){
            $buyer_email = $row['Email'];
            $buyer_fname = $row['FirstName'];
            $buyer_lname = $row['LastName'];
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

     $mail->addAddress($buyer_email,$buyer_fname.''.$buyer_lname); //receiver
     $mail->addReplyTo($email,'sender');
         

     $mail->IsHTML(true);
     $mail->Subject = "Send email using Gmail SMTP and PHPMailer";

     $mail->Body ="<b>Email from:$email<br>
    Email sent to: $buyer_email<br>
        Subject: sender Allows you to download a note<br>
            Body:
            Hello $buyer_fname $buyer_lname<br>,
                We would like to inform you that, Allows you to download a note.
                    Please login and see My Download tabs to download particular note.
                    Regards,
                    Notes Marketplace</b>";


             $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.'; //Alternate body of email

             $mail->send();

             }
             catch (Exception $e) {
             echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
             }   
    
    
}


    ?>

   <?php
    include "footer.php";
    ?>
    
    <!--popper js-->
    <script src="javascript/popper.min.js"></script>

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    
    <!--datatable js-->
     <script src="javascript/datatables.min.js"></script>
     
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    
    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
    
    <script src="javascript/script.js"></script>
    
</body>

</html>
