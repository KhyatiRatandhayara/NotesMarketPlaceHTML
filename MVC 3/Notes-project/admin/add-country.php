<?php 
include "connection.php";
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $query_email = mysqli_query($conn,"SELECT * FROM users WHERE Email='$email'");
    while($row=mysqli_fetch_assoc($query_email)){
       $admin_user_id = $row['User_id']; 
    
    }
}
$country_name = " ";
$country_code = " ";
if(isset($_POST['submit'])){
    $country = $_POST['country'];
    $country_code = $_POST['countrycode'];
    
    $query = mysqli_query($conn,"INSERT INTO countries(CountryName,CountryCode,CreatedDate,CreatedBy,ModifiedDate,IsActive) VALUES('$country','$country_code',NOW(),$admin_user_id,NOW(),1)");
}
if(isset($_GET['countryid'])){
    $country_id = $_GET['countryid'];
    $query_country = mysqli_query($conn,"SELECT * FROM countries WHERE Country_id=$country_id");
    while($row=mysqli_fetch_assoc($query_country)){
        $country_name = $row['CountryName'];
        $country_code = $row['CountryCode'];
    }
    if(isset($_POST['submit'])){
      $country = $_POST['country'];
    $country_code = $_POST['countrycode'];
        $query_update = mysqli_query($conn,"UPDATE countries SET CountryName='$country',CountryCode=$country_code WHERE Country_id=$country_id");
        header("Refresh:0;");
    }
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

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
   <?php 
    include "admin-header.php";
    ?>
    <form method="post">
    <div class="bottom-footer">
        <section id="add-country">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Add Country</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="country" placeholder="Enter your country" name="country" value="<?php echo $country_name ?>">
                        </div>
                        <div class="form-group">
                            <label for="country-code">Country Code<span class="required">*</span></label>
                            <input type="text" class="form-control" id="country-code" placeholder="Enter your country code" name="countrycode" value="<?php echo $country_code ?>">
                        </div>
                    </div>
                </div>

                <button class="btn btn-add-country" name="submit">SUBMIT</button>

            </div>
        </section>
    </div>
   </form>
    <!--footer-->
    <?php include "admin-footer.php";
    ?>
    <!--footer end-->



    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>