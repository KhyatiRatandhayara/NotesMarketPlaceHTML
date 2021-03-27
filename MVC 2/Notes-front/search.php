<?php 
include "connection.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">


    <title>Notes MarketPlace</title>

    <!--favicon-->
    <link rel="shortcut icon" href="image/home/favicon.ico">
    
    <!--custom jquery-->
    <script src="javascript/jquery.min.js"></script>

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--font Awesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
     <!--star js-->
    <script src="javascript/jsRapStar.js"></script>
    
    <!--star css-->
   <link rel="stylesheet" href="css/jsRapStar.css">
    
    <!--Responsive tabs css-->
    <link rel="stylesheet" href="css/responsive.css">
   
     <script type="text/javascript">
          function searchclick(page){
           var searchtext = $("#searchtext").val();
           var typetext = $("#type").val();
           var categorytext = $("#category").val();
           var universitytext = $("#university").val();
           var coursetext = $("#course").val();
           var countrytext = $("#country").val();
           var ratingtext = $("#rating").val();
          $.ajax({
             type : "GET", 
             url : "AJAX/search_ajax.php",
             data :
              {
              search_data : searchtext,
              type_data : typetext,
              category_data : categorytext,
              university_data : universitytext,
              course_data : coursetext,
              country_data : countrytext,
              rating_data : ratingtext,
               page: page      
          },
            success: function (data) {
                $("#search_data_display").html(data);
            }
              
          });
       }
         
       $(document).ready(function(){
         searchclick(1);  
    });  
     </script>     

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
                    <input type="text"  name="searchtext" id="searchtext" onkeyup="searchclick()" placeholder=' &#xf002   Search Notes here...' />
                </div>

            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down" onchange="searchclick()" name="type" id="type">
                        
                         <?php 
                        echo "<option selected disabled>Select type</option>";
                          $query_type = "select * from note_type";
                           $result_type = mysqli_query($conn, $query_type);
                            while($row = mysqli_fetch_assoc($result_type)){
                            $type_id = $row['Type_id'];
                            $type_name = $row['Name'];
                            echo "<option value='$type_id'>$type_name</option>";
                           }
                        ?>
                    </select>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down" onchange="searchclick()" name="category" id="category">
                        
                        <?php
                        echo "<option selected disabled>Select category</option>";
                         $query_category = "select * from note_categories";
                           $result_category = mysqli_query($conn, $query_category);
                              
                           while($row = mysqli_fetch_assoc($result_category)){
                            $category_id = $row['Category_id'];
                            $category_name = $row['Name'];
                            echo "<option value='$category_id'>$category_name</option>";
                           }
                         ?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down" onchange="searchclick()" name="university" id="university">
                        <?php
                        echo "<option selected disabled>Select university</option>";
                        $query_university = "SELECT DISTINCT UniversityName FROM sellernote";
                        $result_university =mysqli_query($conn,$query_university);
                        while($row=mysqli_fetch_assoc($result_university)){
                        
                        $university_name = $row['UniversityName'];
                        if(!empty($university_name) &&  $university_name!= ""){
                          echo "<option value='$university_name'>$university_name</option>";   
                        }    
                        }    
                        ?>
                    </select>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down" onchange="searchclick()" name="course" id="course">
                        <?php
                        echo "<option selected disabled>Select course</option>";
                        $query_course = "SELECT DISTINCT Course FROM sellernote";
                        $result_course =mysqli_query($conn,$query_course);
                        while($row=mysqli_fetch_assoc($result_course)){
                            
                            $course_name = $row['Course'];
                            if(!empty($course_name) && $course_name!= ""){
                              echo "<option value='$course_name'>$course_name</option>";   
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down" onchange="searchclick()" name="country" id="country">
                       <?php
                       echo "<option selected disabled>Select country</option>";
                        $query_country = "select * from countries";
                               $result_country = mysqli_query($conn, $query_country);
                               while($row = mysqli_fetch_assoc($result_country)){
                               $country_id = $row['Country_id'];
                               $country_name = $row['CountryName'];
                               echo "<option value='$country_id'>$country_name</option>";
                               }
                         ?>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control filter arrow-down" id="rating" onchange="searchclick()" name="rating">
                        <option selected disabled>Select rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        
                    </select>
                </div>

            </div>

        </div>
    </section>
    <div id="search_data_display"></div>
    
   
     <?php
    include "footer.php";
    ?>



    

    <!--bootstrap-->
    <script src="javascript/bootstrap/bootstrap.min.js"></script>

    <!--script js-->
    <script src="javascript/script.js"></script>
</body>

</html>