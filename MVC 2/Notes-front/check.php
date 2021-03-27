<?php
include "connection.php";
  //$id = mysqli_real_escape_string($conn, $_GET['id']);
$id = $_GET['id'];
 mysqli_query($conn,"update users set IsEmailVerified=1 where User_id=$id");
?>