<?php
include('../connection.php');
include('../header.php');
//these are the flags we will be using to filter between city and country
$country = 0;
$city = 0;

$search_for = $_GET['search'];

//these are the flags we will be using to filter between city and country
$query="SELECT ISO FROM geocountries WHERE  CountryName = '$search_for';";
 $result=$conn->query($query);
 if($result->num_rows>0){
	 while($row=$result->fetch_assoc())
	 {
      $country = 1;
      $country_ISO = $row['ISO'];
 	}
 }
 else{
    $query="SELECT GeoNameID FROM geocities WHERE  AsciiName = '$search_for';";
    $result=$conn->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc())
        {
         $city = 1;
         $city_Code = $row['GeoNameID'];
        }
    }
 }
if($city == 0 and $country==0){
    echo('<script>alert("Please provide valid City or Country Name")</script>');
    echo('<script>window.history.back();</script>');
}
?>

<!-- End of searching -->
<!-- Displaying the relevant images -->
<div style="margin-left:30px; margin-bottom:30px;">
    <h5>Search Results for : <?php echo $search_for;?> </h5>
</div>
<main class="page projects-page" >
    <section class="portfolio-block projects-cards" style="padding-top:0px;">
        <div class="container">
            
            <div class="row">

<?php
if($country==1){
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
                        <a href="#"><img class="card-img-top scale-on-hover" src="../assets/img/travel/<?php echo $row['Path'];?>" alt="Card Image" style="border: 50px;"></a>
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
}
else if($city==1){
    $query="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagerating.Rating,travelimagedetails.title, travelimagedetails.Description
    from travelimage 
    LEFT JOIN travelimagerating 
    ON travelimage.ImageID = travelimagerating.ImageID 
    LEFT JOIN travelimagedetails
    ON travelimage.ImageID = travelimagedetails.ImageID
    WHERE travelimagedetails.CityCode = '$city_Code'
    GROUP BY travelimage.ImageID
    ORDER BY travelimagerating.Rating DESC; ";
    $result=$conn->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc())
        {?>
                        <div class="col-md-6 col-lg-4">
                        <a href="#"><img class="card-img-top scale-on-hover" src="../assets/img/travel/<?php echo $row['Path'];?>" alt="Card Image" style="border: 50px;"></a>
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
}

?>

<?php
include('../footer.php');
?>