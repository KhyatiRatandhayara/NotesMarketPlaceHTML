<?php
include "connection.php";

if(isset($_GET['userid'])){
   $userid = $_GET['userid']; 
}
else{
   $userid = ''; 
}

if(isset($_GET['noteid'])){
   $noteid = $_GET['noteid']; 
}
else{
   $noteid = ''; 
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
    function downloadednotes(){
    var search_downloaded = $("#search_downloaded").val();
    var seller = $("#seller").val();
    var buyer = $("#buyer").val();
    var note = $("#note").val(); 
    var getid = '<?php echo $userid ?>'; 
    var noteid = '<?php echo $noteid ?>';    
      $.ajax({
    
    type : "GET",
    url : "AJAX/downloaded-notes-ajax.php",
    data :
    {   
    search_downloaded_data : search_downloaded,
    seller_data : seller,
    buyer_data : buyer,
    note_data : note,
    member_data : getid,
    note_get_data : noteid    
    },
    success : function(data){
        $("#downloaded_table_display").html(data);
    }    
        
    });       
    }
    $(document).ready(function(){
      downloadednotes();  
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
                        <h4>Downloaded Notes</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-2 col-md-2 col-sm-4 col-12 common-space">

                        <div class="form-group">
                            <label for="note">Note</label>
                            <select id="note" class="form-control arrow-down" onchange="downloadednotes()">
                               <option selected disabled>Select note</option>
                                <?php
                                $query_note = "SELECT  DISTINCT NoteTitle FROM downloads WHERE SellerAllowedDownload=1";
                                $result_note = mysqli_query($conn,$query_note);
                                while($row=mysqli_fetch_assoc($result_note)){
                                    $note_title = $row['NoteTitle'];
                                   
                                echo "<option value='$note_title'>$note_title</option>";    
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-12">
                        <div class="form-group sb-padding">
                            <label for="seller">Seller</label>
                            <select id="seller" class="form-control arrow-down" onchange="downloadednotes()">
                              <option selected disabled>Select seller</option>
                               <?php 
                                $query_seller_name = "SELECT DISTINCT downloads.Seller,users.FirstName,users.LastName FROM downloads LEFT JOIN users ON downloads.Seller=users.User_id WHERE SellerAllowedDownload=1";
                                $result_seller_name = mysqli_query($conn,$query_seller_name);
                                
                                while($row=mysqli_fetch_assoc($result_seller_name)){
                                    $seller_fetch_fname = $row['FirstName'];
                                    $seller_fetch_lname = $row['LastName'];
                                    $seller_id = $row['Seller'];
                                    echo "<option value='$seller_id'>$seller_fetch_fname&nbsp;$seller_fetch_lname</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-12">
                        <div class="form-group sb-padding">
                            <label for="buyer">Buyer</label>
                            <select id="buyer" class="form-control arrow-down" onchange="downloadednotes()">
                             <option selected disabled>Select buyer</option>
                              <?php 
                                $query_buyer_name = "SELECT DISTINCT downloads.Downloaders,users.FirstName,users.LastName FROM downloads LEFT JOIN users ON downloads.Downloaders=users.User_id WHERE SellerAllowedDownload=1";
                                $result_buyer_name = mysqli_query($conn,$query_buyer_name);
                                
                                while($row=mysqli_fetch_assoc($result_buyer_name)){
                                    $buyer_fetch_fname = $row['FirstName'];
                                    $buyer_fetch_lname = $row['LastName'];
                                    $buyer_id = $row['Downloaders'];
                                    echo "<option value='$buyer_id'>$buyer_fetch_fname&nbsp;$buyer_fetch_lname</option>";
                                }
                                ?>  
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 common-space"><br>
                        <button type="submit" class="btn search-published" onclick="downloadednotes();">Search</button>
                        <input type="search" placeholder=' &#xf002   Search...' id="search_downloaded" />
                    </div>
                </div>
                
            <div id="downloaded_table_display"></div>
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

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>