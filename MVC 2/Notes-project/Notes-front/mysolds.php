<?php 
include "connection.php";
session_start();
if(isset($_SESSION['email'])){
  $email= $_SESSION['email'];
    $query ="SELECT * FROM users WHERE Email='$email'";
    $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
    $user_id = $row['User_id'];
    }
}
if(isset($_POST['search'])){
    $search_text=$_POST['search_text'];
    
      $query_fetch="SELECT downloads.NoteTitle,downloads.NoteCategory,reference_data.Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate,downloads.Seller,users.Email FROM downloads LEFT JOIN reference_data ON downloads.IsPaid=reference_data.Refdata_id LEFT JOIN users ON downloads.Downloaders=users.User_id WHERE downloads.SellerAllowedDownload=1 AND downloads.IsPaid=1 AND downloads.Seller=$user_id AND (downloads.NoteTitle LIKE '%$search_text%' OR downloads.NoteCategory LIKE '%$search_text%' OR downloads.PurchasedPrice LIKE '%$search_text%')";
      $result_fetch=mysqli_query($conn,$query_fetch);
      if(!$result_fetch){
       echo "fail";
      }
}
else{
      $query_fetch="SELECT downloads.NoteTitle,downloads.NoteCategory,reference_data.Value,downloads.PurchasedPrice, downloads.AttachmentDownloadedDate,downloads.Seller,downloads.Seller_note_id,users.Email FROM downloads LEFT JOIN reference_data ON downloads.IsPaid=reference_data.Refdata_id LEFT JOIN users ON downloads.Downloaders=users.User_id WHERE downloads.SellerAllowedDownload=1 AND downloads.IsPaid=1 AND downloads.Seller=$user_id";
      $result_fetch=mysqli_query($conn,$query_fetch);
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
                <div>
                    <table class="table common-table-width-3 text-center mysold-table" id="myTable">
                       
                       <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                               <h4>My Sold Notes</h4>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                               <form method="post">
                                   <button type="submit" class="btn" name="search">Search</button>
                                   <label id="sold_id"><input type="search" name="search_text" placeholder=' &#xf002   Search...' aria-controls="myTable"/></label>
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
                                <th scope="col"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $i=1;
                           while($row=mysqli_fetch_assoc($result_fetch)){
                               $title=$row['NoteTitle'];
                               $category=$row['NoteCategory'];
                               $type=$row['Value'];
                               $price=$row['PurchasedPrice'];
                               $downloaded_date=$row['AttachmentDownloadedDate'];
                               $seller_note_id = $row['Seller_note_id'];
                               $email_buyer = $row['Email'];
                         ?>
                            <tr>
                                <td><?php echo $i ?></td>
                               <?php echo "<td><a href='notedetails.php?id=$seller_note_id' style='text-decoration:none; color:#6255a5'> $title</a></td>"; ?>
                                <td><?php echo $category ?></td>
                                <td><?php echo $email_buyer ?></td>
                                <td><?php echo $type ?></td>
                                <td><?php echo $price ?></td>
                                <td><?php echo $downloaded_date ?></td>
                                <td>
                                    <a href='notedetails.php?id=<?php echo $seller_note_id ?>' style='text-decoration:none; color:#6255a5'><img src="image/Dashboard/eye.png" alt="eye"></a></td>
                                <td>    
                                   <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/Dashboard/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                               <?php 
                                                echo "<a class='dropdown-item' href='mysolds.php?id=$seller_note_id'>Download Note</a>";
                                 ?>
 
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            <?php
                             $i++;
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



    <!--popper js-->
    <script src="javascript/popper.min.js"></script>
    
    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    
     <!--datatable js-->
     <script src="javascript/datatables.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#myTable").DataTable();
    });
    </script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
    
     <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>