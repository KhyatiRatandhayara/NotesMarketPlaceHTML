<?php 
include "connection.php";
if(isset($_POST['search'])){
    $search_text = $_POST['search_text'];
    $query_member = "SELECT * FROM users WHERE UserRole_id=1 AND (FirstName LIKE '%$search_text%' OR LastName LIKE '%$search_text%' OR 	Email LIKE '%$search_text%' OR CreatedDate LIKE '%$search_text%') AND IsActive=1";
    $result_member = mysqli_query($conn,$query_member);
}
else{
$query_member = "SELECT * FROM users WHERE UserRole_id=1 AND IsActive=1";
 $result_member = mysqli_query($conn,$query_member);    
}
if(isset($_POST['yes_inactive'])){
    
    $user_inactive = $_POST['userid_inactive'];
    
    $query_inactive_status = mysqli_query($conn,"UPDATE sellernote SET Status=8 WHERE Seller_id=$user_inactive");
    $query_inactive = mysqli_query($conn,"UPDATE users SET IsActive=0 WHERE User_id=$user_inactive");
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
        <section id="members">
            <div class="container">
                <div class="row member-space">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 common-space">
                        <h4>Members</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 common-space">
                        <form method="post">
                            <button class="btn btn-primary btn-members" type="submit" name="search">Search</button>
                            <input type="search" placeholder=' &#xF002;  Search' name="search_text">
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-6 text-center" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">JOINING DATE</th>
                                    <th scope="col">UNDER REVIEW NOTES</th>
                                    <th scope="col">PUBLISHED NOTES</th>
                                    <th scope="col">DOWNLOADED NOTE</th>
                                    <th scope="col">TOTAL EXPENSIS</th>
                                    <th scope="col">TOTAL EARNING</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                               
                                $i=1;
                                while($row=mysqli_fetch_assoc($result_member)){
                                $user_id = $row['User_id'];
                                $member_fname = $row['FirstName'];
                                $member_lname = $row['LastName']; 
                                $member_email = $row['Email'];    
                                $joining_date = $row['CreatedDate'];
                                    
                                $query_review = mysqli_query($conn,"SELECT COUNT(Seller_Note_id) FROM sellernote WHERE (Status=4 OR Status=5) AND Seller_id=$user_id");
                                    while($row=mysqli_fetch_assoc($query_review)){
                                        $count_inreview = $row['COUNT(Seller_Note_id)'];
                                    }
                                $query_published = mysqli_query($conn,"SELECT COUNT(Seller_Note_id) FROM sellernote WHERE Seller_id=$user_id AND Status=11");
                                    while($row=mysqli_fetch_assoc($query_published)){
                                        $count_published = $row['COUNT(Seller_Note_id)'];
                                    }
                                    
                                    
                                 $query_download = mysqli_query($conn,"SELECT COUNT(DISTINCT Seller_note_id) FROM downloads WHERE Downloaders=$user_id AND SellerAllowedDownload=1");
                                 while($row=mysqli_fetch_assoc($query_download)){
                                 $count_buyer = $row['COUNT(DISTINCT Seller_note_id)'];
                                 }
                                    
                                $query_earning = mysqli_query($conn,"SELECT DISTINCT Seller_note_id,SUM(PurchasedPrice) FROM downloads WHERE Seller=$user_id AND SellerAllowedDownload=1");
                                    while($row=mysqli_fetch_assoc($query_earning)){
                                            $total_earning = $row['SUM(PurchasedPrice)'];
                                        }
                                $query_expenses = mysqli_query($conn,"SELECT DISTINCT Seller_note_id,SUM(PurchasedPrice) FROM downloads WHERE Downloaders=$user_id AND SellerAllowedDownload=1");
                                    while($row=mysqli_fetch_assoc($query_expenses)){
                                            $total_expenses = $row['SUM(PurchasedPrice)'];
                                        }  
                                ?>

                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $member_fname ?></td>
                                    <td><?php echo $member_lname ?></td>
                                    <td><?php echo $member_email ?></td>
                                    <td><?php echo $joining_date ?></td>
                                    <td><a href="notes-under-review.php?userid=<?php echo $user_id ?>" style='text-decoration:none; color:#6255a5'><?php echo $count_inreview ?></a></td>
                                    <td><a href="published-note.php?userid=<?php echo $user_id ?>" style='text-decoration:none; color:#6255a5'><?php echo $count_published ?></a></td>
                                    <td><a href="downloaded-notes.php?userid=<?php echo $user_id ?>" style='text-decoration:none; color:#6255a5'><?php echo $count_buyer ?></a></td>
                                    <?php if($total_expenses!=0){ ?>
                                    <td><a href="downloaded-notes.php?userid=<?php echo $user_id ?>" style='text-decoration:none; color:#6255a5'>$<?php echo $total_expenses ?></a></td>
                                    <?php   } 
                                    else{ ?>
                                    <td><a href="downloaded-notes.php?userid=<?php echo $user_id ?>" style='text-decoration:none; color:#6255a5'>$0</a></td>
                                    <?php }?>

                                    <?php if($total_earning!=0){ ?>
                                    <td>$<?php echo  $total_earning ?></td>
                                    <?php }
                                    else 
                                    { ?>
                                    <td>$0</td>
                                    <?php }
                                    ?>

                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                <a class="dropdown-item" href="members-details.php?id=<?php echo $user_id ?>">View More Details</a>
                                                <a class="dropdown-item inactive-popup" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $user_id ?>">Deactivate</a>
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


    <form method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        <p>“Are you sure you want to make this member inactive?”</p>
                        <input type="hidden" id="userid_inactive" name="userid_inactive" value="">
                        <button class="btn yes" name="yes_inactive" style="background-color:#6255a5; color:#fff">Yes</button>
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

    <!--popper js-->
    <script src="javascript/popper.min.js"></script>

    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--datatable js -->
    <script src="javascript/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myTable").DataTable({
                scrollX: true
            });
        });
        $(document).on('click', '.inactive-popup', function() {
            $('#userid_inactive').val($(this).data('id'));
        });
    </script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>