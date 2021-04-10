<?php 
include "connection.php";
if(isset($_POST['search'])){
    $search_text = $_POST['search_text'];
    $query_type = mysqli_query($conn,"SELECT note_type.Type_id,note_type.Name,note_type.Description,note_type.CreatedDate,note_type.CreatedBy,note_type.IsActive,users.FirstName,users.LastName FROM note_type LEFT JOIN users ON note_type.CreatedBy=users.User_id WHERE (note_type.Name LIKE '%$search_text%' OR note_type.Description LIKE '%$search_text%' OR note_type.CreatedDate LIKE '%$search_text%' OR users.FirstName LIKE '%$search_text%' OR users.LastName LIKE '%$search_text%')");
}
else{
    $query_type = mysqli_query($conn,"SELECT note_type.Type_id,note_type.Name,note_type.Description,note_type.CreatedDate,note_type.CreatedBy,note_type.IsActive,users.FirstName,users.LastName FROM note_type LEFT JOIN users ON note_type.CreatedBy=users.User_id");
}
if(isset($_POST['yes_delete'])){
   
   $typeid_get = $_POST['delete_type'];
    $query_update = mysqli_query($conn,"UPDATE note_type SET IsActive=0 WHERE Type_id=$typeid_get");
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
                        <h4>Manage Type</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <a href="addtype.php"><button class="btn btn-admin">ADD TYPE</button></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                       <form method="post">
                        <button type="submit" class="btn search-admin" name="search">Search</button>
                        <input type="search" placeholder=' &#xf002   Search...'/ name="search_text">
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-2 text-center" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">ADDED BY</th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                
                                $i=1;
                                while($row=mysqli_fetch_assoc($query_type)){
                                    $type_name = $row['Name'];
                                    $description = $row['Description'];
                                    $addedby_fname= $row['FirstName'];
                                    $adddedby_lname = $row['LastName'];
                                    $date_added = $row['CreatedDate'];
                                    $active = $row['IsActive'];
                                    $type_id = $row['Type_id'];
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $type_name ?></td>
                                    <td><?php echo  $description ?></td>
                                    <td><?php echo $date_added ?></td>
                                    <td><?php echo "$addedby_fname&nbsp;$adddedby_lname"?></td>
                                    <?php 
                                    if($active==1){
                                        echo "<td>yes</td>";
                                    }
                                    else{
                                        echo "<td>no</td>";
                                    }
                                    ?>
                                    
                                    <td>
                                        <a href="addtype.php?typeid=<?php echo $type_id ?>"><img src="image/administrator/edit.png" alt="edit"></a>&nbsp;
                                        <a class="delete-type-popup" data-id="<?php echo $type_id ?>" data-target="#exampleModaltype" data-toggle="modal"><img src="image/administrator/delete.png" alt="delete"></a>
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
     <div class="modal fade" id="exampleModaltype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>“Are you sure you want to make this type inactive?”</p>
                    <input type="hidden" id="delete_type" name="delete_type" value="">
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
    
    <script src="javascript/datatables.min.js"></script>
    <script>
    $(document).ready(function(){
     $("#myTable").DataTable();   
    });
        $(document).on('click', '.delete-type-popup', function() {
        $('#delete_type').val($(this).data('id'));
    }); 
    </script>    

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>