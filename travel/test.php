


<?php
include('../connection.php');
include('../header.php');
// $query="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagerating.Rating,travelimagedetails.title, travelimagedetails.Description
// from travelimage 
// LEFT JOIN travelimagerating 
// ON travelimage.ImageID = travelimagerating.ImageID 
// LEFT JOIN travelimagedetails
// ON travelimage.ImageID = travelimagedetails.ImageID
// GROUP BY travelimage.ImageID
// ORDER BY travelimagerating.Rating DESC; ";

$query = "SELECT DISTINCT PostID FROM travelpostimages ORDER BY PostID DESC;";

 $result=$conn->query($query);
 
 if($result->num_rows>0){
	 while($row=$result->fetch_assoc())
	 {
      $post_id = $row['PostID'];
   ?>
   <section class="container">

   <?php
      $query_post = "SELECT travelpostimages.ImageID FROM travelpostimages 
      WHERE PostID = '$post_id';";
         $result_post=$conn->query($query_post);
         if($result_post->num_rows>0){
            while($row_post=$result_post->fetch_assoc())
            {
   ?>
   <div class="row">
          
   <?php
               $img_id= $row_post['ImageID'];
               echo ('<br>');
               // $img_id = 2;
      //          ImageID For Image Details like before
               $query_image="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagedetails.title, travelimagedetails.Description
               from travelimage 
               LEFT JOIN travelimagedetails
               ON travelimage.ImageID = travelimagedetails.ImageID 
               WHERE travelimage.ImageID = '$img_id';";
               $result_image=$conn->query($query_image);
               echo($result_image->num_rows);
               echo('<br>');
               if($result_image->num_rows>0){
                  while($row_img=$result_image->fetch_assoc())
                  {
                     echo($row_img['Path']);
                     echo('<br>');
                     echo($row_img['ImageID']);
                     echo('<br>');
                     ?>
                  <img src="../assets/img/travel/<?php echo $row_img['Path'];?>">
                    <?php 
                  }
                  
               }
               echo('-------------------');
            }
         }  
      ?>
  </div>
</section>
<hr>
      <?php
      }
   }
?>
<?php
include('footer.php');
?>