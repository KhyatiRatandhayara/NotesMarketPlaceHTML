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
        <section id="member-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Member Details</h3>
                    </div>
                </div>
                <div class="row member-bottom-border">
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                        <img src="image/notedetails/member.png" alt="richard">
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
                                <h4 class="member-info-ans">Richard</h4>
                                <h4 class="member-info-ans">Brown</h4>
                                <h4 class="member-info-ans">richardbrown123@gmail.com</h4>
                                <h4 class="member-info-ans">13-08-1990</h4>
                                <h4 class="member-info-ans">9876544916</h4>
                                <h4 class="member-info-ans">University of California</h4>
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
                                <h4 class="member-info-ans">144-Diamond Height</h4>
                                <h4 class="member-info-ans">Star Colony</h4>
                                <h4 class="member-info-ans">New York</h4>
                                <h4 class="member-info-ans">New York State</h4>
                                <h4 class="member-info-ans">United State</h4>
                                <h4 class="member-info-ans">11004-05</h4>
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
                        <table class="table border common-table-width-5 member-table">
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
                                <tr>
                                    <td>1</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>02-10-2020,10:10</td>
                                    <td>04-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>08-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>05-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>World War 2</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$17</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="row pagination-space">
                <div class="col-md-12">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <span class="page-link">❮</span>
                            </li>

                            <li class="page-item active" aria-current="page">
                                <span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">❯</a>
                            </li>
                        </ul>
                    </nav>
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

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>