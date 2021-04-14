<?php
include "connection.php";

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<nav class="navbar navbar-expand-lg navbar-light  bg-light fixed-top  general-navbar">
        <a class="navbar-brand" href="home.php">
            <img src="image/User-Profile/logo.png" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Sell Your Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buyerrequest.php">Buyer Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                 <?php if(isset($_SESSION['email'])){ 
                
                ?>
                <li class="dropdown">
                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?php 
                        $email = $_SESSION['email'];
                        $query ="SELECT * FROM users WHERE Email='$email'" ;
                        $result = mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                        $user_id = $row['User_id'];
                        }
                        $query_profile_pic = "SELECT * FROM userprofile WHERE User_id = $user_id";
                        $result_profile_pic = mysqli_query($conn,$query_profile_pic);
                        while($row=mysqli_fetch_assoc($result_profile_pic)){
                            $profile_pic = $row['ProfilePicture'];
                        }
                         $count = mysqli_num_rows($result_profile_pic);
    
                       
    
                        if(!empty($profile_pic) && $profile_pic != " "){
                         echo " <img src='$profile_pic' alt='user' class='img-fluid' style='margin-top: 10px;width:40px; height:40px; border-radius:50%'>";   
                        } 
                         else{
                        ?>
                        <img src="../Members/default/DP.jpg" alt="user" class="img-fluid" style='margin-top: 10px;width:40px; height:40px; border-radius:50%'>
                        <?php } ?> 
                    </a>
                    <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="userprofile.php">
                            <h6>My Profile</h6>
                        </a>
                        <a class="dropdown-item" href="mydownload.php">
                            <h6>My Downloads</h6>
                        </a>
                        <a class="dropdown-item" href="mysolds.php">
                            <h6>My Sold Notes</h6>
                        </a>
                        <a class="dropdown-item" href="myrejected.php">
                            <h6>My Rejected Notes</h6>
                        </a>
                        <a class="dropdown-item" href="changepwd.php">
                            <h6>Change Password</h6>
                        </a>
                        <a class="dropdown-item pur_col" href="logout.php">
                           <h5><b>LOGOUT</b></h5>
                        </a>
                    </div>
                </li>
                 <?php } ?>
                <li class="nav-item">
                   <?php if(isset($_SESSION['email'])){ ?>
                        <a href="logout.php"><button class="btn btn-nav-login" type="submit"><b>LOGOUT</b></button></a>
                                <?php } 
                                else{
                                ?>
                        <a href="login.php"><button class="btn btn-nav-login" type="submit"><b>LOGIN</b></button></a>
                     <?php } ?>

                </li>
            </ul>

        </div>
    </nav>
   

