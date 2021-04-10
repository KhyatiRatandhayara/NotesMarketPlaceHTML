<?php 
include "connection.php";
if(isset($_POST['search'])){
    $search_text = $_POST['search_text'];
     $query_admin = mysqli_query($conn,"SELECT users.FirstName,users.LastName,users.Email,users.IsActive,users.CreatedDate,users.User_id, userprofile.PhoneNumber FROM users LEFT JOIN userprofile ON users.User_id=userprofile.User_id WHERE users.UserRole_id=2 AND (users.FirstName LIKE '%$search_text%' OR users.LastName LIKE '%$search_text%' OR users.Email LIKE '%$search_text%' OR users.CreatedDate LIKE '%$search_text%' OR userprofile.PhoneNumber LIKE '%$search_text%')");
    
}
else{
     $query_admin = mysqli_query($conn,"SELECT users.FirstName,users.LastName,users.Email,users.IsActive,users.CreatedDate,users.User_id,userprofile.PhoneNumber FROM users LEFT JOIN userprofile ON users.User_id=userprofile.User_id WHERE users.UserRole_id=2");
}

if(isset($_POST['yes_delete'])){
   
   $userid_get = $_POST['delete_admin'];
    $query_update = mysqli_query($conn,"UPDATE users SET IsActive=0 WHERE User_id=$userid_get");
    header("Refresh:0;");
}

?>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">


    <title>Notes MarketPlace</title>

    <!--favicon-->
    <link rel="shortcut icon" href="image/login/favicon.ico">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--font Awesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    
     <!--datatable css-->
     <link rel="stylesheet" href="css/jquery.dataTables.css">


    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
   <?php 
    include "admin-header.php";
    ?>
    <div class="bottom-footer">
        <section id="administrator">
            <div class="container dash-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 common-space">
                        <h4>Manage Adminitrator</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <a href="add-admin.php"><button class="btn btn-admin">ADD ADMINISTRATOR</button></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                       <form method="post">
                        <button type="submit" class="btn search-admin" name="search">Search</button>
                        <input type="search" placeholder=' &#xf002   Search...' name="search_text" />
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-2 text-center" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHONE NO.</th>
                                    <th scope="col">DATA ADDED</th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                              $i=1;
                                while($row=mysqli_fetch_assoc($query_admin)){
                                    $firstname = $row['FirstName'];
                                    $lastname = $row['LastName'];
                                    $email = $row['Email'];
                                    $phone_no = $row['PhoneNumber'];
                                    $data_added = $row['CreatedDate'];
                                    $active = $row['IsActive'];
                                    $user_id = $row['User_id'];
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $firstname  ?></td>
                                    <td><?php echo $lastname ?></td>
                                    <td><?php echo $email ?></td>
                                    <?php 
                                    if(!empty($phone_no)){
                                      echo "<td>$phone_no</td>";  
                                    }
                                    else{
                                      echo "<td>NULL</td>";  
                                    }
                                    ?>
                                   
                                    <td><?php echo $data_added ?></td>
                                    <?php
                                    if($active==1){
                                    echo "<td>yes</td>";    
                                    }
                                    else{
                                    echo "<td>no</td>";   
                                    }
                                    ?>
                                    <td>
                                        <a href="add-admin.php?userid=<?php echo $user_id ?>"><img src="image/administrator/edit.png" alt="edit"></a>&nbsp;
                                        <a  data-toggle="modal" data-target="#exampleModaladmin" data-id="<?php echo $user_id ?>" class="delete-popup"><img src="image/administrator/delete.png" alt="delete"></a>
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
               
                
                
            </div>

        </section>
    </div>
    
    <form method="post">   
     <div class="modal fade" id="exampleModaladmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <p>“Are you sure you want to make this administrator inactive?”</p>
                    <input type="hidden" id="delete_admin" name="delete_admin" value="">
                    <button class="btn yes" name="yes_delete" style="background-color:#6255a5; color:#fff">Yes</button>
                    <button class="btn" data-dismiss="modal" style="background-color:#6255a5; color:#fff">No</button>

                </div>
            </div>
        </div>
    </div>
</form> 
    <!--footer-->
    <?php include "admin-footer.php";
    ?>
    <!--footer end-->






    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

   <!--datatable js -->
    <script src="javascript/datatables.min.js"></script>
    <script>
    $(document).ready(function(){
     $("#myTable").DataTable();   
    });
    $(document).on('click', '.delete-popup', function() {
        $('#delete_admin').val($(this).data('id'));
    });     
    </script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>