<?php
include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
 if(isset($_SESSION['email'])){
     
    $title ="";
    $type = "";
    $category = ""; 
    $pages = "";
    $description = "";
    $country = ""; 
    $institutename = "";
    $coursename = ""; 
    $professor = ""; 
    $coursecode =""; 
    $radio = "";
    $sellprice = ""; 
     
$email=$_SESSION['email'];
$query = "select * from users where Email='$email'";
$result = mysqli_query($conn,$query);
while($raw=mysqli_fetch_assoc($result)){
    $seller_id = $raw['User_id'];
}


$valid_1 = true; 
$valid_2 = true; 
$valid_3 = true; 
     
if(isset($_GET['id'])){
         
         $publish_id=$_GET['id'];
         $fetch_details = mysqli_query($conn,"SELECT * FROM sellernote WHERE Seller_Note_id=$publish_id");
        
         while($row=mysqli_fetch_assoc($fetch_details)){
             
              $title =$row['Title'];
              $type = $row['NoteType'];
              $category = $row['Category'];
              $pages = $row['NumberofPages'];
              $description = $row['Description'];
              $country =$row['Country'];
              $institutename = $row['UniversityName'];
              $coursename = $row['Course'];
              $professor = $row['Professor'];
              $coursecode =$row['CourseCode'];
              $radio = $row['Ispaid'];
              $sellprice = $row['SellingPrice'];
              $seller_fetch_id = $row['Seller_id'];
             
             $query_seller_fetch_id = mysqli_query($conn,"SELECT * FROM users WHERE User_id=$seller_fetch_id");
             while($row=mysqli_fetch_assoc($query_seller_fetch_id)){
                 $seller_name = $row['FirstName'];
             }
             
         }
    if(isset($_POST['save'])){
       $title = $_POST['title'];
       $type = $_POST['type'];
       $category = $_POST['category'];
       $pages = $_POST['pages'];
       $description = $_POST['description'];
       $country = $_POST['country'];
       $institutename = $_POST['institutename'];
       $coursename = $_POST['coursename'];
       $professor = $_POST['professor'];
       $coursecode = $_POST['coursecode'];
       $radio = $_POST['radio'];
       $sellprice = $_POST['sellprice'];
    
    
     $query ="UPDATE sellernote SET Title='$title',Category=$category,NoteType=$type,NumberofPages=$pages,Description='$description',UniversityName='$institutename', Country=$country, Course='$coursename', CourseCode=$coursecode,Professor='$professor',IsPaid=$radio, SellingPrice='$sellprice' WHERE Seller_Note_id=$publish_id";

         $result = mysqli_query($conn,$query);
         if(!$result){
         die("failed".mysqli_error($conn));
         }
    
     $files1 =$_FILES['displaypicture'];

    $filename1 =$files1['name'];
    $filetmp1 = $files1['tmp_name'];
    $extention1 =explode('.',$filename1);
    $filecheck1 = strtolower(end($extention1));

    $fileextstored1 =array('jpg','png','jpeg');

    $seller_note_id = mysqli_insert_id($conn);

    //display picture

    if(in_array($filecheck1, $fileextstored1)){
    if(!is_dir('../Members/')){
    mkdir('../Members/');
    }
    if(!is_dir('../Members/'. $seller_id)){
    mkdir('../Members/'. $seller_id);
    }
    if(!is_dir('../Members/'. $seller_id. '/' .$seller_note_id)){
    mkdir('../Members/'. $seller_id. '/' .$seller_note_id);
    }

    $destinationfile1 ='../Members/' .$seller_id. '/' .$seller_note_id. '/' .'DP_'.time(). '.' .$filecheck1;

    move_uploaded_file($filetmp1,$destinationfile1);

    $query_display = "update sellernote set DisplayPicture='$destinationfile1' WHERE Seller_Note_id=$publish_id";
    $result_display =mysqli_query($conn,$query_display);
    }
    else{
    $valid_1 = false;
    }
        $files3 =$_FILES['note-preview'];

        $filename3 =$files3['name'];
        $filetmp3 = $files3['tmp_name'];
    
         $extention3 =explode('.',$filename3);
         $filecheck3 = strtolower(end($extention3));
         $fileextstored3 =array('pdf');
    
    //note-preview
    if(in_array($filecheck3, $fileextstored3)){
        
        if(!is_dir('../Members/')){
            mkdir('../Members/');
        }
        if(!is_dir('../Members/' .$seller_id)){
            mkdir('../Members/' .$seller_id);
        }
        if(!is_dir('../Members/' .$seller_id. '/' .$seller_note_id)){
            mkdir('../Members/' .$seller_id. '/' .$seller_note_id);
        }
            
       $destinationfile3 ='../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Preview_'.time(). '.'.$filecheck3;
        
           move_uploaded_file($filetmp3,$destinationfile3);
           $query_preview = "update sellernote set NotesPreview='$destinationfile3' where Seller_Note_id=$publish_id";
           $result_preview =mysqli_query($conn,$query_preview);
             }
    
         else{
             $valid_3=false;
         }
        //upload-attatchment
         $countfiles = count($_FILES['uploadnotes']['name']);
        
    
        for($i=0;$i<$countfiles;$i++){
           
            
         $filename2 = $_FILES['uploadnotes']['name'][$i];   
         $extention2 =explode('.',$filename2);
         $filecheck2 = strtolower(end($extention2));
         $fileextstored2 =array('pdf');
        
         if(in_array($filecheck2, $fileextstored2)){
             
               $query_multiple="INSERT INTO sellernotesattachments(Seller_note_id,CreatedDate,IsActive) VALUES($seller_note_id,NOW(),1)";
               $result_multiple = mysqli_query($conn,$query_multiple);
               $attatchment_id = mysqli_insert_id($conn);
             
             if(!is_dir('../Members/')){
            mkdir('../Members/');
            }
            if(!is_dir('../Members/' .$seller_id)){
            mkdir('../Members/' .$seller_id);
            }
            if(!is_dir('../Members/' .$seller_id. '/' .$seller_note_id)){
            mkdir('../Members/' .$seller_id. '/' .$seller_note_id);
            }
            if(!is_dir('../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Attachements')){
                mkdir('../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Attachements');
            }
             
            $destinationfile2 ='../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Attachements/' .$attatchment_id. '_' .time().'.'.$filecheck2;
             
        
         move_uploaded_file($_FILES['uploadnotes']['tmp_name'][$i],$destinationfile2);
             $attatch_name = $attatchment_id."_".time().$filecheck2;
             
         $query_attatchment="UPDATE sellernotesattachments SET FileName='$attatch_name',FilePath='$destinationfile2' where Sellattachement_id=$publish_id";

         $result_attatchment =mysqli_query($conn,$query_attatchment);
         }
            else{
            $valid_2 = false;
            }
         }
        
       }
    if(isset($_POST['yes'])){

    $query_published="UPDATE sellernote SET Status=11 where Seller_Note_id =$publish_id";
    $result_published = mysqli_query($conn,$query_published);
    if( $result_published){
    echo "success";
    }
        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        $mail = new PHPMailer(true);

        try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $config_email = 'kthakkar9426@gmail.com';
        $mail->Username = $config_email;
        $mail->Password = 'khyati@17';

        $mail->setFrom($email,'NotesMarketPlace');

        $mail->addAddress('kthakkar9426@gmail.com', 'khyati');
        $mail->addReplyTo($email, $username);



        $mail->IsHTML(true);
        $mail->Subject = $subject;

        $mail->Body ="Email from: kthakkar9426@gmail.com<br>
            Email sent to:$email <br>
                Subject:  $seller_name sent his note for review<br>
                    Body:
                    Hello Admins,
                    We want to inform you that,$seller_name sent his note
                        <b>$title</b> for review. Please look at the notes and take required actions.
                            Regards,<br>
                            Notes Marketplace";
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

        $mail->send();

        }

        catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    }
 } 

else if(isset($_POST['save'])){
    
$title = $_POST['title'];
$type = $_POST['type'];
$category = $_POST['category'];
$pages = $_POST['pages'];
$description = $_POST['description'];
$country = $_POST['country'];
$institutename = $_POST['institutename'];
$coursename = $_POST['coursename'];
$professor = $_POST['professor'];
$coursecode = $_POST['coursecode'];
$radio = $_POST['radio'];
$sellprice = $_POST['sellprice'];
$display_default_img="../Members/default/DP.jpg";
         
        $query ="INSERT INTO sellernote(Seller_id, Status,PublishedDate, Title, Category,DisplayPicture,NoteType, NumberofPages, Description, UniversityName, Country, Course, CourseCode, Professor,IsPaid, SellingPrice,CreatedDate,IsActive) VALUES($seller_id,3,NOW(),'$title',$category,'$display_default_img',$type,$pages,'$description','$institutename',$country, '$coursename','$coursecode','$professor',$radio,'$sellprice',NOW(),1)";
         $result = mysqli_query($conn,$query);
    if(!$result){
        die("failed".mysqli_error($conn));
    }
    
         
    
    $files1 =$_FILES['displaypicture'];

    $filename1 =$files1['name'];
    $filetmp1 = $files1['tmp_name'];
    $extention1 =explode('.',$filename1);
    $filecheck1 = strtolower(end($extention1));

    $fileextstored1 =array('jpg','png','jpeg');

    $seller_note_id = mysqli_insert_id($conn);

    //display picture

    if(in_array($filecheck1, $fileextstored1)){
    if(!is_dir('../Members/')){
    mkdir('../Members/');
    }
    if(!is_dir('../Members/'. $seller_id)){
    mkdir('../Members/'. $seller_id);
    }
    if(!is_dir('../Members/'. $seller_id. '/' .$seller_note_id)){
    mkdir('../Members/'. $seller_id. '/' .$seller_note_id);
    }

    $destinationfile1 ='../Members/' .$seller_id. '/' .$seller_note_id. '/' .'DP_'.time(). '.' .$filecheck1;

    move_uploaded_file($filetmp1,$destinationfile1);

    $query_display = "update sellernote set DisplayPicture='$destinationfile1' where Seller_Note_id= $seller_note_id";
    $result_display =mysqli_query($conn,$query_display);
    }
    else{
    $valid_1 = false;
    }
        $files3 =$_FILES['note-preview'];

        $filename3 =$files3['name'];
        $filetmp3 = $files3['tmp_name'];
    
         $extention3 =explode('.',$filename3);
         $filecheck3 = strtolower(end($extention3));
         $fileextstored3 =array('pdf');
    
    //note-preview
    if(in_array($filecheck3, $fileextstored3)){
        
        if(!is_dir('../Members/')){
            mkdir('../Members/');
        }
        if(!is_dir('../Members/' .$seller_id)){
            mkdir('../Members/' .$seller_id);
        }
        if(!is_dir('../Members/' .$seller_id. '/' .$seller_note_id)){
            mkdir('../Members/' .$seller_id. '/' .$seller_note_id);
        }
            
       $destinationfile3 ='../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Preview_'.time(). '.'.$filecheck3;
        
           move_uploaded_file($filetmp3,$destinationfile3);
           $query_preview = "update sellernote set NotesPreview='$destinationfile3' where Seller_Note_id=$seller_note_id";
           $result_preview =mysqli_query($conn,$query_preview);
             }
    
         else{
             $valid_3=false;
         }
    
    //upload-attatchment
         $countfiles = count($_FILES['uploadnotes']['name']);
        
    
        for($i=0;$i<$countfiles;$i++){
           
            
         $filename2 = $_FILES['uploadnotes']['name'][$i];   
         $extention2 =explode('.',$filename2);
         $filecheck2 = strtolower(end($extention2));
         $fileextstored2 =array('pdf');
        
         if(in_array($filecheck2, $fileextstored2)){
             
               $query_multiple="INSERT INTO sellernotesattachments(Seller_note_id,CreatedDate,IsActive) VALUES($seller_note_id,NOW(),1)";
               $result_multiple = mysqli_query($conn,$query_multiple);
               $attatchment_id = mysqli_insert_id($conn);
             
             if(!is_dir('../Members/')){
            mkdir('../Members/');
            }
            if(!is_dir('../Members/' .$seller_id)){
            mkdir('../Members/' .$seller_id);
            }
            if(!is_dir('../Members/' .$seller_id. '/' .$seller_note_id)){
            mkdir('../Members/' .$seller_id. '/' .$seller_note_id);
            }
            if(!is_dir('../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Attachements')){
                mkdir('../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Attachements');
            }
             
            $destinationfile2 ='../Members/' .$seller_id. '/' .$seller_note_id. '/' .'Attachements/' .$attatchment_id. '_' .time().'.'.$filecheck2;
             
        
         move_uploaded_file($_FILES['uploadnotes']['tmp_name'][$i],$destinationfile2);
             $attatch_name = $attatchment_id."_".time().$filecheck2;
             
         $query_attatchment="UPDATE sellernotesattachments SET 	FileName='$attatch_name',FilePath='$destinationfile2' where Sellattachement_id=$attatchment_id";

         $result_attatchment =mysqli_query($conn,$query_attatchment);
         }
            else{
            $valid_2 = false;
            }
         }
    }
}
else{
header("location:login.php");
}     
?>

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
    include "header.php"; ?>

    <section id="userprofile">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3>Add Notes</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form method="post" enctype="multipart/form-data">
        <section id="add-note">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3><span>Basic Note Details</span></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="title">Title<span class="required">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title?>" placeholder="Enter your notes title" required>
                        </div>
                        <div class="form-group">
                            <label>Display Picture</label>
                            <div class="picture-2">
                                <label for="file-input-3">
                                    <img src="image/Add-notes/upload-file.png">
                                </label>
                                <input id="file-input-3" type="file" name="displaypicture">
                            </div>
                            <div class="incorrect">
                                <?php
                        if($valid_1 == false){
                            echo "only JPEG,JPG and PNG should be supported";
                        }
                        ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" class="form-control arrow-down" name="type">

                                <?php
                             if(isset($_GET['id'])){
                               //echo "<option selected value='$type'>$type_name_fetch</option>";
                                 
                                $query_type = "select * from note_type";
                                $result_type = mysqli_query($conn, $query_type);
                                while($row = mysqli_fetch_assoc($result_type)){
                                $type_id = $row['Type_id'];
                                $type_name = $row['Name']; 
                                    if($type==$type_id){
                                         echo "<option value='$type' selected='selected'>$type_name</option>"; 
                                    }
                                    else{
                                      echo "<option value='$type_id'>$type_name</option>";  
                                    }
                                }
                             }
                            else{
                            echo "<option selected disabled>select your note type</option>";   
                           $query_type = "select * from note_type";
                           $result_type = mysqli_query($conn, $query_type);
                           while($row = mysqli_fetch_assoc($result_type)){
                            $type_id = $row['Type_id'];
                            $type_name = $row['Name'];
                            echo "<option value='$type_id'>$type_name</option>";
                           }
                                 }
                           ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category<span class="required">*</span></label>
                            <select id="category" class="form-control arrow-down" name="category" required>

                                <?php
                             if(isset($_GET['id'])){
                               // echo "<option selected value='$category'>$category_name_fetch</option>";
                                 
                                  $query_category = "select * from note_categories";
                                  $result_category = mysqli_query($conn, $query_category);
                                 
                                  while($row = mysqli_fetch_assoc($result_category)){
                                  $category_id = $row['Category_id'];
                                  $category_name = $row['Name'];
                                      if($category == $category_id){
                                      echo "<option value='$category' selected='selected'>$category_name</option>";
                                      }
                                      else{
                                      echo "<option value='$category_id'>$category_name</option>";
                                      }
                                  }
                             }
                          else{
                             echo "<option selected disabled>select your category</option>";
                           $query_category = "select * from note_categories";
                           $result_category = mysqli_query($conn, $query_category);
                              
                           while($row = mysqli_fetch_assoc($result_category)){
                            $category_id = $row['Category_id'];
                            $category_name = $row['Name'];
                            echo "<option value=' $category_id'>$category_name</option>";
                           }
                          }
                           ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note-upload">Upload Notes<span class="required">*</span></label>
                            <div class="picture-2">
                                <label for="file-input-2" class="text-center">
                                    <img src="image/Add-notes/upload-note.svg">
                                </label>
                                <input id="file-input-2" type="file" name="uploadnotes[]" multiple>
                            </div>
                            <div class="incorrect">
                                <?php
                        if($valid_2 == false){
                            echo "only PDF should be supported";
                        }
                        ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pages">Pages</label>
                            <input type="text" class="form-control" id="pages" name="pages" value="<?php echo $pages?>" placeholder="Enter Number Of Pages">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category-description">Description<span class="required">*</span></label><br>
                    <textarea id="category-description" name="description" rows="4" cols="65" placeholder="Enter your description"><?php echo "$description"?></textarea>
                </div>
            </div>

        </section>
        <section id="add-note-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3><span>Institution Information</span></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="country">Country</label>
                            <select id="country" class="form-control arrow-down" name="country">

                                <?php
                            if(isset($_GET['id'])){
                                // echo "<option selected value='$country'>$country_name_fetch</option>";
                                
                                  $query_country = "select * from countries";
                                  $result_country = mysqli_query($conn, $query_country);
                                  while($row = mysqli_fetch_assoc($result_country)){
                                  $country_id = $row['Country_id'];
                                  $country_name = $row['CountryName'];
                                      if($country==$country_id){
                                          echo "<option value='$country' selected='selected'>$country_name</option>"; 
                                      }
                                      else{
                                         echo "<option value='$country_id'>$country_name</option>"; 
                                      }
                                  }
                                
                            }
                            else{
                               echo "<option selected disabled>select your country</option>";
                               $query_country = "select * from countries";
                               $result_country = mysqli_query($conn, $query_country);
                               while($row = mysqli_fetch_assoc($result_country)){
                               $country_id = $row['Country_id'];
                               $country_name = $row['CountryName'];
                               echo "<option value='$country_id'>$country_name</option>";
                               }
                            }
                         ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group signup">
                            <label for="ins-name">Institude Name</label>
                            <input type="text" class="form-control" id="ins-name" name="institutename" value="<?php echo $institutename?>" placeholder="Enter your institude name" required>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="add-note-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3><span>Course Details</span></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course-name">Course Name</label>
                            <input type="text" class="form-control" id="course-name" name="coursename" value="<?php echo $coursename?>" placeholder="Enter your course name">
                        </div>
                        <div class="form-group">
                            <label for="lecture">Professor/Lecture</label>
                            <input type="text" class="form-control" id="lecture" name="professor" value="<?php echo $professor?>" placeholder="Enter your professor name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="course-name">Course Code</label>
                            <input type="text" class="form-control" id="course-name" name="coursecode" value="<?php echo $coursecode?>" placeholder="Enter your course code">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="add-note-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3><span>Selling Information</span></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sell">Sell for<span class="required">*</span></label><br>
                            <?php
                             if(isset($_GET['id'])){
                            ?>
                            <input type='radio' id='free' name='radio' value='2' <?php if($radio=='2') echo "checked";?> class='radiofree'>
                            <?php
                             }
                             else{
                         $query_free = "select Refdata_id from reference_data where value='Free'";  
                         $result_free =mysqli_query($conn,$query_free);   
                          while($row = mysqli_fetch_assoc($result_free)){
                         $ref_id_free = $row['Refdata_id'];
                         echo "<input type='radio' id='free' name='radio' value='$ref_id_free' class='radiofree'>";
                          }
                        }
                        ?>
                            <label for="free">Free&nbsp;</label>
                            <?php
                        if(isset($_GET['id'])){
                            ?>
                            <input type='radio' id='paid' name='radio' value='1' <?php if($radio=='1') echo "checked";?> class='radiopaid'>
                            <?php  
                        }
                         else{
                         $query_paid = "select Refdata_id from reference_data where value='Paid'";  
                         $result_paid =mysqli_query($conn,$query_paid);   
                          while($row = mysqli_fetch_assoc($result_paid)){
                         $ref_id_paid = $row['Refdata_id'];
                         echo "<input type='radio' id='paid' name='radio' value='$ref_id_paid' class='radiopaid'>";
                          }
                             }
                        ?>
                            <label for="paid">Paid</label>
                        </div>

                        <div class="form-group">
                            <label for="sell-price">Sell Price<span class="required">*</span></label>
                            <input type="number" step="any" class="form-control" id="sell-price" name="sellprice" value="<?php echo $sellprice?>" placeholder="Enter your Price" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="note-upload">Note Preview</label>
                            <div class="picture-2">
                                <label for="file-input-1">
                                    <img src="image/Add-notes/upload-file.png">
                                </label>
                                <input id="file-input-1" type="file" name="note-preview">
                            </div>
                            <div class="incorrect">
                                <?php
                        if(!$valid_3){
                            echo "only PDF should be supported";
                        }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                     
                          <button type="submit" class="btn btn-note" name="save">SAVE</button> 
                          <?php if(isset($_GET['id'])){ ?> 
                            <a type="submit" class="btn btn-note" name="publish" data-toggle="modal" data-target="#exampleModal">PUBLISH</a>
                          <?php }
                           else{ ?> 
                            <button type="submit" class="btn btn-note" name="publish" disabled>PUBLISH</button>
                          <?php  }?>
                           
                          
                       
                    </div>
                </div>
            </div>
        </section>
    </form>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post">
                        <p>Publishing this note will send note to administrator for review, once
                            administrator review and approve then this note will be published to
                            portal. Press yes to continue.</p>
                        <button class="btn yes" style="background-color:#6255a5; color:#fff" name="yes">Yes</button>
                        <button class="btn" data-dismiss="modal" style="background-color:#6255a5; color:#fff">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

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

