<?php 
include "connection.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}
$query_member_info =  "SELECT users.FirstName,users.LastName,users.Email, userprofile.DOB,userprofile.PhoneNumber,userprofile.ProfilePicture,userprofile.College,userprofile.University,userprofile.AddressLine1 ,userprofile.AddressLine2,userprofile.City,userprofile.State,countries.CountryName,userprofile.ZipCode FROM users LEFT JOIN userprofile ON users.User_id = userprofile.User_id LEFT JOIN countries ON userprofile.Country = countries.Country_id WHERE users.User_id=$id";
    $result_member_info = mysqli_query($conn,$query_member_info);

    while($row=mysqli_fetch_assoc($result_member_info)){
    $firstname = $row['FirstName']; 
    $lastname = $row['LastName'];
    $email = $row['Email'];
    $dob = $row['DOB'];
    $phoneno = $row['PhoneNumber'];
    $profile_pic_member = $row['ProfilePicture'];
    $college = $row['College']; 
    $university = $row['University'];
    $address1 = $row['AddressLine1'];  
    $address2 = $row['AddressLine2'];
    $city = $row['City']; 
    $state = $row['State']; 
    $country = $row['CountryName'];
    $zipcode =$row['ZipCode'];    
    }
if(isset($_GET['noteid'])){
   $noteid = $_GET['noteid'];
    
     $zipname = 'file.zip';
     $zip = new ZipArchive;
     $zip->open($zipname, ZipArchive::CREATE);
    
    $query_attach = "SELECT * FROM sellernotesattachments WHERE Seller_note_id=$noteid";
    $result_attach = mysqli_query($conn,$query_attach);
    while($row=mysqli_fetch_assoc($result_attach)){
    $attatch_path = $row['FilePath'];
    $zip->addFile($attatch_path);
    }
     $zip->close();
     header('Content-Type: application/zip');
     header('Content-disposition: attachment; filename='.$zipname);
     header('Content-Length: ' . filesize($zipname));
     readfile($zipname);    
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
        <section id="member-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Member Details</h3>
                    </div>
                </div>
                <div class="row member-bottom-border">
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                      <?php 
                        if(!empty($profile_pic_member)){ ?>
                      <img src="<?php echo $profile_pic_member ?>" alt="member" style="width:150px;height:170px">
                      <?php    }
                        else{ ?>
                            <img src="../Members/default/DP.jpg" alt="member" style="width:150px;height:170px">
                      <?php  }
                        ?>
                        
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-12 col-12 border-member">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-6">
                                <h4 class="member-info">First Name:</h4>
                                <h4 class="member-info">Last Name:</h4>
                                <h4 class="member-info">Email:</h4>
                                <h4 class="member-info">DOB:</h4>
                                <h4 class="member-info">Phone Number:</h4>
                                <h4 class="member-info">College/University:</h4>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                                <h4 class="member-info-ans"><?php echo $firstname ?></h4>
                                <h4 class="member-info-ans"><?php echo $lastname ?></h4>
                                <h4 class="member-info-ans"><?php echo $email ?></h4>
                                <h4 class="member-info-ans"><?php echo $dob ?></h4>
                                <h4 class="member-info-ans"><?php echo $phoneno ?></h4>
                                <h4 class="member-info-ans"><?php echo $college ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-6">
                                <h4 class="member-info">Address 1:</h4>
                                <h4 class="member-info">Address 2:</h4>
                                <h4 class="member-info">City:</h4>
                                <h4 class="member-info">State:</h4>
                                <h4 class="member-info">Country:</h4>
                                <h4 class="member-info">Zip Code:</h4>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                                <h4 class="member-info-ans"><?php echo $address1 ?></h4>
                                <h4 class="member-info-ans"><?php echo $address2 ?></h4>
                                <h4 class="member-info-ans"><?php echo $city ?></h4>
                                <h4 class="member-info-ans"><?php echo $state ?></h4>
                                <h4 class="member-info-ans"><?php echo $country ?></h4>
                                <h4 class="member-info-ans"><?php echo $zipcode ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>
        <section id="member-table">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 common-space">
                        <h4>Notes</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-5 member-table text-center" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE </th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">DOWNLOADED NOTES</th>
                                    <th scope="col">TOTAL EARNINGS</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">PUBLISHED DATE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                $query_member_note = mysqli_query($conn,"SELECT sellernote.Seller_Note_id,sellernote.Seller_id,sellernote.Title,note_categories.Name,reference_data.Value,sellernote.SellingPrice,sellernote.PublishedDate,sellernote.CreatedDate FROM sellernote LEFT JOIN note_categories ON sellernote.Category = note_categories.Category_id LEFT JOIN reference_data ON sellernote.Status = reference_data.Refdata_id WHERE sellernote.Seller_id=$id");
                             $i=1;
                             while($row=mysqli_fetch_assoc($query_member_note)){
                                 $title = $row['Title'];
                                 $category = $row['Name'];
                                 $status = $row['Value'];
                                 $published_date = $row['PublishedDate'];
                                 $date_added = $row['CreatedDate'];
                                 $seller_note_id = $row['Seller_Note_id'];
                                 $selling_price = $row['SellingPrice'];
                                 $seller_id = $row['Seller_id'];
                                 $seller_note_id = $row['Seller_Note_id'];
                                 
                                 
                                 $query_download = mysqli_query($conn,"SELECT COUNT(DISTINCT Downloaders) FROM downloads WHERE Seller_note_id=$seller_note_id AND SellerAllowedDownload=1");
                                    while($row=mysqli_fetch_assoc($query_download)){
                                       $count_buyer = $row['COUNT(DISTINCT Downloaders)']; 
                                    }
                                 $total_selling_price = $selling_price * $count_buyer;
                             
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><a href='note-details-admin.php?id=<?php echo $seller_note_id ?>' style='text-decoration:none; color:#6255a5'><?php echo $title ?></a></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo $status ?></td>
                                    <td><?php echo $count_buyer ?></td>
                                    <td><?php echo $total_selling_price ?></td>
                                    <td><?php echo $date_added ?></td>
                                    <td><?php echo $published_date ?></td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="members-details.php?id=<?php echo $id ?>&&noteid=<?php echo $seller_note_id ?>">Download Notes</a>

                                            </div>
                                        </div>
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
    <!--footer-->
    <?php include "admin-footer.php";
    ?>
    <!--footer end-->





    <!--popper js-->
    <script src="javascript/popper.min.js"></script>

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    
     <!--datatable js -->
    <script src="javascript/datatables.min.js"></script>
    
    <script>
    $(document).ready(function(){
    $("#myTable").DataTable();  
    });
    </script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>