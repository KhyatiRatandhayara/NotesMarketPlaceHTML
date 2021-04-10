<?php
include "connection.php";
$query_config = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='FB'");
while($row=mysqli_fetch_assoc($query_config)){
$facebook = $row['Value'];
}

$query_config = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='TW'");
while($row=mysqli_fetch_assoc($query_config)){
$twitter = $row['Value'];
}

$query_config = mysqli_query($conn,"SELECT * FROM system_configuration WHERE ConfigKey='LI'");
while($row=mysqli_fetch_assoc($query_config)){
$linkedin = $row['Value'];
}
?>
       <div id="footer">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6  col-sm-7 col-12">
                    <h3>Copyright &#169; TatvaSoft All rights reserved.</h3>
                </div>
                <div class="col-lg-6 col-md-6  col-sm-5 col-12">
                    <ul class="icon-list pull-right">
                        <li><a href="<?php echo $facebook ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $twitter ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo $linkedin ?>"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>