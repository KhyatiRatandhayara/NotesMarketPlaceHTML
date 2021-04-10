<?php 
include "../connection.php";

if (!empty(isset($_GET['searchreview_data']))) {
    $search_review = $_GET['searchreview_data'];
} 
else{ 
   $search_review = "";
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
$query_under_review = "SELECT sellernote.Seller_id,sellernote.Seller_Note_id,sellernote.Title,note_categories.Name,users.FirstName,users.LastName,sellernote.PublishedDate,reference_data.Value FROM sellernote LEFT JOIN note_categories ON sellernote.Category = note_categories.Category_id LEFT JOIN users ON sellernote.Seller_id=users.User_id LEFT JOIN reference_data ON sellernote.Status = reference_data.Refdata_id WHERE (sellernote.Status=4 OR sellernote.Status=5) AND sellernote.IsActive=1";

if(!empty($search_review)){
$wherequery .= " AND (sellernote.Title LIKE '%$search_review%' OR note_categories.Name LIKE '%$search_review%' OR sellernote.PublishedDate LIKE '%$search_review%' OR reference_data.Value LIKE '%$search_review%' OR users.FirstName LIKE '%$search_review%' OR users.LastName LIKE '%$search_review%')";
}
if(!empty($seller_get)){
$wherequery .= " AND sellernote.Seller_id=$seller_get";
}
if((!empty($member_get))){
$wherequery .= " AND sellernote.Seller_id=$member_get";

}
$query_under = $query_under_review.$wherequery; 
$result_under_review = mysqli_query($conn,$query_under);

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



</head>
<div class="row">
    <div class="table-responsive">
        <table class="table border common-table-width-4 text-center under-review-table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SR NO.</th>
                    <th scope="col">NOTE TITLE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">SELLER</th>
                    <th scope="col"></th>
                    <th scope="col">DATE ADDED</th>
                    <th scope="col">STATUS</th>
                    <th scope="col"></th>
                    <th scope="col">ACTION</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
                    <?php
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($result_under_review)){
                                        $title = $row['Title'];
                                        $category = $row['Name'];
                                        $seller_fname = $row['FirstName'];
                                        $seller_lname = $row['LastName'];
                                        $published_date = $row['PublishedDate'];
                                        $status = $row['Value'];
                                        $seller_note_id = $row['Seller_Note_id'];
                                        $seller_id = $row['Seller_id'];
                                    ?>
                    <tr>                
                    <td><?php echo $i ?></td>
                    <?php echo"<td><a href='note-details-admin.php?id=$seller_note_id' style='text-decoration:none; color:#6255a5'>$title</a></td>"; ?>
                    <td><?php echo $category ?></td>
                    <?php echo "<td>$seller_fname&nbsp;$seller_lname</td>"; ?>
                        <td><a href="members-details.php?id=<?php echo $seller_id ?>"><img src="image/login/eye.png" alt="eye"></a></td>
                    <td><?php echo $published_date ?></td>
                    <td><?php echo $status ?></td>
                    <td><button class="btn btn-green approve-popup" data-toggle="modal" data-target="#exampleModal1" data-id="<?php echo $seller_note_id ?>">Approve</button></td>

                    <td><button class="btn btn-red rejected-popup" data-toggle="modal" data-target="#exampleModalreject" data-id="<?php echo $seller_note_id ?>" data-title-id="<?php echo $title ?>">Reject</button></td>

                    <td><button class="btn btn-inreview inreview-popup" data-toggle="modal" data-target="#exampleModal3" data-id="<?php echo $seller_note_id ?>">InReview</button></td>
                    <td>
                        <div class="dropdown dropleft">
                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="image/administrator/dots.png" alt="dots">
                            </a>
                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="AJAX/notes-under-review-ajax.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
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

<!-- Modal -->
<form method="post">
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>“Via marking the note In Review – System will let user know that review process has been
                        initiated. Please press yes to continue.”</p>
                    <input type="hidden" id="noteid-inreview" name="noteid_inreview" value="">
                    <button class="btn btn-inreview yes" id="yesid" name="yes-inreview">Yes</button>
                    <button class="btn btn-inreview" data-dismiss="modal">No</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <p>“If you approve the notes – System will publish the notes over portal. Please press yes to
                        continue.”</p>
                    <input type="hidden" id="noteid_approve" name="noteid_approve" value="">
                    <button class="btn btn-green yes" name="yes_approve">Yes</button>
                    <button class="btn btn-inreview" data-dismiss="modal">No</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalreject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-body">
                    <input type="text" class="form-control" id="rejected_title" disabled>

                    <input type="hidden" id="noteid_rejected" name="noteid_rejected">
                    <label style="margin-top: 20px">Remarks<span class="required">*</span></label>
                    <textarea id="remarks" name="remarks" cols="55" rows="4" style="margin-bottom: 10px"></textarea>
                    <button type="submit" class="btn btn-red" name="rejectbtn">Reject</button>
                    <button class="btn btn-inreview" data-dismiss="modal">Cancle</button>

                </div>
            </div>
        </div>
    </div>
</form>


<script>
    $(document).ready(function() {
        $("#myTable").DataTable();
    });
    $(document).on('click', '.inreview-popup', function() {
        $('#noteid-inreview').val($(this).data('id'));
    });
    $(document).on('click', '.approve-popup', function() {
        $('#noteid_approve').val($(this).data('id'));
    });
    $(document).on('click', '.rejected-popup', function() {
        $('#noteid_rejected').val($(this).data('id'));
        $('#rejected_title').val($(this).data('title-id'));
    });
</script>

</html>