<?php
include "connection.php";
session_start();

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
else{
    header("location:login-admin.php");
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
    include "admin-header.php";
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
                               echo "<button class='btn btn-note-details1' name='freedownload'>DOWNLOAD</button>";
                           
                            }else
                            {
                            echo "<button type='submit' href='login-admin.php'>DOWNLOAD</button>";
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
                                    <p><?php echo $institutename?></p>
                                    <p><?php echo $country_name_fetch ?></p>
                                    <p><?php echo $coursename ?></p>
                                    <p><?php echo $coursecode ?></p>
                                    <p><?php echo $professor ?></p>
                                    <p><?php echo $pages ?></p>
                                    <p><?php echo $publisheddate ?></p>
                                    <?php 
                                 $query_avg=mysqli_query($conn,"SELECT AVG(Rating) FROM sellernotesreviews WHERE Seller_note_id=$seller_id");
                                 while($row=mysqli_fetch_assoc($query_avg)){
                                 $avg_rate = $row['AVG(Rating)'];
                                 }
                                    
                                $query_count = mysqli_query($conn,"SELECT * FROM sellernotesreviews WHERE Seller_note_id=$seller_id");
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
                    <iframe src="customer_review-admin.php?id=<?php echo $seller_id ?>" width="100%" height="400">
                    </iframe>
                </div>

            </div>

        </div>
    </section>

    <!--footer-->

    <?php
    include "admin-footer.php";
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