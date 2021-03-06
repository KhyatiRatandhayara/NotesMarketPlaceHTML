<?php
include "connection.php";
$limit = 4;
            if(isset($_GET["page"])) {
            $page = $_GET["page"];
            }
            else{
            $page=1;
            }
            $start_from = ($page-1) * $limit;

if(isset($_POST['search'])){
    $search_text=$_POST['search_text'];
    
    $result_db = mysqli_query($conn,"SELECT COUNT(Downloads_id) FROM downloads WHERE NoteTitle LIKE '%$search_text%'");
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
      $query_buyer="SELECT downloads.NoteTitle,downloads.NoteCategory,reference_data.Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate FROM downloads LEFT JOIN reference_data ON downloads.IsPaid=reference_data.Refdata_id WHERE downloads.NoteTitle LIKE '%$search_text%' LIMIT  $start_from,$limit";
      $result_buyer=mysqli_query($conn,$query_buyer);
}
else{
    
    $result_db = mysqli_query($conn,"SELECT COUNT(downloads.Downloads_id) FROM downloads");
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
      $query_buyer="SELECT downloads.NoteTitle,downloads.NoteCategory,reference_data. Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate FROM downloads LEFT JOIN reference_data ON downloads.IsPaid=reference_data.Refdata_id  LIMIT  $start_from,$limit ";
      $result_buyer=mysqli_query($conn,$query_buyer);
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
    <section id="buyer-request">
        <div class="container dash-space">
           <form method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <h4>Buyer Requests</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <button type="submit" class="btn" name="search">Search</button>
                    <input type="text" placeholder=' &#xf002   Search...' name="search_text" />
                </div>
            </div>
            </form>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border common-table-width-2 text-center">
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
                                
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>$title</td>";
                                echo "<td>$category</td>";
                                echo "<td>testing123@gmail.com</td>";
                                 echo "<td>+91&nbsp;9874563527</td>";
                                echo "<td>$type</td>";
                                echo "<td>$price</td>";
                                echo "<td>$downloaded_date</td>";
                                echo "
                                <td>
                                    <div class='join-image'>
                                        <img src='image/Dashboard/eye.png' alt='eye' class='table-img-1'>
                                        <div class='dropdown dropleft'>
                                            <a class='btn' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <img src='image/Dashboard/dots.png' alt='dots'>
                                            </a>
                                            <div class='dropdown-menu dots-shadow' aria-labelledby='dropdownMenuLink'>

                                                <a class='dropdown-item' href='#'>Allow Download</a>
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
           
            <div class="row">
                <div class="col-md-12">
                    <ul class='pagination justify-content-center'>
                    <?php
                    echo "<li class='page-item' style='list-style:none'><a href='buyerrequest.php?page=".($page-1)."' class='page-link'>❮</a></li>"; 

                    for($i=1; $i<=$total_pages; $i++) {
                        
                        if($i==$page){
                        echo "<li class='page-item active'><a class='page-link' href='buyerrequest.php?page=".$i."'>".$i."</a></li>"; 
                        }
                        else{
                          echo "<li class='page-item' style='list-style:none'><a class='page-link' href='buyerrequest.php?page=".$i."'>".$i."</a></li>";  
                        }
                             }
                    
                    echo "<li class='page-item'><a href='buyerrequest.php?page=".($page+1)."' class='page-link'>❯</a></li>";
                         ?>
                     </ul>
                </div>
            </div>
        </div>
    </section>

   <?php
    include "footer.php";
    ?>



    <!--popper js-->
    <script src="javascript/popper.min.js"></script>

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
</body>

</html>