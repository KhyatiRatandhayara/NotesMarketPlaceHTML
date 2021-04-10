<?php
include "connection.php";
if(isset($_GET['noteid'])){
    $noteid = $_GET['noteid']; 
}
if(isset($_GET['reviewid'])){
     $reviewid = $_GET['reviewid'];
}

$query_delete = mysqli_query($conn,"UPDATE sellernotesreviews SET IsActive=0 WHERE Seller_note_id=$noteid AND ReviewedByID=$reviewid");
if($query_delete){
  header("location:customer_review-admin.php?id=$noteid");
}
?>