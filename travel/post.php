<?php
include('../connection.php');
include('../header.php');
$post_id = $_GET['post_id'];
?>

   <section class="container">
        <div class="row" style="margin-top:5px; margin-bottom:5px; border-top:solid; border-bottom:solid;">
   <?php
   //filter posts through post id that we got from get method
      $query_post = "SELECT travelpostimages.ImageID FROM travelpostimages 
      WHERE PostID = '$post_id';";
         $result_post=$conn->query($query_post);
         if($result_post->num_rows>0){
            while($row_post=$result_post->fetch_assoc())
            {
               $img_id= $row_post['ImageID'];
               echo ('<br>');
              
               $query_image="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagedetails.title, travelimagedetails.Description
               from travelimage 
               LEFT JOIN travelimagedetails
               ON travelimage.ImageID = travelimagedetails.ImageID 
               WHERE travelimage.ImageID = '$img_id';";
               $result_image=$conn->query($query_image);
               
               if($result_image->num_rows>0){
                   ?>
                <div class="col-6">
                       <?php
                  while($row_img=$result_image->fetch_assoc())   //view the post
                { ?>
                    <a href="image.php?image_id=<?php echo $row_img['ImageID'];?>"><img class="card-img-top scale-on-hover " src="../assets/img/travel/<?php echo $row_img['Path'];?>" alt="Card Image" style="border: 50px; margin:20px;"></a>
                    <?php 
                  }
                  
               }
            ?>
            </div>
            <?php
            }
         }  
      ?>
      <div class="col" style="margin-left:15px; padding:30px; margin-top:15px; border-radius:5%;">
                <?php
                $query_post_detail="SELECT * FROM travelpost WHERE PostID = '$post_id';";
                $result_post_detail=$conn->query($query_post_detail);
 
                if($result_post_detail->num_rows>0){
	                while($post_detail=$result_post_detail->fetch_assoc())
	                {?>
                    <h4 align="center">
                        <?php
                        echo $post_detail['Title'];
                        ?>
                    </h4>
                    <?php
                    echo('<br>');
                    echo ('Post ID: ');
                    echo $post_detail['PostID'];
                    echo('<br>');
                    echo ('Title: ');
                    echo $post_detail['Title'];
                    echo('<br>');echo('<br>');
                    echo('Caption:');
                    echo('<div>');
                    echo $post_detail['Message'];
                    echo('</div>');
                    echo('Post Time : ');
                    echo($post_detail['PostTime']);
                    echo('<br>');echo('<br>');
                    
                    }
                }
                ?>
        </div>
       
    </div>
</section>
<main class="page projects-page" >
        <section class="portfolio-block projects-cards" style="padding-top:30px;">
            <div class="container">
                <div class="heading" style="padding-bottom:0px;">
                    <h4>Other Images From User:</h4>
                </div>
                <div class="row">
            <?php
                $query="SELECT * FROM travelpost WHERE PostID='$post_id'";
                $result=$conn->query($query);
                if($result->num_rows>0){
	                while($row=$result->fetch_assoc())
	                {
                        $user_id = $row['UID'];
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
                    }
                }
            ?>
                  </div>
            </div>
        </section>
</main>

<?php
include('footer.php');
?>
