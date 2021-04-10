<?php 
include "connection.php";
if(isset($_POST['search'])){
   $search_text = $_POST['search_text']; 
    $query_spam = mysqli_query($conn,"SELECT sellernotereportedissues.Reportedissue_id,sellernotereportedissues.Seller_note_id ,sellernotereportedissues.ReportedByID,sellernotereportedissues. ModifiedDate,sellernotereportedissues.Remarks,users.FirstName,users.LastName,sellernote. Title,sellernote.Category,note_categories.Name FROM sellernotereportedissues LEFT JOIN users ON sellernotereportedissues.ReportedByID=users.User_id LEFT JOIN sellernote ON sellernotereportedissues.Seller_note_id=sellernote.Seller_Note_id LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id WHERE (users.FirstName LIKE '%$search_text%' OR users.LastName LIKE '%$search_text%' OR note_categories.Name LIKE '%$search_text%' OR sellernotereportedissues.Remarks LIKE '%$search_text%' OR sellernote. Title LIKE '%$search_text%')");
}
else{
  $query_spam = mysqli_query($conn,"SELECT sellernotereportedissues.Reportedissue_id,sellernotereportedissues.Seller_note_id ,sellernotereportedissues.ReportedByID,sellernotereportedissues. ModifiedDate,sellernotereportedissues.Remarks,users.FirstName,users.LastName,sellernote.Title,sellernote.Category,note_categories.Name FROM sellernotereportedissues LEFT JOIN users ON sellernotereportedissues.ReportedByID=users.User_id LEFT JOIN sellernote ON sellernotereportedissues.Seller_note_id=sellernote.Seller_Note_id LEFT JOIN note_categories ON sellernote.Category=note_categories.Category_id ");  
}
if(isset($_POST['yes_delete'])){
   
   $reportid_get = $_POST['delete_spam'];
    $query_update = mysqli_query($conn,"DELETE FROM sellernotereportedissues WHERE 	Reportedissue_id=$reportid_get");
    header("Refresh:0;");
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
    <link rel="shortcut icon" href="image/login/favicon.ico">

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

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <?php 
    include "admin-header.php";
    ?>
    <div class="bottom-footer">
        <section id="members">
            <div class="container">
                <div class="row member-space">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <h4>Spam Reports</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                       <form method="post">
                        <button type="submit" class="btn btn-members" name="search">Search</button>
                        <input type="search" placeholder=' &#xf002   Search...' name="search_text" />
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width spam-report-table text-center" id="myTable">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">REPORTED BY</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">DATE EDITED</th>
                                    <th scope="col">REMARK</th>
                                    <th scope="col">ACTION</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                
                                $i=1;
                               while($row=mysqli_fetch_assoc($query_spam)){
                                   $reportedby_fname = $row['FirstName'];
                                   $reportedby_lname = $row['LastName'];
                                   $notetitle = $row['Title'];
                                   $category = $row['Name'];
                                   $date_edited = $row['ModifiedDate'];
                                   $remark = $row['Remarks'];
                                   $reported_id = $row['Reportedissue_id'];
                                   $seller_note_id = $row['Seller_note_id'];
                                  
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo "$reportedby_fname&nbsp;$reportedby_lname" ?></td>
                                    <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style="text-decoration:none;color:#6255a5;"><?php echo $notetitle ?></a></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo $date_edited ?></td>
                                    <td><?php echo $remark ?></td>
                                    <td><a class="delete-spam-popup" data-toggle="modal" data-target="#exampleModalspam" data-id="<?php echo $reported_id ?>"><img src="image/administrator/delete.png" alt="delete"></a>
                                    </td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="spam-report.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
                                                <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $seller_note_id ?>">View More Details</a>
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
    </div>
    
      <form method="post">   
     <div class="modal fade" id="exampleModalspam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>“Are you sure you want to delete report issue?”</p>
                    <input type="hidden" id="delete_spam" name="delete_spam" value="">
                    <button class="btn yes" name="yes_delete" style="background-color:#6255a5; color:#fff">Yes</button>
                    <button class="btn" data-dismiss="modal" style="background-color:#6255a5; color:#fff">No</button>
                </div>
            </div>
        </div>
    </div>
</form>

    <!--footer-->
   <?php include "admin-footer.php";
    ?>
    <!--footer end-->

    <!--popper js-->
    <script src="javascript/popper.min.js"></script>

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    
     <script src="javascript/datatables.min.js"></script>
    <script>
    $(document).ready(function(){
     $("#myTable").DataTable();   
    });
    $(document).on('click','.delete-spam-popup',function(){
        $("#delete_spam").val($(this).data('id'));
    })    
    </script>
    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>