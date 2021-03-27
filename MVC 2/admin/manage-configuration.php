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
        <section id="config">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4>Manage System Configuration</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="email">Support emails address<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Support phone number<span class="required">*</span></label>
                            <input type="tel" class="form-control" id="phone" placeholder="enter phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Emails Address(es) (for various events system will send notifications to these userd)<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook URL</label>
                            <input type="text" class="form-control" id="facebook" placeholder="Enter facebook url">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter URL</label>
                            <input type="text" class="form-control" id="twitter" placeholder="Enter twitter url">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linkedin URL</label>
                            <input type="text" class="form-control" id="linkedin" placeholder="Enter linkedin url">
                        </div>

                        <div class="form-group">
                            <label>Default image for notes(if seller do not upload)</label>
                            <div class="picture-2">
                                <label for="file-input">
                                    <img src="image/myprofile/upload-file.png">
                                </label>
                                <input id="file-input" type="file">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Default Profile Picture(if seller do not upload)</label>
                            <div class="picture-2">
                                <label for="file-input">
                                    <img src="image/myprofile/upload-file.png">
                                </label>
                                <input id="file-input" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row btn-config-space">
                    <button class="btn btn-config">SUBMIT</button>
                </div>

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