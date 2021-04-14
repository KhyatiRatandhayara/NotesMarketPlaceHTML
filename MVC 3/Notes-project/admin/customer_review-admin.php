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
   
   
   <?php 
include "connection.php";
session_start();
if(isset($_SESSION['email'])){
   $email =$_SESSION['email'];
   $query ="SELECT * FROM users WHERE Email='$email'" ;
   $result = mysqli_query($conn,$query);
   while($row=mysqli_fetch_assoc($result)){
   $user_id = $row['User_id'];
   }
}
       if(isset($_GET['id'])){
        $seller_id = $_GET['id'];   
       }
    
   
?>



   <div class="container review-box">
       <?php 
                         $query_review_fetch = mysqli_query($conn,"SELECT  sellernotesreviews.ReviewedByID,users.FirstName,users.LastName,users.User_id,userprofile.ProfilePicture FROM sellernotesreviews LEFT JOIN users ON sellernotesreviews.ReviewedByID=users.User_id LEFT JOIN userprofile ON sellernotesreviews.ReviewedByID=userprofile.User_id WHERE Seller_note_id='$seller_id' AND sellernotesreviews.IsActive=1");
                                while($row=mysqli_fetch_assoc($query_review_fetch)){
                                    $reviewby_id = $row['ReviewedByID'];
                                     $firstname= $row['FirstName'];
                                     $lastname = $row['LastName'];
                                     $review_user_id = $row['User_id'];
                                     $profile_pic = $row['ProfilePicture'];
                        ?>
       <div class="row box">
         <div style="display:flex">  
               <div class="col-md-2">
                   <?php 
                               $count_review_fetch =mysqli_num_rows($query_review_fetch);
                               if($count_review_fetch != 0){
                                
                   if($profile_pic != ""){ ?>
                   <img src="<?php echo $profile_pic ?>" class="img-fluid rounded-circle" alt="user">
                   <?php  }
                   else{  ?>
                   <img src="../Notes-front/image/Dashboard/user-img.png" class="img-fluid rounded-circle" alt="user">
                   <?php } ?>
               </div>
               <div class="col-md-9">
                 
                 
                   <?php    
                   echo "<h6>$firstname&nbsp;$lastname</h6>"; ?>
                  

                   <?php 
                                 $query_review_customer=mysqli_query($conn,"SELECT * FROM sellernotesreviews WHERE Seller_note_id=$seller_id AND ReviewedByID=$review_user_id AND IsActive=1");
                                 while($row=mysqli_fetch_assoc($query_review_customer)){
                                 $review_rate = $row['Rating'];
                                 $comment =$row['Comments'];     
                                 }
                                ?>
                   <div id="review_star<?php echo $review_user_id ?>" start="<?php echo  $review_rate ?>" style="margin-left:0; margin-top:-10px"> </div>
                      
                       <script>
                           $('#review_star<?php echo $review_user_id ?>').jsRapStar({
                               length: 5,
                               value: <?php echo $review_rate?>,
                               enabled: false
                           });
                       </script>
                    
              
               </div>
               <div class="col-md-1">
                  <?php 
                   echo "<a href='delete-review.php?noteid=$seller_id&reviewid=$reviewby_id'>";
                    echo "<img src='image/administrator/delete.png' alt='delete' style='transform:translateX(250px)'>";
                    echo "</a>";
                         ?>
               </div>
          
           </div>
           <div class="col-md-2"></div>
          
           <div class="col-md-10" style="margin-left:87px">
               <p><?php echo $comment ?></p>
           </div>
           
           <?php } 
                            else {
                                echo "No Reviews for this note";
                            }
                            ?>
       </div>

       <?php } ?>

   </div><br>

   <!--bootstrap-->
   <script src="javascript/bootstrap/bootstrap.min.js"></script>

   <!--script js-->
   <script src="javascript/script.js"></script>

   </html>
