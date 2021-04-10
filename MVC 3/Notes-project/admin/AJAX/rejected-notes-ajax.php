<?php 
include "../connection.php";
if(!empty(isset($_GET['search_rejected_data']))){
    $search_rejected = $_GET['search_rejected_data'];
}
else{
    $search_rejected = " ";
}

if (!empty(isset($_GET['seller_data']))) {
    $seller_get = $_GET['seller_data'];
} 
else{ 
   $seller_get = "";
}

$wherequery = " ";
 $query_rejected = "SELECT sellernote.Seller_Note_id,sellernote.Seller_id,sellernote.Title,note_categories.Name,US.FirstName SF,US.LastName SL,UP.FirstName AF,UP.LastName AL,sellernote.PublishedDate,sellernote.AdminRemarks FROM sellernote LEFT JOIN note_categories ON sellernote.Category = note_categories.Category_id LEFT JOIN users US ON sellernote.Seller_id=US.User_id LEFT JOIN users UP ON sellernote.ActionedBy=UP.User_id WHERE sellernote.Status=7 AND sellernote.IsActive=1";

if(!empty($search_rejected)){
  $wherequery .= " AND (sellernote.Title LIKE '%$search_rejected%' OR note_categories.Name LIKE '%$search_rejected%' OR sellernote.PublishedDate LIKE '%$search_rejected%' OR sellernote.AdminRemarks LIKE '%$search_rejected%' OR US.FirstName LIKE '%$search_rejected%' OR US.LastName LIKE '%$search_rejected%' OR UP.FirstName LIKE '%$search_rejected%' OR UP.LastName LIKE '%$search_rejected%')";  
}
if(!empty($seller_get)){
$wherequery .= " AND sellernote.Seller_id=$seller_get";
}

$query_rejected_append = $query_rejected.$wherequery;
 $result_rejected = mysqli_query($conn,$query_rejected_append);

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
                   
                   <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-4 text-center rejected-notes-table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SELLER</th>
                                    <th scope="col"></th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">REJECTED BY</th>
                                    <th scope="col">REMARK</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                $i=1;
                                while($row=mysqli_fetch_assoc($result_rejected)){
                                    $title = $row['Title'];
                                    $category = $row['Name'];
                                    $seller_fname = $row['SF'];
                                    $seller_lname = $row['SL'];
                                    $actionby_fname = $row['AF'];
                                    $actionby_lname = $row['AL'];
                                    $published_date = $row['PublishedDate'];
                                    $admin_remarks = $row['AdminRemarks'];
                                    $seller_note_id = $row['Seller_Note_id'];
                                    $seller_id = $row['Seller_id'];
                                
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style='text-decoration:none; color:#6255a5'><?php echo $title ?></a></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo "$seller_fname&nbsp;$seller_lname"?></td>
                                    <td><a href="members-details.php?id=<?php echo $seller_id ?>"><img src="image/login/eye.png" alt="eye"></a></td>
                                    <td><?php echo $published_date?></td>
                                    <td><?php echo "$actionby_fname&nbsp;$actionby_lname"?></td>
                                    <td><?php echo $admin_remarks?></td>
                                   
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item rejected-approve-popup" data-target="#exampleModalapprove" data-toggle="modal" data-id="<?php echo $seller_note_id ?>">Approve</a>
                                                <a class="dropdown-item" href="AJAX/rejected-notes-ajax.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
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
     <form method="post">          
     <div class="modal fade" id="exampleModalapprove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <p>“If you approve the notes – System will publish the notes over portal. Please press yes to
                        continue.” </p>
                    <input type="hidden" id="noteid_approve" name="noteid_approve" value="">
                    <button class="btn btn-green yes" name="yes_approve">Yes</button>
                    <button class="btn btn-inreview" data-dismiss="modal">No</button>

                </div>
            </div>
        </div>
    </div>
    </form>         
    <script>
$(document).ready(function(){
 $("#myTable").DataTable();   
});
$(document).on('click', '.rejected-approve-popup', function() {
        $('#noteid_approve').val($(this).data('id'));
    });        
</script>           
                