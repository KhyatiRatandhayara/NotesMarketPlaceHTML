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
        <section id="administrator">
            <div class="container dash-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 common-space">
                        <h4>Manage Type</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <button class="btn btn-admin">ADD TYPE</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 common-space">
                        <button type="button" class="btn search-admin">Search</button>
                        <input type="text" placeholder=' &#xf002   Search...' />
                    </div>
                </div>


                <div class="row">
                    <div class="table-responsive">
                        <table class="table border common-table-width-2 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">ADDED BY</th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>val 1</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>02-10-2020,10:10</td>
                                    <td>Khyati Patel</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="image/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>val 2</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Rahul Patel</td>
                                    <td>No</td>
                                    <td>
                                        <img src="image/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>val 3</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>01-10-2020,10:10</td>
                                    <td>Rahul Shah</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="image/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>val 4</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Raj Sheth</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="image/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="image/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>val 5</td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>06-10-2020,10:10</td>
                                    <td>Ridhdhi Patel</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="image/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="image/administrator/delete.png" alt="delete">
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






    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!---script js---->
    <script src="javascript/script.js"></script>
</body>

</html>