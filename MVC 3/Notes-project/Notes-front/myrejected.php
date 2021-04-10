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
if(isset($_POST['search'])){
    
$search_text =  $_POST['search_text'];  
    
 $query_rejected = "SELECT  sellernote.Title,note_categories.Name,sellernote.Seller_Note_id,sellernote.AdminRemarks FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id  WHERE  Status=7 AND Seller_id=$user_id AND (sellernote.Title LIKE '%$search_text%' OR note_categories.Name LIKE '%$search_text%' OR sellernote.AdminRemarks LIKE '%$search_text%')";
$result_rejected = mysqli_query($conn,$query_rejected);   
}
else 
{
$query_rejected = "SELECT  sellernote.Title,note_categories.Name,sellernote.Seller_Note_id,sellernote.AdminRemarks FROM sellernote LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id  WHERE Status=7";
$result_rejected = mysqli_query($conn,$query_rejected);
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
                <div class="table-responsive">
                    <table class="table border common-table-width-3 text-center rejected-table" id="myTable">
                       <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                               <h4>My Rejected Notes</h4>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                              <form method="post">
                               <button type="submit" class="btn" name="search">Search</button>
                               <label id="rejected_search"><input type="search" placeholder=' &#xf002   Search...' aria-controls="myTable" name="search_text" /></label>
                               </form>
                           </div>
                       </div>
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">NOTE TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">REMARKS</th>
                                <th scope="col">ClONE</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                            $i=1;
                            while($row=mysqli_fetch_assoc($result_rejected)){
                                $title = $row['Title'];
                                $category = $row['Name'];
                                $remark = $row['AdminRemarks'];
                                $note_id = $row['Seller_Note_id'];
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $title ?></td>
                                <td><?php echo $category ?></td>
                                <td><?php echo $remark ?></td>
                                <td>Clone</td>
                                <td>
                                     <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/Dashboard/dots.png" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                              <?php 
                                               echo "<a class='dropdown-item' href='myrejected.php?id=$note_id'>Download Note</a>";
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