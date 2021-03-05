<html>

<head>
    <meta charset="utf-8">
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
    <!--note details-->
    <section class="bottom-footer">
        <section id="note-details">
            <div class="container line">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Notes Details</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-5 col-12">
                                <img src="image/notedetails/1.jpg" alt="book" class="img-fluid" style="height: 300px">
                            </div>
                            <div class="col-md-7 col-12">
                                <h4>Computer Science</h4>
                                <p><span>Sciences</span></p>
                                <p id="details">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus quas, placeat suscipit vitae tempore distinctio repudiandae sunt ut non, tenetur rem voluptates et, veritatis minus esse at iusto blanditiis harum.</p>
                                <button type="button" class="btn btn-note-details" data-toggle="modal" data-target="#exampleModal">DOWNLOAD/$15</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row">

                            <div class="col-md-6 col-6">
                                <div class="user-note-details">
                                    <p>Institute:</p>
                                    <p>Country:</p>
                                    <p>Course Name:</p>
                                    <p>Course Code:</p>
                                    <p>Professor:</p>
                                    <p>Number Of Pages:</p>
                                    <p>Approved Date:</p>
                                    <p>Rating:</p><br>
                                </div>

                            </div>

                            <div class="col-md-6 col-6">
                                <div class="user-note-details-ans">
                                    <p>University Of California</p>
                                    <p>United States</p>
                                    <p>Computer Engineering</p>
                                    <p>242705</p>
                                    <p>Mr.Richard Brown</p>
                                    <p>277</p>
                                    <p>25 November 2020</p>
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
                                    <p id="p-review">100 Reviews</p>
                                </div>

                            </div>

                        </div>
                        <div class="row red">
                            <span>5 User Marked this note as inappropriate</span>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <section id="notes-preview">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">

                        <h5>Notes Preview</h5>
                        <!-- responsive iframe -->
                        <!-- ============== -->

                        <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                            <div class="responsive-wrapper 
     responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                                <iframe src="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">
                                    <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                                            An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
                                </iframe>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5>Customer Reviews</h5>

                        <div class="container review-box">
                            <div class="row box">
                                <div class="col-md-2">
                                    <img src="image/notedetails/reviewer-1.png" class="img-fluid rounded-circle" alt="user">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-10">
                                            <h6>Richard Brown</h6>
                                            <div class="rate1 rate-space">
                                                <div class="rate"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-2">
                                            <img src="image/administrator/delete.png" alt="delete">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem optio, ullam dolor iure hic laboriosam tempora quae, vero incidunt, quia illum deleniti, asperiores.</p>
                                </div>
                            </div>
                            <div class="row box">
                                <div class="col-md-2">
                                    <img src="image/notedetails/reviewer-2.png" class="img-fluid rounded-circle" alt="user">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-10">
                                            <h6>Alice Ortiaz</h6>
                                            <div class="rate1 rate-space">
                                                <div class="rate"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-2">
                                            <img src="image/administrator/delete.png" alt="delete">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem optio, ullam dolor iure hic laboriosam tempora quae, vero incidunt, quia illum deleniti, asperiores.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="image/notedetails/reviewer-3.png" class="img-fluid rounded-circle" alt="user">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-10">
                                            <h6>Sara Passmore</h6>
                                            <div class="rate1 rate-space">
                                                <div class="rate"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-2">
                                            <img src="image/administrator/delete.png" alt="delete">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem optio, ullam dolor iure hic laboriosam tempora quae, vero incidunt, quia illum deleniti, asperiores.</p>
                                </div>
                            </div>
                        </div><br>

                    </div>
                </div>

            </div>
        </section>


    </section>
    <!--footer-->
    <?php include "admin-footer.php";
    ?>
    <!--footer end-->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-body">
                    <div class="tnx">

                        <img src="image/SUCCESS.png" alt="success">
                        <h4>Thank you for Purchasing!</h4>
                        <p><b>Dear Smith,</b></p>
                        <p>As this is paid notes-you need to pay to seller Rahil shah offline.We will send him an email that you want to download this note.He may contact you further for payment process completion.</p>
                        <p>In case you have urgancy, <br>Please Contact us on +919875489876.</p>
                        <p>Once he receives the payment and acknowledge us-selected notes you can see over my download tab for download.</p>
                        <p>Have a good day.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>