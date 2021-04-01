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
        <section id="members">
            <div class="container">
                <div class="row member-space">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <h4>Spam Reports</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <button class="btn btn-members">Search</button>
                        <input type="text" placeholder=' &#xf002   Search...' />
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width spam-report-table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">REPORTED BY</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">DATE EDITED</th>
                                    <th scope="col">REMARK</th>
                                    <th scope="col">ACTION</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>khyati patel</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>lorem ipsum is simply a dummy text</td>
                                    <td><img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>Raj Shah</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>lorem ipsum is simply a dummy text</td>
                                    <td><img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>3</td>
                                    <td>khyati Shah</td>
                                    <td>homan body</td>
                                    <td>IT</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>lorem ipsum is simply a dummy text</td>
                                    <td><img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>4</td>
                                    <td>Rahul patel</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>lorem ipsum is simply a dummy text</td>
                                    <td><img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>5</td>
                                    <td>khyati patel</td>
                                    <td>Software Development</td>
                                    <td>CE</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>lorem ipsum is simply a dummy text</td>
                                    <td><img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="image/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
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