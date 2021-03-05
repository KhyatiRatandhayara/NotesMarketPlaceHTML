<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">


    <title>Notes MarketPlace</title>

    <!--favicon-->
    <link rel="shortcut icon" href="image/home/favicon.ico">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--font Awesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--Responsive tabs css-->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <!--user-profile-->
  <?php
    include "header.php";
    ?>

    <!--header end-->
    <section id="userprofile">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>User Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="u-profile1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>Basic Profile Details</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="fn"> First Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="fn" placeholder="Enter your first name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email<span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control arrow-down">
                            <option selected>select your gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Profile Picture</label>
                        <div class="picture">
                            <label for="file-input">
                                <img src="image/Add-notes/upload-file.png">
                            </label>
                            <input id="file-input" type="file">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ln"> Last Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="ln" placeholder="Enter your last name" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" class="form-control" id="dob" placeholder="Enter Your Date Of Birth">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-5">
                            <div class="form-group">
                                <label for="phone">Phone No.</label>
                                <select id="phone" class="form-control arrow-down">
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
                                <input type="tel" class="form-control" id="phone" placeholder="phone no.">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section id="u-profile2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>Address Details</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="al1">Address Line 1<span class="required">*</span></label>
                        <input type="text" class="form-control" id="al1" placeholder="Enter your Address" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City<span class="required">*</span></label>
                        <input type="text" class="form-control" id="city" placeholder="Enter Your City" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">ZipCode<span class="required">*</span></label>
                        <input type="text" class="form-control" id="zip" placeholder="Enter Your Zipcode" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="al2">Address Line 2</label>
                        <input type="text" class="form-control" id="al2" placeholder="Enter your Address">
                    </div>
                    <div class="form-group">
                        <label for="state">State<span class="required">*</span></label>
                        <input type="text" class="form-control" id="state" placeholder="Enter Your State">
                    </div>
                    <div class="form-group">
                        <label for="country">Country<span class="required">*</span></label>
                        <input type="text" class="form-control" id="country" placeholder="Enter Your Country">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="u-profile3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>University and College information</span></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="university">University</label>
                        <input type="text" class="form-control" id="university" placeholder="Enter your university">
                    </div>


                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="college">College</label>
                        <input type="text" class="form-control" id="college" placeholder="Enter your college">
                    </div>
                </div>
                <div class="col-md-12">

                    <button type="submit" class="btn btn-user-profile">SUBMIT</button>
                </div>
            </div>
        </div>
    </section>


    <?php
    include "footer.php";
    ?>


    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
</body>

</html>