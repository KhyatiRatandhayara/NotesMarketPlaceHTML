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

if(isset($_POST['yes-inreview'])){
    $noteid_inreview = $_POST['noteid_inreview'];
    $query_inreview = mysqli_query($conn,"UPDATE sellernote SET Status=5,ActionedBy=$admin_user_id WHERE Seller_Note_id=$noteid_inreview");
}
if(isset($_POST['yes_approve'])){
    $noteid_approve = $_POST['noteid_approve'];
    $query_approve = mysqli_query($conn,"UPDATE sellernote SET Status=11,ActionedBy=$admin_user_id WHERE Seller_Note_id=$noteid_approve");
} 
if(isset($_POST['rejectbtn'])){
   $noteid_reject = $_POST['noteid_rejected']; 
   $remark = $_POST['remarks'];
    $query_reject = mysqli_query($conn,"UPDATE sellernote SET Status=7,ActionedBy=$admin_user_id,AdminRemarks='$remark' WHERE Seller_Note_id=$noteid_reject");
}
if(isset($_GET['userid'])){
   $userid = $_GET['userid']; 
}
else{
   $userid = ''; 
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
    function noteunderreview(){
         var searchreview = $("#searchreview").val();
         var seller = $("#seller").val();
         var getid = '<?php echo $userid ?>';
      
        $.ajax({
            type : "GET",
            url : "AJAX/notes-under-review-ajax.php",
            data : 
            {
            searchreview_data : searchreview,
            seller_data : seller,
            member_data : getid    
           
            },
            success : function(data){
                $("#under-review-display").html(data);
            }
        });
    }    
  
        </script>
    <script>
     $(document).ready(function(){
       noteunderreview();
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
                        <h4>Notes Under Review</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-2 col-md-2 col-sm-4 col-6 common-space">

                        <div class="form-group">
                            <label for="seller">Seller</label>
                            <select id="seller" class="form-control arrow-down" onchange="noteunderreview();">
                              <option selected disabled>Select seller</option>
                               <?php 
                                $query_seller_name = "SELECT DISTINCT sellernote.Seller_id,users.FirstName,users.LastName FROM sellernote LEFT JOIN users ON sellernote.Seller_id=users.User_id WHERE (sellernote.Status=4 OR sellernote.Status=5) AND sellernote.IsActive=1";
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
                        <button type="submit" name="search" class="btn search-published" onclick="noteunderreview();">Search</button>
                        <input type="search" placeholder=' &#xf002   Search...' id="searchreview" />
                    </div>
                </div>

                 <div id="under-review-display"></div>
                
            </div>
        </section>
    </div>
<?php
  
?>    

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

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>