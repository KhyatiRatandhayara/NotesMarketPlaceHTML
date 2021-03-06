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
  <?php
    include "header.php";
    ?>
    <!--header end-->

    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 common-space">
                    <h3>Dashboard</h3>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 earning-border">
                            <img src="image/Dashboard/earning-icon.svg" alt="earning">
                            <h5>My Earning</h5>
                        </div>

                        <div class="col-lg-4  col-md-4 col-sm-4 text-center dashboard-border-1">
                            <h5>100</h5>
                            <p>Number Of Notes Sold</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 text-center dashboard-border-2">
                            <h5>$10,00,000</h5>
                            <p>Money Earned</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">


                </div>
            </div>
        </div>
    </section>
    <section class="dashboard-details">
        <div class="container dash-space">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <h5>In Progress Note</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <button type="button" class="btn">Search</button>
                    <input type="text" placeholder=' &#xf002   Search...' />
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border dash-radius common-table-width-2 text-center">
                        <thead>
                            <tr>
                                <th scope="col">ADDED NOTE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09-10-2020</td>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>Draft</td>
                                <td>
                                    <img src="image/Dashboard/edit.png" alt="edit">
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>10-10-2020</td>
                                <td>Account</td>
                                <td>Commerce</td>
                                <td>In Review</td>
                                <td><img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>11-10-2020</td>
                                <td>Social Studied</td>
                                <td>Social</td>
                                <td>Submitted</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>12-10-2020</td>
                                <td>AI</td>
                                <td>IT</td>
                                <td>Submitted</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>13-10-2020</td>
                                <td>Lorem ipsup dolor sit ametsectetur</td>
                                <td>lorem</td>
                                <td>Draft</td>
                                <td>
                                    <img src="image/Dashboard/edit.png" alt="edit">
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
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
    <section class="dashboard-details">
        <div class="container dash-space">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <h5>Published Note</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <button type="button" class="btn">Search</button>
                    <input type="text" placeholder=' &#xf002   Search...' />
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border common-table-width-2 text-center">
                        <thead>
                            <tr>
                                <th scope="col">ADDED NOTE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09-10-2020</td>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>Paid</td>
                                <td>$575</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>10-10-2020</td>
                                <td>Account</td>
                                <td>Commerce</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td><img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>11-10-2020</td>
                                <td>Social Studied</td>
                                <td>Social</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>12-10-2020</td>
                                <td>AI</td>
                                <td>IT</td>
                                <td>Paid</td>
                                <td>$3542</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>13-10-2020</td>
                                <td>Lorem ipsup dolor sit ametsectetur</td>
                                <td>lorem</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
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

    <?php
    include "footer.php";
    ?>



    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>
</body>

</html>