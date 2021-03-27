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
        <section id="dashboard">
            <div class="container dash-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 common-space">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                <div class="row box-margin">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 dashboard-border">
                        <h5 class="text-center">20</h5>
                        <p class="text-center">Number of Notes in Review for Publish</p>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 dashboard-border">
                        <h5 class="text-center">103</h5>
                        <p class="text-center">Number of New Notes Downloaded(Last 7 days)</p>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 dashboard-border-2">
                        <h5 class="text-center">223</h5>
                        <p class="text-center">Number of New Registrations(Last 7 days)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-12 col-12  common-space">
                        <h3>Published Notes</h3>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12 col-12 dash-public-space common-space">

                        <form class="form-inline pull-right pub-left">
                            <input type="text" placeholder=' &#xF002;  Search' class="mr-2" />
                            <button class="btn btn-dashboard mr-2">Search</button>
                            <select class="arrow-down mr-2 margin-select">
                                <option selected>Select Month</option>
                                <option>Jan</option>
                                <option>Feb</option>
                                <option>Mar</option>
                                <option>Apr</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>Aug</option>
                                <option>Sept</option>
                                <option>Oct</option>
                                <option>Nov</option>
                                <option>Dec</option>
                            </select>
                        </form>

                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-5 text-center dashboard-table">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">ATTACHMENT SIZE</th>
                                    <th scope="col">SELL TYPE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">PUBLISHER</th>
                                    <th scope="col">PUBLISHED DATE</th>
                                    <th scope="col">NUMBER OF DOWNLOADS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>10 KB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Pritesh Panchal</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>10 KB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Pritesh Panchal</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>10 KB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Pritesh Panchal</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>10 KB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Pritesh Panchal</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>10 KB</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>Pritesh Panchal</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
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