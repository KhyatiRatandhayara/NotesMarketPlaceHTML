<?php
include "connection.php";
 if(isset($_GET['id'])){
     $id = $_GET['id'];
 }
 mysqli_query($conn,"update users set IsEmailVerified=1 where User_id=$id");
header("location:login.php");
?>
