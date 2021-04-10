 <?php 
include "../connection.php";
if(!empty(isset($_GET['search_published_data']))){
    $search_published = $_GET['search_published_data'];
}
else {
    $search_published = " ";
}
if (!empty(isset($_GET['seller_data']))) {
    $seller_get = $_GET['seller_data'];
} 
else{ 
   $seller_get = "";
}
if (!empty(isset($_GET['member_data']))) {
    $member_get = $_GET['member_data'];
} 
else{ 
   $member_get = "";
}
 $wherequery = " ";   
 $query_published = "SELECT DISTINCT sellernote.Seller_id,sellernote.Seller_Note_id,sellernote.Title,note_categories.Name,reference_data.Value,sellernote.SellingPrice,US.FirstName SF,US.LastName SL,UP.FirstName AF,UP.LastName AL,sellernote.PublishedDate FROM sellernote LEFT JOIN note_categories ON sellernote.Category = note_categories.Category_id LEFT JOIN users US ON sellernote.Seller_id=US.User_id LEFT JOIN users UP ON sellernote.ActionedBy=UP.User_id LEFT JOIN reference_data ON sellernote.Ispaid =reference_data.Refdata_id WHERE sellernote.Status=11 AND sellernote.IsActive=1";
    
if(!empty($search_published)){
    $wherequery .= " AND (sellernote.Title LIKE '%$search_published%' OR note_categories.Name LIKE '%$search_published%' OR reference_data.Value LIKE '%$search_published%' OR sellernote.SellingPrice LIKE '%$search_published%' OR sellernote.PublishedDate LIKE '%$search_published%' OR US.FirstName LIKE '%$search_published%' OR US.LastName LIKE '%$search_published%' OR UP.FirstName LIKE '%$search_published%' OR UP.LastName LIKE '%$search_published%')";
}
if(!empty($seller_get)){
$wherequery .= " AND sellernote.Seller_id=$seller_get";
}
if(!empty($member_get)){
$wherequery .= " AND sellernote.Seller_id=$member_get";
}
  $query_published_append = $query_published.$wherequery;  
 $result_published = mysqli_query($conn,$query_published_append);

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
                        <table class="table border common-table-width-4 text-center published-table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SELL TYPE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">SELLER</th>
                                    <th scope="col"></th>
                                    <th scope="col">PUBLISHED DATE</th>
                                    <th scope="col">APPROVED BY</th>
                                    <th scope="col">NUMBER OF DOWNLOADS</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                               
                                $i=1;
                                while($row=mysqli_fetch_assoc($result_published)){
                                    $title = $row['Title'];
                                    $category = $row['Name'];
                                    $selltype = $row['Value'];
                                    $sellingprice = $row['SellingPrice'];
                                    $seller_fname = $row['SF'];
                                    $seller_lname = $row['SL'];
                                    $published_date = $row['PublishedDate'];
                                    $approved_by_fname = $row['AF'];
                                    $approved_by_lname = $row['AL'];
                                    $seller_note_id = $row['Seller_Note_id'];
                                    $seller_id = $row['Seller_id'];
                                    
                                    
                                    $query_download = mysqli_query($conn,"SELECT COUNT(DISTINCT Seller_note_id) FROM downloads WHERE Seller_note_id=$seller_note_id");
                                    while($row=mysqli_fetch_assoc($query_download)){
                                       $count_buyer = $row['COUNT(DISTINCT Seller_note_id)']; 
                                    }
                                    
                                ?>
                               
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style='text-decoration:none; color:#6255a5'><?php echo $title ?></a></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo $selltype ?></td>
                                    <td><?php echo $sellingprice ?></td>
                                    <td><?php echo "$seller_fname&nbsp;$seller_lname" ?></td>
                                    <td><a href="members-details.php?id=<?php echo $seller_id ?>"><img src="image/login/eye.png" alt="eye"></a></td>
                                    <td><?php echo $published_date ?></td>
                                    <td><?php echo "$approved_by_fname&nbsp;$approved_by_lname" ?></td>
                                    <td><a href="downloaded-notes.php?noteid=<?php echo $seller_note_id  ?>" style='text-decoration:none; color:#6255a5'><?php echo $count_buyer ?></a></td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="AJAX/published-note-ajax.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
                                                <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $seller_note_id ?>">View More Details</a>
                                                <a class="dropdown-item unpublish-popup" data-target="#exampleModalunpublish" data-toggle="modal" data-id="<?php echo $seller_note_id ?>" data-title-id="<?php echo $title?>">Unpublish</a>
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
<div class="modal fade" id="exampleModalunpublish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-body">
                    <input type="text" class="form-control" id="unpublish_title" disabled>

                    <input type="hidden" id="noteid_unpublish" name="noteid_unpublish">
                    <label style="margin-top: 20px">Remarks<span class="required">*</span></label>
                    <textarea id="remarks" name="remarks" cols="55" rows="4" style="margin-bottom: 10px"></textarea>
                    <button type="submit" class="btn btn-red" name="unpublishbtn">Unpublish</button>
                    <button class="btn btn-inreview" data-dismiss="modal">Cancle</button>

                </div>
            </div>
        </div>
    </div>
</form>                  
                
<script>
$(document).ready(function(){
 $("#myTable").DataTable();   
});
$(document).on('click', '.unpublish-popup', function() {
        $('#noteid_unpublish').val($(this).data('id'));
        $('#unpublish_title').val($(this).data('title-id'));
    });   
</script>  
                           