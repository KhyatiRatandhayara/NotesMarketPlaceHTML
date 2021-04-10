 <?php
include "../connection.php";

if (!empty(isset($_GET['search_data']))) {
    $search = $_GET['search_data'];
} else {
    $search = "";
}
if (!empty(isset($_GET['type_data']))) {
    $type = $_GET['type_data'];
} else {
    $type = "";
}

if (!empty(isset($_GET['category_data']))) {
    $category = $_GET['category_data'];
} else {
    $category = "";
}


if (!empty(isset($_GET['university_data']))) {
    $university = $_GET['university_data'];
} else {
    $university = "";
}

if (!empty(isset($_GET['course_data']))) {
    $course = $_GET['course_data'];
} else {
    $course = "";
}

if (!empty(isset($_GET['country_data']))) {
    $country = $_GET['country_data'];
} else {
    $country = "";
}
if (!empty(isset($_GET['rating_data']))) {
    $rating = $_GET['rating_data'];
} else {
    $rating = "";
}
echo $rating;

                $whereQuery = "";
                $query_fetch = "SELECT DISTINCT sellernote.Seller_Note_id,sellernote.Title,sellernote.Category,sellernote.NoteType,sellernote.UniversityName,sellernote.Course,sellernote.Country,sellernote.NumberofPages,sellernote.DisplayPicture,sellernote.PublishedDate FROM sellernote LEFT JOIN sellernotesreviews ON sellernote.Seller_Note_id=sellernotesreviews.Seller_note_id WHERE sellernote.IsActive=1 AND sellernote.Title LIKE '%$search%' AND sellernote.Status=11";
                
                if(!empty($type)) {
                $whereQuery .= " AND NoteType='$type'";
                }
                
                if(!empty($category)) {
                $whereQuery .= " AND Category='$category'";
                }
                
                if(!empty($university)) {
                $whereQuery .= " AND UniversityName='$university'";
                }                
                if(!empty($course)){
                $whereQuery .= " AND Course='$course'";
                }
                if(!empty($country)) {
                $whereQuery .= " AND Country='$country'";
                }
                if(!empty($rating)){
                 $whereQuery .= " AND Rating>'$rating'";   
                }
$limit = 6;
if(isset($_GET["page"])) {
$page = $_GET["page"];
}
else{
$page=1;
};
$start_from = ($page-1) * $limit;

                $filter_data = $query_fetch.$whereQuery;
                $filter_result = mysqli_query($conn,$filter_data);

                $count_total = mysqli_num_rows($filter_result);

$filter_pagination = $query_fetch.$whereQuery." LIMIT ". $start_from. ",". $limit;
$filter_result1 = mysqli_query($conn,$filter_pagination);


$pagination_result = mysqli_query($conn,"SELECT COUNT(Seller_Note_id) FROM sellernote WHERE IsActive=1 AND sellernote.Status=11 AND (Title LIKE '%$search%' AND sellernote.Category LIKE '%$category%' AND sellernote.NoteType LIKE '%$type%' and sellernote.UniversityName LIKE '%$university%' AND sellernote.Course LIKE '%$course%' AND sellernote.Country LIKE '%$country%')");

$row_db = mysqli_fetch_row($pagination_result);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
            
?>
       <section id="search-result">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Total <?php echo $count_total ?> notes</h3>
                </div>
            </div>
            <div class="row">
                
                    <?php
                    while($row=mysqli_fetch_assoc($filter_result1)){
                       $title = $row['Title'];
                       $pages = $row['NumberofPages'];
                       $institutename = $row['UniversityName'];
                        $publisheddate = $row['PublishedDate'];
                        $book_image = $row['DisplayPicture'];
                        $seller_note_id = $row['Seller_Note_id'];
                    ?>
                    <!-- first book-->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  
                  <?php 
                     echo "<a href='notedetails.php?id=$seller_note_id' style='text-decoration:none'>";   
                   echo "<img src='$book_image' alt='Book' class='img-fluid' style='width:600px;height:100x;'>";
                        ?>
                <div class="image-info">
                       <?php 
                        echo "<ul><li><h5>$title</h5></li></ul>";
                    ?>
                        <div class="icon">
                           
                            <img src="image/Search/university.png" alt="university">
                            <?php 
                        if(!empty($institutename)){
                          echo "<h6 class='result-data'>$institutename </h6>";  
                        }
                        else{
                            echo "<h6 class='result-data'>NULL</h6>";  
                        }
                            
                             ?>
                        </div>
                        <div class="icon">
                            <img src="image/Search/pages.png" alt="book">
                            <?php 
                           echo "<h6 class='result-data'>$pages pages</h6>";
                             ?>
                            
                        </div>
                        <div class="icon">
                            <img src="image/Search/calendar.png" alt="calendar">
                           <h6 class='result-data'><?php echo date('F Y', strtotime('$publisheddate')); ?></h6>
                        </div>
                        <div class="icon">
                            <img src="image/Search/flag.png" alt="flag">
                            <?php 
                            $query_report = mysqli_query($conn,"SELECT * FROM sellernotereportedissues WHERE Seller_note_id= $seller_note_id");
                            $report_count = mysqli_num_rows($query_report);
                        
                           if($report_count != 0){ ?>
                            <h6 class="result-red"><?php echo  $report_count ?> Users have marked this note as
                                inappropriate</h6>
                          <?php }
                           else{  ?> 
                           <h6 class="result-red">No Users have marked this note as
                                inappropriate</h6>
                          <?php }  ?>
                            
                        </div>
                     
                    <?php 
                        $avg_rate=0;
                    $query_avg=mysqli_query($conn,"SELECT AVG(Rating) FROM sellernotesreviews WHERE Seller_note_id=$seller_note_id");
                        while($row=mysqli_fetch_assoc($query_avg)){
                            $avg_rate = $row['AVG(Rating)'];
                        }
                      
                      $query_count = mysqli_query($conn,"SELECT * FROM sellernotesreviews WHERE Seller_note_id=$seller_note_id"); 
                      $total_count = mysqli_num_rows($query_count);
                       
                       
                    ?>
                        <div class="row">
                           <div class="col-md-6">
                            <div id="rate<?php echo $seller_note_id?>" start="<?php echo $avg_rate ?>"></div></div>
                            
                            <?php if($avg_rate !=0){ ?>
                            <script>
                            $('#rate<?php echo $seller_note_id?>').jsRapStar({
                                length: 5,
                                value: <?php echo $avg_rate ?>,
                                enabled: false
                                
                            });
                            </script>
                           <?php  }
                            else{ ?>
                            <script>
                            $('#rate<?php echo $seller_note_id?>').jsRapStar({
                                length: 5,
                                value: 0,
                                enabled: false
                                
                            });
                            </script>
                          <?php } ?>
                            
                       <div class="col-md-6">
                       <?php 
                       if($total_count != 0){ ?>
                       
                       <h6 class="review-123" style="margin-top:15px"><?php echo $total_count ?> Reviews</h6></div>
                       <?php  } 
                       else{ ?>
                       <h6 class="review-123" style="margin-top:15px">No Reviews</h6></div>
                       <?php  } ?>
                        
                        </div>
                    </div>
                  <?php echo "</a>" ?>
                </div>
               <?php  } 
                ?>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                   
                    <ul class='pagination justify-content-center'>
                    <?php
                    echo "<li class='page-item' style='list-style:none'><a onclick='searchclick(".($page-1).")' class='page-link'>❮</a></li>"; 

                    for($i=1; $i<=$total_pages; $i++) {
                        
                        if($i==$page){
                        echo "<li class='page-item active'><a class='page-link' onclick='searchclick(".$i.")'>".$i."</a></li>"; 
                        }
                        else{
                          echo "<li class='page-item' style='list-style:none'><a class='page-link' onclick='searchclick(".$i.")'>".$i."</a></li>";  
                        }
                             }
                    echo "<li class='page-item'><a onclick='searchclick(".($page+1).")' class='page-link'>❯</a></li>";
                         ?>
                     </ul>
                </div>
            </div>
       
    </section>