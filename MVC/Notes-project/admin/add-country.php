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
                            <input type="text" class="form-control" id="country" placeholder="Enter your country" required>
                        </div>
                        <div class="form-group">
                            <label for="country-code">Country Code<span class="required">*</span></label>
                            <input type="text" class="form-control" id="country-code" placeholder="Enter your country code" required>
                        </div>
                    </div>
                </div>

                <button class="btn btn-add-country">SUBMIT</button>

            </div>
        </section>
    </div>

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