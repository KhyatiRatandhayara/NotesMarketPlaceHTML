<?php
include "connection.php";
$id = $_GET['id'];
$delete=mysqli_query($conn,"UPDATE sellernote SET IsActive=0 WHERE Seller_Note_id=$id");
if($delete){
    header("location:dashboard.php");
}
else{
    die("query failed".mysqli_error($conn)); 
}
?>