 <?php 
include "../connection.php";
if(!empty(isset($_GET['search_downloaded_data']))){
    $search_download = $_GET['search_downloaded_data'];
}
else{
    $search_download = "";
}

if (!empty(isset($_GET['seller_data']))) {
    $seller_get = $_GET['seller_data'];
} 
else{ 
   $seller_get = "";
}
if (!empty(isset($_GET['buyer_data']))) {
    $buyer_get = $_GET['buyer_data'];
} 
else{ 
   $buyer_get = "";
}
if (!empty(isset($_GET['note_data']))) {
    $note_get = $_GET['note_data'];
} 
else{ 
   $note_get = "";
}
if (!empty(isset($_GET['member_data']))) {
    $member_get = $_GET['member_data'];
} 
else{ 
   $member_get = "";
}
if (!empty(isset($_GET['note_get_data']))) {
    $note_get_data = $_GET['note_get_data'];
} 
else{ 
   $note_get_data = "";
}
$wherequery = " ";
$query_downloaded = "SELECT DISTINCT downloads.Seller_note_id ,downloads.Seller,downloads.Downloaders,downloads.NoteTitle,downloads.NoteCategory,US.FirstName SF,US.LastName SL,UP.FirstName BF,UP.LastName BL,reference_data.Value,downloads.PurchasedPrice,downloads.AttachmentDownloadedDate FROM downloads LEFT JOIN users US ON downloads.Seller=US.User_id LEFT JOIN users UP ON downloads.Downloaders=UP.User_id LEFT JOIN reference_data ON downloads.IsPaid = reference_data.Refdata_id WHERE SellerAllowedDownload=1";

if(!empty($search_download)){
    $wherequery .= " AND (downloads.NoteTitle LIKE '%$search_download%' OR downloads.NoteCategory LIKE '%$search_download%' OR reference_data.Value LIKE '%$search_download%' OR downloads.PurchasedPrice LIKE '%$search_download%' OR downloads.AttachmentDownloadedDate LIKE '%$search_download%' OR US.FirstName LIKE '%$search_download%' OR US.LastName LIKE '%$search_download%' OR UP.FirstName LIKE '%$search_download%' OR UP.LastName LIKE '%$search_download%')";
}
if(!empty($seller_get)){
$wherequery .= " AND downloads.Seller=$seller_get";
}

if(!empty($buyer_get)){
$wherequery .= " AND downloads.Downloaders=$buyer_get";
}
if(!empty($note_get)){
$wherequery .= " AND downloads.NoteTitle='$note_get'";
}
if(!empty($member_get)){
$wherequery .= " AND downloads.Downloaders=$member_get";
}
if(!empty($note_get_data)){
$wherequery .= " AND downloads.Seller_note_id=$note_get_data";
}
$query_downloaded_append = $query_downloaded.$wherequery;

$result_downloaded = mysqli_query($conn,$query_downloaded_append);

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
                        <table class="table border common-table-width-2 text-center downloaded-note-table" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">BUYER</th>
                                    <th scope="col"></th>
                                    <th scope="col">SELLER</th>
                                    <th scope="col"></th>
                                    <th scope="col">SELL TYPE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">DOWNLOADED DATE/TIME</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                
                                $i=1;
                                while($row=mysqli_fetch_assoc($result_downloaded)){
                                    
                                    $title = $row['NoteTitle'];
                                    $category = $row['NoteCategory'];
                                    $seller_fname = $row['SF'];
                                    $seller_lname = $row['SL'];
                                    $buyer_fname = $row['BF'];
                                    $buyer_lname = $row['BL'];
                                    $ispaid = $row['Value'];
                                    $purchaseprice = $row['PurchasedPrice'];
                                    $downloaded_date = $row['AttachmentDownloadedDate'];
                                    $seller_note_id = $row['Seller_note_id'];
                                    $buyer_id = $row['Downloaders'];
                                    $seller_id = $row['Seller'];
                                
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style='text-decoration:none; color:#6255a5'><?php echo $title ?></a></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo "$buyer_fname&nbsp;$buyer_lname" ?></td>
                                    <td><a href="members-details.php?id=<?php echo $buyer_id ?>"><img src="image/login/eye.png" alt="eye"></a></td>
                                    <td><?php echo "$seller_fname&nbsp;$seller_lname" ?></td>
                                    <td><a href="members-details.php?id=<?php echo $seller_id ?>"><img src="image/login/eye.png" alt="eye"></a></td>
                                    <td><?php echo $ispaid ?></td>
                                    <td><?php echo $purchaseprice ?></td>
                                    <td><?php echo $downloaded_date ?></td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="AJAX/downloaded-notes-ajax.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
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
                
    <script>
$(document).ready(function(){
 $("#myTable").DataTable();   
});

</script>           