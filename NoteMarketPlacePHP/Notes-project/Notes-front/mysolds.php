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
    <section id="my-downloads">
        <div class="container dash-space">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <h4>My Sold Notes</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                    <button type="button" class="btn">Search</button>
                    <input type="text" placeholder=' &#xf002   Search...' />
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border common-table-width-3 text-center mysold-table">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">NOTE TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">BUYER</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DOWNLOADED DATE/TIME</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>testing123@gmail.com</td>
                                <td>Paid</td>
                                <td>$150</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Accounts</td>
                                <td>Commerce</td>
                                <td>testing123@gmail.com</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td><img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Social Studies</td>
                                <td>Social</td>
                                <td>testing123@gmail.com</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>AI</td>
                                <td>IT</td>
                                <td>testing123@gmail.com</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>testing123@gmail.com</td>
                                <td>Paid</td>
                                <td>$150</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Accounts</td>
                                <td>Commerce</td>
                                <td>testing123@gmail.com</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td><img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Social Studies</td>
                                <td>Social</td>
                                <td>testing123@gmail.com</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="view">
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>AI</td>
                                <td>IT</td>
                                <td>testing123@gmail.com</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>testing123@gmail.com</td>
                                <td>Paid</td>
                                <td>$150</td>
                                <td>27 Nov 2020,11:24:34</td>
                                <td>
                                    <img src="image/Dashboard/eye.png" alt="eye">
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Accounts</td>
                                <td>Commerce</td>
                                <td>testing123@gmail.com</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>27 Nov 2020,11:24:34</td>

                                <td><img src="image/Dashboard/eye.png" alt="view">
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