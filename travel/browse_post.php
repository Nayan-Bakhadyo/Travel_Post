


<?php
include('../connection.php');
include('../header.php');
?>
<div class="row" align="center" style="margin-top:10px; margin-bottom:25px;">
    <h3>POSTS</h3>
</div>
<?php
// getting image details
$query = "SELECT DISTINCT PostID FROM travelpostimages ORDER BY PostID DESC;";

 $result=$conn->query($query);
 
 if($result->num_rows>0){
	 while($row=$result->fetch_assoc())
	 {
      $post_id = $row['PostID'];
   ?>
   <section class="container">
        <div class="row" style="margin-top:5px; margin-bottom:5px; border-top:solid;">
   <?php
      $query_post = "SELECT travelpostimages.ImageID FROM travelpostimages 
      WHERE PostID = '$post_id';";
         $result_post=$conn->query($query_post);
         if($result_post->num_rows>0){
            while($row_post=$result_post->fetch_assoc())
            {
  
               $img_id= $row_post['ImageID'];
               echo ('<br>');
      //          ImageID For Image Details like before
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
                  while($row_img=$result_image->fetch_assoc())
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
                    echo('<div style="overflow:scroll; height:30vh;">');
                    echo $post_detail['Message'];
                    echo('</div>');
                    echo('Post Time : ');
                    echo($post_detail['PostTime']);
                    echo('<br>');echo('<br>');
                    ?>
                    <a href="post.php?post_id=<?php echo $post_id;?>"><button type="btn btn-success" id="post" name="post">View post</button></a>
                    <?php
                    
                    }
                }
                ?>
        </div>
       
    </div>
</section>
      <?php
      }
   }
?>
<?php
include('footer.php');
?>

