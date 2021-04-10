 <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

<?php
include "../connection.php";

if (!empty(isset($_GET['mydash_data']))) {
    $search_dash = $_GET['mydash_data'];
} 
else{ 
   $search_dash = "";
}
if(!empty(isset($_GET['dropdownmonth_data']))){
    $dropdownmonth = $_GET['dropdownmonth_data'];
}
else{ 
   $dropdownmonth = "";
}


$wherequery = "";
$query_fetch = "SELECT sellernote.Seller_Note_id,sellernote.Seller_id,sellernote.Title,note_categories.Name,reference_data.Value,sellernote.SellingPrice,sellernote.PublishedDate,users.FirstName,users.LastName,users.Email,users.User_id FROM sellernote LEFT JOIN note_categories ON sellernote.Category = note_categories.Category_id LEFT JOIN reference_data ON sellernote.Ispaid=reference_data.Refdata_id LEFT JOIN users ON sellernote.Seller_id=users.User_id WHERE sellernote.Status=11 AND sellernote.IsActive=1";

        if(!empty($search_dash)){
        $wherequery .= " AND (sellernote.Title LIKE '%$search_dash%' OR note_categories.Name LIKE '%$search_dash%' OR reference_data.Value LIKE '%$search_dash%' OR sellernote.SellingPrice LIKE '%$search_dash%' OR sellernote.PublishedDate LIKE '%$search_dash%' OR users.FirstName LIKE '%$search_dash%' OR users.LastName LIKE '%$search_dash%')";
        }

        if(!empty($dropdownmonth)){
       $split_month = explode('-',$dropdownmonth);
        $wherequery .= " AND MONTH(sellernote.PublishedDate)='$split_month[0]' AND YEAR(sellernote.PublishedDate)='$split_month[1]'";
        }
        $query_append = $query_fetch.$wherequery;
        $result_fetch = mysqli_query($conn,$query_append);
        

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
<head>
    <!--datatable css-->
   <link rel="stylesheet" href="css/jquery.dataTables.css">
    
</head>

<div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-5 text-center dashboard-table" id="myTable">
                       
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">ATTACHMENT SIZE</th>
                                    <th scope="col">SELL TYPE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">PUBLISHER</th>
                                    <th scope="col">PUBLISHED DATE</th>
                                    <th scope="col">NUMBER OF DOWNLOADS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $i=1;
                                while($row=mysqli_fetch_assoc($result_fetch)){
                                    $title = $row['Title'];
                                    $category = $row['Name'];
                                    $selltype = $row['Value'];
                                    $sellingprice = $row['SellingPrice'];
                                    $published_date = $row['PublishedDate'];
                                    $seller_fname = $row['FirstName'];
                                    $seller_lname = $row['LastName'];
                                    $seller_note_id = $row['Seller_Note_id'];
                                    $seller_id = $row['Seller_id'];
                                    $seller_email = $row['Email'];
                                    $userid = $row['User_id'];
                                    
                                    
                                    $query_download = mysqli_query($conn,"SELECT COUNT(DISTINCT Seller_Note_id) FROM downloads WHERE Seller_note_id=$seller_note_id AND SellerAllowedDownload=1");
                                    while($row=mysqli_fetch_assoc($query_download)){
                                       $count_buyer = $row['COUNT(DISTINCT Seller_Note_id)']; 
                                    }
                                ?>
                                <tr>
                                   
                                    <td><?php echo $i ?></td>
                                    <?php echo "<td><a href='note-details-admin.php?id=$seller_note_id' style='text-decoration:none; color:#6255a5'>$title</a></td>"; ?>
                                    <td><?php echo $category ?></td>
                                    <td>10KB</td>
                                    <td><?php echo $selltype ?></td>
                                    <td><?php echo $sellingprice ?></td>
                                    <?php echo "<td><a href='members-details.php?id=$seller_id' style='text-decoration:none; color:#6255a5'>$seller_fname&nbsp;$seller_lname</a></td>"; ?>
                                    <td><?php echo  $published_date ?></td>
                                    <td><a href="downloaded-notes.php?noteid=<?php echo $seller_note_id  ?>" style='text-decoration:none; color:#6255a5'><?php echo $count_buyer ?></a></td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                             
                                              <?php  echo "<a class='dropdown-item' href='AJAX/dashboard-admin-ajax.php?id=$seller_note_id'>Download Notes</a>"; ?> 
                                              
                                            <?php   echo "<a class='dropdown-item' href='note-details-admin.php?id=$seller_note_id'>View More Details</a>"; ?> 
                                                <a class="dropdown-item unpublish-popup" data-toggle="modal" data-target="#exampleModal1" data-id="<?php echo $seller_note_id ?>" data-title-id="<?php echo $title ?>">Unpublish</a>
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
                
     
    <!--model-->
    
    <form method="post">
     <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            
             <div class="modal-content">
                 <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>

                 <div class="modal-body">
                     <input type="text" class="form-control" id="title_text" value="" disabled style="color:#6255a5">

                     <input type="hidden" id="note_id" name="noteid" value="">
                     <label style="margin-top: 20px">Remark<span class="required">*</span></label>
                     <textarea name="remark" id="report" cols="50" rows="4" style="margin-bottom: 10px"></textarea>
                     <button type="submit" class="btn btn-primary" style="background-color:#6255a5; color:#fff" name="unpublishbtn">Unpublish</button>
                     <button class="btn btn-primary" data-dismiss="modal" style="background-color:#6255a5; color:#fff">No</button>

                 </div>
             </div>
         </div>
     </div> 
      
     </form>           
   
    
    
    
     <!--datatable js -->
    <script src="javascript/datatables.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#myTable").DataTable();
    });
    $(document).on('click','.unpublish-popup',function(){
     $('#note_id').val($(this).data('id')); 
    $('#title_text').val($(this).data('title-id'));
    });    
    </script>
   
      
               
           