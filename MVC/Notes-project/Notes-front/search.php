<html>

<head>
    <meta charset="utf-8">
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

    <!--search-page-->
    <?php
    include "header.php";
    ?>

    <!--header end-->
    <section id="search-Notes">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3>Search Notes</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="search-box">
        <div class="container">
            <div class="row">

                <h4>Search and Filter Notes</h4>

            </div>
        </div>
    </section>
    <section id="search-box-01">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" placeholder=' &#xf002   Search Notes here...' />
                </div>

            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down">
                        <option selected disabled>Select type</option>
                        <option>Handwritten notes</option>
                        <option>University notes</option>
                        <option>Notebook</option>
                         <option>Novel</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down">
                        <option selected>Select category</option>
                        <option>IT</option>
                        <option>CA</option>
                        <option>CS</option>
                          <option>MBA</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down">
                        <option selected>Select university</option>
                        <option>..</option>
                        <option>..</option>
                        <option>..</option>
                    </select>

                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down">
                        <option selected>Select course</option>
                        <option>..</option>
                        <option>..</option>
                        <option>..</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down">
                        <option selected>Select country</option>
                        <option>..</option>
                        <option>..</option>
                        <option>..</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down">
                        <option selected>Select rating</option>
                        <option>1+</option>
                        <option>2+</option>
                        <option>3+</option>
                        <option>4+</option>
                        
                    </select>
                </div>

            </div>

        </div>
    </section>
    <section id="search-result">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Total 18 notes</h3>
                </div>
            </div>
            <div class="row">
             
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                    <!-- first book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/1.jpg" alt="Book" class="img-fluid">
                    </a>
                    <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                    </div>
                    </a>
                </div>
                 
                  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- first book-->
                     <a href='notedetails.php'>
                    <img src="image/Search/2.jpg" alt="Book" class="img-fluid search-boarder">
                      </a>
                      <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate4">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                    </div>
                      </a>




                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- first book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/3.jpg" alt="Book" class="img-fluid search-boarder">
                    </a>
                     <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">
                      
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate7">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                       
                    </div>
                     </a>




                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- second book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/4.jpg" alt="Book" class="img-fluid search-boarder">
                    </a>
                    <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">

                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate2">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>

                    </div>
                    </a>
                    

                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- second book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/5.jpg" alt="Book" class="img-fluid search-boarder">
                    </a>
                    <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate5">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                    </div>
                    </a>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- second book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/6.jpg" alt="Book" class="img-fluid search-boarder">
                    </a>
                    <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate8">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- third book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/1.jpg" alt="Book" class="img-fluid search-boarder">
                    </a>
                    <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate3">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- third book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/2.jpg" alt="Book" class="img-fluid search-boarder">
                    </a>
                    <a href='notedetails.php' style="text-decoration:none">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate6">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                    </div>
                    </a>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- third book-->
                    <a href='notedetails.php'>
                    <img src="image/Search/3.jpg" alt="Book" class="img-fluid search-boarder">
                    </a>
                     <a href='notedetails.php' style="text-decoration:none">                   
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="icon">
                            <img src="image/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate9">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6 class="review-123">123 reviews</h6>
                    </div>
                    </a>
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
     <?php
    include "footer.php";
    ?>



    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>