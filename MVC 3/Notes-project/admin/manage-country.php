<?php 
include "connection.php";
if(isset($_POST['search'])){
    
    $search_text = $_POST['search_text'];
   $query_country= mysqli_query($conn,"SELECT countries.Country_id,countries.CountryName,countries.CountryCode,countries.CreatedDate,users.FirstName,users.LastName,countries.IsActive FROM countries LEFT JOIN users ON countries.CreatedBy=users.User_id WHERE (countries.CountryName LIKE '%$search_text%' OR countries.CountryCode LIKE '%$search_text%' OR countries.CreatedDate LIKE '%$search_text%' OR users.FirstName LIKE '%$search_text%' OR users.LastName LIKE '%$search_text%')"); 
    
}
else{
    $query_country= mysqli_query($conn,"SELECT countries.Country_id,countries.CountryName,countries.CountryCode,countries.CreatedDate,users.FirstName,users.LastName,countries.IsActive FROM countries LEFT JOIN users ON countries.CreatedBy=users.User_id");
 }
if(isset($_POST['yes_delete'])){
   
   $countryid_get = $_POST['delete_country'];
    $query_update = mysqli_query($conn,"UPDATE countries SET IsActive=0 WHERE Country_id=$countryid_get");
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
                        <h4>Manage Country</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <a href="add-country.php"><button class="btn btn-admin">ADD COUNTRY</button></a>
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
                                    <th scope="col">COUNTRY NAME</th>
                                    <th scope="col">COUNTRY CODE</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">ADDED BY</th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $i=1;
                                while($row=mysqli_fetch_assoc($query_country)){
                                    $country_name = $row['CountryName'];
                                    $countrycode = $row['CountryCode'];
                                    $date_added = $row['CreatedDate'];
                                    $addedby_fname = $row['FirstName'];
                                    $addedby_lname = $row['LastName'];
                                    $active = $row['IsActive'];
                                    $country_id = $row['Country_id'];
                               
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $country_name ?></td>
                                    <td><?php echo $countrycode ?></td>
                                    <td><?php echo $date_added ?></td>
                                    <td><?php echo "$addedby_fname&nbsp;$addedby_lname"?></td>
                                    <?php
                                    if($active==1){
                                        echo "<td>yes</td>";
                                    }
                                    else{
                                        echo "<td>no</td>";
                                    }
                                    ?>
                                   
                                    <td>
                                        <a href="add-country.php?countryid=<?php echo $country_id ?>"><img src="image/administrator/edit.png" alt="edit"></a>&nbsp;
                                        <a data-target="#exampleModalcountry" data-toggle="modal" class="delete-country-popup" data-id="<?php echo $country_id ?>"><img src="image/administrator/delete.png" alt="delete"></a>
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
     <div class="modal fade" id="exampleModalcountry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>“Are you sure you want to make this country inactive?”</p>
                    <input type="hidden" id="delete_country" name="delete_country" value="">
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
    $(document).on('click', '.delete-country-popup', function() {
        $('#delete_country').val($(this).data('id'));
    });    
</script>
    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>


    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>