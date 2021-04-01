<?php
include "connection.php";
session_start();
$email=$_SESSION['email'];

$query = "select * from users where Email='$email'";
$result = mysqli_query($conn,$query);
while($raw=mysqli_fetch_assoc($result)){
    $seller_id = $raw['User_id'];
}
echo $seller_id;
?>