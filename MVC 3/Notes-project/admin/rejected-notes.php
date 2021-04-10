<?php 
include "connection.php";
session_start();
if(isset($_SESSION['email'])){
 $email=$_SESSION['email'];
    $query_contact="select * from users where Email='$email'";
    $result_contact=mysqli_query($conn,$query_contact);
    while($row=mysqli_fetch_assoc($result_contact)){
        $admin_user_id=$row['User_id'];
    }
}    
if(isset($_POST['yes_approve'])){

    $noteid_approve = $_POST['noteid_approve'];
    $query_approve = mysqli_query($conn,"UPDATE sellernote SET Status=11,ActionedBy=$admin_user_id WHERE Seller_Note_id=$noteid_approve");
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
    
    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>
    <script type="text/javascript">
    function rejectednotes(){
        var search_rejected = $("#search_rejected").val();
        var seller = $("#seller").val();
     $.ajax({
        type : "GET",
        url : "AJAX/rejected-notes-ajax.php",
        data : 
        {
            search_rejected_data : search_rejected,
            seller_data : seller
        },
        success : function(data){
         $("#rejected_table_display").html(data);   
        }
    });
       
    } 
    $(document).ready(function(){
      rejectednotes();
    });    
    </script>

</head>

<body>
    <?php 
    include "admin-header.php";
    ?>
    <div class="bottom-footer">
        <section id="published-note">
            <div class="container dash-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 common-space">
                        <h4>Rejected Notes</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 common-space">

                        <div class="form-group">
                            <label for="seller">Seller</label>
                            <select id="seller" class="form-control arrow-down" onchange="rejectednotes()">
                               <option selected disabled>Select seller</option>
                                <?php 
                                $query_seller_name = "SELECT DISTINCT sellernote.Seller_id,users.FirstName,users.LastName FROM sellernote LEFT JOIN users ON sellernote.Seller_id=users.User_id WHERE sellernote.Status=7 AND sellernote.IsActive=1";
                                $result_seller_name = mysqli_query($conn,$query_seller_name);
                                
                                while($row=mysqli_fetch_assoc($result_seller_name)){
                                    $seller_fetch_fname = $row['FirstName'];
                                    $seller_fetch_lname = $row['LastName'];
                                    $seller_id = $row['Seller_id'];
                                    echo "<option value='$seller_id'>$seller_fetch_fname&nbsp;$seller_fetch_lname</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-6 common-space"><br>
                        <button type="submit" class="btn search-published" onclick="rejectednotes()">Search</button>
                        <input type="search" placeholder=' &#xf002   Search...' / id="search_rejected">
                    </div>
                </div>

               <div id="rejected_table_display"></div>
            </div>

        </section>
    </div>
    <!--footer-->
   <?php include "admin-footer.php";
    ?>
    <!--footer end-->




    <!--popper js-->
    <script src="javascript/popper.min.js"></script>

    <!--datatable js -->
    <script src="javascript/datatables.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
</body>

</html>