<?php
include("../connection.php");
include("../header.php");
?>

<!-- Images are shown from here on -->
<main class="page projects-page" >
        <section class="portfolio-block projects-cards" style="padding-top:0px; margin-bottom:0px; margin-top:15px;">
            <div class="container">
                <div class="heading" style="padding-bottom:0px;">
                    <h2>Images</h2>
                </div>
                <div class="row">
                   
<!-- Running php code to fetch image detail from database and load it to site -->
<?php
$query="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagerating.Rating,travelimagedetails.title, travelimagedetails.Description
from travelimage 
LEFT JOIN travelimagerating 
ON travelimage.ImageID = travelimagerating.ImageID 
LEFT JOIN travelimagedetails
ON travelimage.ImageID = travelimagedetails.ImageID
GROUP BY travelimage.ImageID
ORDER BY travelimagerating.Rating DESC; ";
 $result=$conn->query($query);
 if($result->num_rows>0){

	 while($row=$result->fetch_assoc())
	 {?>
                    <div class="col-md-6 col-lg-4">
                       <a href="image.php?image_id=<?php echo $row['ImageID'];?>"><img class="card-img-top scale-on-hover" src="../assets/img/travel/<?php echo $row['Path'];?>" alt="Card Image" style="border: 50px;"></a>
                            <div class="card-body" >
                                <h6><a href="#"><?php echo $row['title'];?> </a></h6>
                                <p class="text-muted card-text"> Rating: <?php echo $row['Rating'];?>
                                <br><?php echo $row['Description'];?></p>
                            </div>
                       
                    </div>
                    
    <?php
    }
}
?>
                </div>
            </div>
        </section>
</main>

<?php
include("../footer.php");
?>