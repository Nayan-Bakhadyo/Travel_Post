<?php
include('../connection.php');
include('../header.php');

$search_for = $_GET['country'];
$data;
//these are the flags we will be using to filter between city and country
$query="SELECT * FROM geocountries WHERE  CountryName = '$search_for';";
 $result=$conn->query($query);
 if($result->num_rows>0){
	 while($row=$result->fetch_assoc())
	 {
        $data=$row;
      $country_ISO = $row['ISO'];
 	}
 }
 ?>

 <!-- Displaying country details -->
 <div class="container">
    <div class="row" style="margin-top:30px; margin-bottom:15px;">
        <div class="col">
            <div align="right">    
                <img src= "../assets/img/flags/<?php echo $data['ISO'];?>.png" alt="Flag Image" style=" padding-top:15px; padding-right:15px; width:60%; border-radius:0px;">
            </div>
        </div>
        <div class="col">
            <div class="card-text" style="padding:5px;">
               <h3><?php echo $data['CountryName'];?></h3><br>
               <h5>
                    Capital: <?php echo $data['Capital'];?> <br>
                    Area: <?php echo $data['Area'];?> <br>
                    Population: <?php echo $data['Population'];?> <br>
                    Currency Code: <?php echo $data['CurrencyCode'];?> <br>
               </h5>
               Description: <br>
               <span><?php echo $data['CountryDescription'];?> <br></span>
        </div>
    </div>
 </div>
</div>

<!-- Displaying the relevant images -->
<section>
<div style="margin-left:110px; margin-bottom:30px;">
    <h5>Relevant Images:</h5>
</div>
<main class="page projects-page" >
    <section class="portfolio-block projects-cards" style="padding-top:0px;">
        <div class="container">
            
            <div class="row">

<?php
    $query="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagerating.Rating,travelimagedetails.title, travelimagedetails.Description
    from travelimage 
    LEFT JOIN travelimagerating 
    ON travelimage.ImageID = travelimagerating.ImageID 
    LEFT JOIN travelimagedetails
    ON travelimage.ImageID = travelimagedetails.ImageID
    WHERE travelimagedetails.CountryCodeISO = '$country_ISO'
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
</section>
<?php
include('../footer.php');
?>