<?php 
include "connection.php";
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
  if(isset($_SESSION['email'])){
     $email = $_SESSION['email'];
     $query ="SELECT * FROM users WHERE Email='$email'" ;
     $result = mysqli_query($conn,$query);
     while($row=mysqli_fetch_assoc($result)){
     $user_id = $row['User_id'];
    $role_id =  $row['UserRole_id'];   
     }
}



?>   
       
         <nav class="navbar navbar-expand-lg navbar-light  bg-light fixed-top  general-navbar">
        <a class="navbar-brand" href>
            <img src="image/logo.png" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard-admin.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notes</a>
                      <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="notes-under-review.php">
                            <h6>Notes Under Review</h6>
                        </a>
                        <a class="dropdown-item" href="downloaded-notes.php">
                            <h6>Downloaded Notes</h6>
                        </a>
                        <a class="dropdown-item pur_col" href="published-note.php">
                            <h6>Published Notes</h6>
                        </a>
                         <a class="dropdown-item pur_col" href="rejected-notes.php">
                            <h6>Rejected Notes</h6>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="member-admin.php">Members</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
                  
                    <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="spam-report.php">
                            <h6>Spam Report</h6>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                    
                      <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                       <?php if($role_id==3){ ?>
                        <a class="dropdown-item" href="manage-configuration.php">
                            <h6>Manage System Configuration</h6>
                        </a>
                        <a class="dropdown-item" href="administrator-admin.php">
                            <h6>Manage Administrator</h6>
                        </a>
                        <a class="dropdown-item pur_col" href="manage-category.php">
                            <h6>Manage Category</h6>
                        </a>
                         <a class="dropdown-item pur_col" href="manage-type.php">
                            <h6>Manage Type</h6>
                        </a>
                         <a class="dropdown-item pur_col" href="manage-country.php">
                            <h6>Manage Country</h6>
                        </a>
                        <?php } 
                          
                          else{ ?>
                        <a class="dropdown-item pur_col" href="manage-category.php">
                            <h6>Manage Category</h6>
                        </a>
                         <a class="dropdown-item pur_col" href="manage-type.php">
                            <h6>Manage Type</h6>
                        </a>
                         <a class="dropdown-item pur_col" href="manage-country.php">
                            <h6>Manage Country</h6>
                        </a>
                        <?php } ?>
                    </div>
                </li>
               
                <?php  if(isset($_SESSION['email'])){?>
                <li class="dropdown">
                    <a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php 
                        
                        $query_profile_pic = "SELECT * FROM userprofile WHERE User_id = $user_id";
                        $result_profile_pic = mysqli_query($conn,$query_profile_pic);
    
    
                        while($row=mysqli_fetch_assoc($result_profile_pic)){
                            $profile_pic = $row['ProfilePicture'];
                        }
                         $count = mysqli_num_rows($result_profile_pic);
                        if($count > 0){ ?>
                          <img src="<?php echo $profile_pic ?>" alt="user" class="img-fluid" style='margin-top: 10px;width:40px; height:40px; border-radius:50%'>
                         <?php  }
                          else { ?>
                        <img src="image/user-img.png" alt="user" class="img-fluid" style='margin-top: 10px;width:40px; height:40px; border-radius:50%'>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="myprofile-admin.php">
                            <h6>Update Profile</h6>
                        </a>
                        <a class="dropdown-item" href="changepwd-admin.php">
                            <h6>Change Password</h6>
                        </a>
                        <a class="dropdown-item pur_col" href="logout-admin.php">
                            <h5>LOGOUT</h5>
                        </a>
                    </div>
                </li>
                <?php } ?>
                <li class="nav-item">
                   
                    <form class="form-inline my-2 my-lg-0">
                      <?php 
                        if(isset($_SESSION['email'])){ ?>
                        <a class="btn btn-nav-login" type="submit" data-toggle='modal' data-target='#exampleModal2'><b>Logout</b></a>  
                       <?php }
                        else {
                        ?>
                        <a href="login-admin.php" class="btn btn-nav-login" type="submit"><b>Login</b></a>
                       <?php  } ?>
                    </form>
                     
                </li>
            </ul>

        </div>
    </nav>
    
     <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        <p>“Are you sure you want to logout?”</p>
                        <a href="logout-admin.php"><button class="btn yes" id="yesid" style="background-color:#6255a5; color:#fff" name="yes">Yes</button></a>
                        <button class="btn" data-dismiss="modal" style="background-color:#6255a5; color:#fff">No</button>

                    </div>
                </div>
            </div>
        </div>