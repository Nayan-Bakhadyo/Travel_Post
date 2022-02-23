<?php
include("../connection.php");
include("../header.php");
?>

<!-- Carousel section -->
    <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
        <div class="carousel-inner"style="padding-bottom:0px;">
            <div class="carousel-item active" style="margin-right: 0;">
                <img class="w-100 d-block" src="../assets/img/3.jpeg" alt="Slide Image">
            </div>
            <div class="carousel-item">
                <img class="w-100 d-block" src="../assets/img/1.jpeg" alt="Slide Image 1" />
            </div>
            <div class="carousel-item">
                <img class="w-100 d-block" src="../assets/img/2.jpeg" alt="Slide Image 2" />
            </div>
        </div>

        <div>
                <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span></a>
            <a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
        </div>
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
            
        </ol>
    </div>
<div align=center class="container" style="border-top:solid; border-bottom:solid;padding-top:10px; padding-bottom:20px;">
    <h4> Reviews </h4>
<?php
$query_review = "SELECT * FROM travelreview ORDER BY TravelID DESC;";
$result_review = $conn->query($query_review);
$i=0;
if($result_review->num_rows>0){
    while($row_review=$result_review->fetch_assoc())
    {
        if($i>1){
            break;
        }?>
        *
        <a href ="image.php?image_id=<?php echo $row_review['ImageID'];?>"><?php echo $row_review['Review'];?></a><br>
    <?php
    $i = $i + 1;
    }
}
?>
</div>
<!-- Images are shown from here on -->
<main class="page projects-page" >
        <section class="portfolio-block projects-cards" style="padding-top:0px;">
            <div class="container">
                <div class="heading" style="padding-bottom:0px; padding-top:30px;">
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
                            <div class="card-body">
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