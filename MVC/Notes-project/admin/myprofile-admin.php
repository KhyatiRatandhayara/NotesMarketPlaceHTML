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
        <section id="my-profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4>My Profile</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="fn"> First Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="fn" placeholder="Enter your first name" required>
                        </div>
                        <div class="form-group">
                            <label for="ln"> Last Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="ln" placeholder="Enter your last name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Secondary Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-5">
                                <div class="form-group">
                                    <label for="phone">Phone No.</label>
                                    <select id="phone" class="form-control  arrow-down">
                                        <option selected>+91</option>
                                        <option>..</option>
                                        <option>..</option>
                                        <option>..</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-7">
                                <div class="form-group">
                                    <label for="phone"><br></label>
                                    <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Profile Picture</label>
                            <div class="picture-2">
                                <label for="file-input">
                                    <img src="image/myprofile/upload-file.png">
                                </label>
                                <input id="file-input" type="file">
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6"></div>

                </div>

                <button class="btn btn-profile">SUBMIT</button>
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