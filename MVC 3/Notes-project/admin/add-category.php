<?php 
include "connection.php";
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $query_email = mysqli_query($conn,"SELECT * FROM users WHERE Email='$email'");
    while($row=mysqli_fetch_assoc($query_email)){
       $admin_user_id = $row['User_id']; 
    
    }
}
$category_name = " ";
$description = " ";


if(isset($_GET['categoryid'])){
    $categoryid = $_GET['categoryid'];
    $query_category = mysqli_query($conn,"SELECT * FROM note_categories WHERE Category_id=$categoryid");
    while($row=mysqli_fetch_assoc($query_category)){
        $category_name = $row['Name'];
        $description = $row['Description'];
    }
    if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $category_description = $_POST['category_description'];  
    
        $query_update = mysqli_query($conn,"UPDATE note_categories SET Name='$category',Description='$category_description' WHERE Category_id=$categoryid");
        header("Refresh:0;");
    }
    
}
else if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $category_description = $_POST['category_description'];
    
    $query = mysqli_query($conn,"INSERT INTO note_categories(Name,Description,CreatedDate,CreatedBy,ModifiedDate,IsActive) VALUES('$category','$category_description',NOW(),$admin_user_id,NOW(),1)");
    
}
?>
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
        <form method="post">       
               <div class="bottom-footer">
        <section id="add-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <h4>Add Category</h4>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="category" placeholder="Enter your category" name="category" value="<?php echo $category_name ?>">
                        </div>
                        <div class="form-group">
                            <label for="category-description">Description<span class="required">*</span></label><br>
                            <textarea id="category-description" name="category_description" rows="4" cols="65" placeholder="Enter your description"><?php echo $description ?></textarea>
                        </div>

                    </div>
                    <div class="col-md-6"></div>
                </div>
                   
                <button class="btn btn-add-category" name="submit">SUBMIT</button>

            </div>
        </section>
    </div>
 </form>
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