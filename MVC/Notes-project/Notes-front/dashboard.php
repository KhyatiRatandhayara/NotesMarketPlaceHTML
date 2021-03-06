<?php
include "connection.php";
 $limit = 5;
 if(isset($_GET["page"])) {
 $page = $_GET["page"];
 }
 else{
 $page=1;
 };
 $start_from = ($page-1) * $limit;

if(isset($_POST['search1'])){
    
    $search_text_1=$_POST['search_text_1'];
    $result_db = mysqli_query($conn,"SELECT COUNT(Seller_Note_id) FROM sellernote WHERE Title LIKE '%$search_text_1%' AND sellernote.IsActive=1");
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
    
    $query_inprogress = "SELECT sellernote.Title,sellernote.PublishedDate,note_categories.Name,reference_data.Value,sellernote.Seller_Note_id FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Status=reference_data.Refdata_id  WHERE sellernote.Title LIKE '%$search_text_1%' AND reference_data.Refdata_id IN (3,4,5) AND sellernote.IsActive=1 LIMIT $start_from, $limit";
    
     $result_inprogress = mysqli_query($conn,$query_inprogress);
}
else{
    
    $result_db = mysqli_query($conn,"SELECT COUNT(Seller_Note_id) FROM sellernote WHERE sellernote.IsActive=1");
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = ceil($total_records / $limit);
    $query_inprogress = "SELECT sellernote.Title,sellernote.PublishedDate,note_categories.Name,reference_data.Value,sellernote.Seller_Note_id FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Status=reference_data.Refdata_id WHERE reference_data.Refdata_id IN (3,4,5) AND sellernote.IsActive=1 LIMIT $start_from, $limit";

     $result_inprogress = mysqli_query($conn,$query_inprogress);
}
 $limit2=5;
 if(isset($_GET["page2"])) {
 $page2 = $_GET["page2"];
 }
 else{
 $page2=1;
 };
 $start_from2 = ($page2-1) * $limit2;
                           
if(isset($_POST['search2'])){
     $search_text_2=$_POST['search_text_2'];
    $result_db2 = mysqli_query($conn,"SELECT COUNT(Seller_Note_id) FROM sellernote WHERE Title LIKE '%$search_text_2%' AND sellernote.Status=11");
            $row_db2 = mysqli_fetch_row($result_db2);
            $total_records2 = $row_db2[0];
            $total_pages2 = ceil($total_records2 / $limit2);
    $query_published ="SELECT sellernote.PublishedDate,sellernote.Title,note_categories.Name,reference_data.Value,sellernote.SellingPrice FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Ispaid=reference_data.Refdata_id WHERE sellernote.Title LIKE '%$search_text_2%' AND sellernote.Status=11 LIMIT $start_from2, $limit2";
    
    $result_published = mysqli_query($conn, $query_published);
}
else{
    
    $result_db2 = mysqli_query($conn,"SELECT COUNT(Seller_Note_id) FROM sellernote WHERE sellernote.Status=11");
            $row_db2 = mysqli_fetch_row($result_db2);
            $total_records2 = $row_db2[0];
            $total_pages2 = ceil($total_records2 / $limit2);
    
      $query_published ="SELECT  sellernote.PublishedDate,sellernote.Title,note_categories.Name,reference_data.Value,sellernote.SellingPrice FROM sellernote JOIN note_categories ON sellernote.Category=note_categories.Category_id LEFT JOIN reference_data ON sellernote.Ispaid=reference_data.Refdata_id WHERE sellernote.Status=11 LIMIT $start_from2, $limit2";
    
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
                    <button type="button" class="btn btn-addnote">ADD NOTE</button>
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
                            <h5>100</h5>
                            <p>Number Of Notes Sold</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 text-center dashboard-border-2">
                            <h5>$10,00,000</h5>
                            <p>Money Earned</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4  three-box text-center">
                            <h5>38</h5>
                            <p>My Downloads</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 three-box text-center">
                            <h5>12</h5>
                            <p>My Rejected Notes</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 three-box text-center">
                            <h5>102</h5>
                            <p>Buyer Requests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dashboard-details">
        <div class="container dash-space">
           <form method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <h5>In Progress Note</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <button type="submit" class="btn" name="search1">Search</button>
                    <input type="text" placeholder=' &#xf002   Search...' / name="search_text_1">
                </div>
            </div>
            </form>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border dash-radius common-table-width-2 text-center">
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
                                  echo "<td>$title </td>";
                                  echo "<td> $category</td>";
                                  echo "<td>$status</td>";
                                if($status == 'Draft'){
                                  echo "<td>
                                  <a href='http://localhost/Notes-project/Notes-front/addnote.php?id=$seller_note_id'>
                                    <img src='image/Dashboard/edit.png' alt='edit'>
                                    </a>
                                    <a href='http://localhost/Notes-project/Notes-front/deletebutton.php?id=$seller_note_id'>
                                    <img src='image/Dashboard/delete.png' alt='delete'>
                                    </a>
                                </td>";
                                    }
                                else {
                                    echo "<td><img src='image/Dashboard/eye.png' alt='view'>";
                                }
                                 echo "</tr>";
                            }
                            ?>
                            

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                   
                    <ul class='pagination justify-content-center'>
                    <?php
                    echo "<li class='page-item' style='list-style:none'><a href='dashboard.php?page=".($page-1)."' class='page-link'>❮</a></li>"; 

                    for($i=1; $i<=$total_pages; $i++) {
                        
                        if($i==$page){
                        echo "<li class='page-item active'><a class='page-link' href='dashboard.php?page=".$i."'>".$i."</a></li>"; 
                        }
                        else{
                          echo "<li class='page-item' style='list-style:none'><a class='page-link' href='dashboard.php?page=".$i."'>".$i."</a></li>";  
                        }
                             }
                    
                    echo "<li class='page-item'><a href='dashboard.php?page=".($page+1)."' class='page-link'>❯</a></li>";
                         ?>
                     </ul>
                </div>
            </div>
            
        </div>
    </section>
    <section class="dashboard-details">
        <div class="container dash-space">
           <form method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <h5>Published Note</h5>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <button type="submit" class="btn" name="search2">Search</button>
                    <input type="text" placeholder=' &#xf002   Search...' name="search_text_2"/>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border common-table-width-2 text-center">
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
                                
                                  echo "<tr>";
                                      echo "<td> $date_pub</td>";
                                      echo "<td>$title_pub </td>";
                                      echo "<td> $category_pub</td>";
                                      echo "<td>$status_pub</td>";
                                      echo "<td>$price</td>";
                                      echo "<td><img src='image/Dashboard/eye.png' alt='view'>";
                                      echo "</tr>";
                                  }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
          
            <div class="row">
                <div class="col-md-12">
                    <ul class='pagination justify-content-center'>
                    <?php
                    echo "<li class='page-item' style='list-style:none'><a href='dashboard.php?page2=".($page2-1)."' class='page-link'>❮</a></li>"; 
                        
                    for($i=1; $i<=$total_pages2; $i++){
                        
                        if($i==$page2){
                        echo "<li class='page-item active'><a class='page-link' href='dashboard.php?page2=".$i."'>".$i."</a></li>"; 
                        }
                        else{
                          echo "<li class='page-item' style='list-style:none'><a class='page-link' href='dashboard.php?page2=".$i."'>".$i."</a></li>";  
                        }
                             }
                    
                    echo "<li class='page-item'><a href='dashboard.php?page2=".($page2+1)."' class='page-link'>❯</a></li>";
                         ?>
                     </ul>
                    
                </div>
            </div>
        </div>
    </section>

    <?php
    include "footer.php";
    ?>



    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
</body>

</html>