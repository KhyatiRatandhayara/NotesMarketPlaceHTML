<?php
include "connection.php";
session_start();

if(isset($_SESSION['email'])){
 $email =$_SESSION['email'];
    $query ="SELECT * FROM users WHERE Email='$email'";
 $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $user_id = $row['User_id'];
    }
}
 
if(isset($_POST['search1'])){
    
    $search_text_1=$_POST['search_text_1'];
    $query_inprogress = "SELECT sellernote.Title,sellernote.PublishedDate,note_categories.Name,reference_data.Value,sellernote.Seller_Note_id FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Status=reference_data.Refdata_id  WHERE (sellernote.Title LIKE '%$search_text_1%' OR note_categories.Name LIKE '%$search_text_1%' OR reference_data.Value LIKE '%$search_text_1%' OR sellernote.PublishedDate LIKE '%$search_text_1%') AND reference_data.Refdata_id IN (3,4,5) AND sellernote.IsActive=1 AND Seller_id=$user_id";
    
     $result_inprogress = mysqli_query($conn,$query_inprogress);
}
else{
    
    
    $query_inprogress = "SELECT sellernote.Title,sellernote.PublishedDate,note_categories.Name,reference_data.Value,sellernote.Seller_Note_id FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Status=reference_data.Refdata_id WHERE reference_data.Refdata_id IN (3,4,5) AND sellernote.IsActive=1 AND Seller_id=$user_id";

     $result_inprogress = mysqli_query($conn,$query_inprogress);
}
 
                           
if(isset($_POST['search2'])){
     $search_text_2=$_POST['search_text_2'];
   
    $query_published ="SELECT sellernote.Seller_Note_id,sellernote.PublishedDate,sellernote.Title,note_categories.Name,reference_data.Value,sellernote.SellingPrice FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Ispaid=reference_data.Refdata_id WHERE (sellernote.Title LIKE '%$search_text_2%' OR note_categories.Name LIKE '%$search_text_2%' OR sellernote.PublishedDate LIKE '%$search_text_2%' OR reference_data.Value LIKE '%$search_text_2%' OR sellernote.SellingPrice LIKE '%$search_text_2%') AND sellernote.Status=11 AND Seller_id=$user_id";
    
    $result_published = mysqli_query($conn, $query_published);
}
else{
      $query_published ="SELECT  sellernote.Seller_Note_id,sellernote.PublishedDate,sellernote.Title,note_categories.Name,reference_data.Value,sellernote.SellingPrice FROM sellernote JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Ispaid=reference_data.Refdata_id WHERE sellernote.Status=11 AND Seller_id=$user_id";
    
      $result_published = mysqli_query($conn, $query_published);
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

    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 common-space">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 common-space">
                   <a href="addnote.php">
                    <button type="button" class="btn btn-addnote">ADD NOTE</button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 earning-border">
                            <img src="image/Dashboard/earning-icon.svg" alt="earning">
                            <h5>My Earning</h5>
                        </div>

                        <div class="col-lg-4  col-md-4 col-sm-4 text-center dashboard-border-1">
                           <?php 
                            $query_sold = "SELECT DISTINCT Seller_note_id FROM downloads WHERE Seller=$user_id AND SellerAllowedDownload=1 AND IsPaid=1";
                            $result_sold = mysqli_query($conn,$query_sold);
                            $count_sold = mysqli_num_rows($result_sold);
                            ?>
                            <h5><?php echo $count_sold ?></h5>
                            <p>Number Of Notes Sold</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 text-center dashboard-border-2">
                           <?php 
                            $query_earned="SELECT SUM(SellingPrice) FROM sellernote WHERE Seller_id=$user_id AND IsPaid=1 AND Status=11";
                            $result_earned = mysqli_query($conn,$query_earned); 
                                while($row=mysqli_fetch_assoc($result_earned)){
                                    $sum_earned = $row['SUM(SellingPrice)'];
                                }
                            ?>
                            <h5>$<?php echo $sum_earned ?></h5>
                            <p>Money Earned</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4  three-box text-center">
                           <?php 
                            $query_download = "SELECT * FROM downloads WHERE Downloaders=$user_id AND SellerAllowedDownload=1";
                            $result_download = mysqli_query($conn,$query_download);
                            $count_download = mysqli_num_rows($result_download);    
                            ?>
                            <h5><?php echo $count_download ?></h5>
                            
                            <p>My Downloads</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 three-box text-center">
                          <?php 
                            $query_rejected = "SELECT * FROM sellernote WHERE Status=7 AND Seller_id=$user_id";
                            $result_rejected = mysqli_query($conn,$query_rejected);   
                            $count_rejected = mysqli_num_rows($result_rejected);   
                            ?>
                           
                            <h5><?php echo $count_rejected ?></h5>
                            <p>My Rejected Notes</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 three-box text-center">
                           <?php 
                            $query_buyer = "SELECT * FROM downloads WHERE SellerAllowedDownload=0 AND Seller=$user_id AND IsPaid=1";
                            $result_buyer = mysqli_query($conn,$query_buyer);
                            $count_buyer = mysqli_num_rows($result_buyer);   
                            ?>
                            <h5><?php echo $count_buyer ?></h5>
                            <p>Buyer Requests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dashboard-details">
        <div class="container dash-space">
            <div class="row">
                <div class="table-responsive">
                    <table class="table border dash-radius common-table-width-2 text-center" id="inprogress_id">
                       <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                               <h5>In Progress Note</h5>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                               <form method="post">
                               <button type="submit" class="btn" name="search1">Search</button>
                                   <label><input aria-controls="inprogress_id" type="search" placeholder=' &#xf002   Search...' / name="search_text_1"></label>
                               </form>
                           </div>
                       </div>
                        <thead>
                            <tr>
                                <th scope="col">ADDED NOTE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row=mysqli_fetch_assoc($result_inprogress)){
                                $date=$row['PublishedDate'];
                                $title = $row['Title'];
                                $category= $row['Name']; 
                                $status = $row['Value']; 
                                $seller_note_id=$row['Seller_Note_id'];

                                  echo "<tr>";
                                  echo "<td>$date</td>";
                                  echo "<td><a href='notedetails.php?id=$seller_note_id' style='text-decoration:none; color:#6255a5'>$title</a></td>";
                                  echo "<td> $category</td>";
                                  echo "<td>$status</td>";
                                if($status == 'Draft'){
                                  echo "<td>
                                  <a href='addnote.php?id=$seller_note_id'>
                                    <img src='image/Dashboard/edit.png' alt='edit'>
                                    </a>
                                    <a href='deletebutton.php?id=$seller_note_id'>
                                    <img src='image/Dashboard/delete.png' alt='delete'>
                                    </a>
                                </td>";
                                    }
                                else {
                                    echo "<td><a href='notedetails.php?id=$seller_note_id'><img src='image/Dashboard/eye.png' alt='view'></a></td>";
                                }
                                 echo "</tr>";
                            }
                            ?>
                            

                        </tbody>
                    </table>
                </div>
            </div>
          
            
        </div>
    </section>
    <section class="dashboard-details">
        <div class="container dash-space">
            <div class="row">
                <div class="table-responsive">
                    <table class="table border common-table-width-2 text-center" id="published_id">
                       <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                               <h5>Published Note</h5>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                              <form method="post">
                               <button type="submit" class="btn" name="search2">Search</button>
                                  <label><input type="search" aria-controls="published_id" placeholder=' &#xf002   Search...' name="search_text_2" /></label>
                               </form>
                           </div>
                       </div>
                        <thead>
                            <tr>
                                <th scope="col">ADDED NOTE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row=mysqli_fetch_assoc($result_published)){
                              $date_pub=$row['PublishedDate'];
                              $title_pub =$row['Title'];
                              $category_pub =$row['Name'];
                              $status_pub = $row['Value'];  
                              $price =  $row['SellingPrice']; 
                               $seller_note_id=$row['Seller_Note_id']; 
                                
                                      echo "<tr>";
                                      echo "<td> $date_pub</td>";
                                      echo "<td><a href='notedetails.php?id=$seller_note_id' style='text-decoration:none; color:#6255a5'>$title_pub </a></td>";
                                      echo "<td> $category_pub</td>";
                                      echo "<td>$status_pub</td>";
                                      echo "<td>$price</td>";
                                      echo "<td><a href='http://localhost/Notes-project/Notes-front/notedetails.php?id=$seller_note_id'><img src='image/Dashboard/eye.png' alt='view'></a>";
                                      echo "</tr>";
                                  }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
          
           
        </div>
    </section>

    <?php
    include "footer.php";
    ?>



    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    
    <!--datatable js-->
    <script src="javascript/datatables.min.js"></script>
    <script>
         $(document).ready(function(){
         $("#inprogress_id").DataTable();
         });
         $(document).ready(function(){
         $("#published_id").DataTable();
         });
    </script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
    
     <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>