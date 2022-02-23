<?php
include('../connection.php');
include('../header.php');
$user_id = $_GET['userid'];
?>
<div class="row" align="center" style="margin-top:10px; margin-bottom:25px;">
    <h3>Your Posts</h3>
</div>

<?php
$query="SELECT * FROM traveluser LEFT JOIN traveluserdetails ON traveluser.UID = traveluserdetails.UID WHERE traveluserdetails.UID = '$user_id';";
                $result=$conn->query($query);
                if($result->num_rows>0){
	                while($row=$result->fetch_assoc())
	                {
                        $user_id = $row['UID'];
                        ?>
                        <div class="container" style="border-top:solid; padding-top:15px; font-size:20px;">
                        <span style="margin-left:20px;"><?php echo $row['FirstName'];echo(' ');echo $row['LastName'];?></span><br>
                        <span style="margin-left:20px;"><?php echo $row['Country'];?></span><br>
                        <span style="margin-left:20px;"><?php echo $row['City'];?></span><br>
                        </div>
                        <main class="page projects-page" >
                        <section class="portfolio-block projects-cards" style="padding-top:30px; padding-bottom:5px;">
                         <div class="container">
                         <div class="row">
                        <?php
                        $query_user = "SELECT ImageID FROM travelimage WHERE `UID`='$user_id'";
                        $result_user = $conn->query($query_user);
                        if($result_user->num_rows>0){
                            while($image_row=$result_user->fetch_assoc())
                            {
                                $img_id = $image_row['ImageID'];
                                $query_img="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagedetails.title, travelimagedetails.Description
                                from travelimage 
                                LEFT JOIN travelimagedetails
                                ON travelimage.ImageID = travelimagedetails.ImageID
                                WHERE travelimage.ImageID = '$img_id';";

                                $result_img=$conn->query($query_img);
                                if($result_img->num_rows>0){
                            
                                    while($img_row=$result_img->fetch_assoc())
                                    {?>
                                        <div class="col-md-6 col-lg-4">
                                            <a href="image.php?image_id=<?php echo $img_row['ImageID'];?>"><img class="card-img-top scale-on-hover" src="../assets/img/travel/<?php echo $img_row['Path'];?>" alt="Card Image" style="border: 50px;"></a>
                                                    <div class="card-body">
                                                        <h6><a href="#"><?php echo $img_row['title'];?> </a></h6>
                                                        <p class="text-muted card-text"> Rating: <?php echo $img_row['Rating'];?>
                                                        <br><?php echo $img_row['Description'];?></p>
                                                    </div>
                                                </div>
                                          
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
         </div>
            </div>
        </section>
</main>
                        <?php
                    }
                }
                 ?>
 
<?php
include('footer.php');
?>