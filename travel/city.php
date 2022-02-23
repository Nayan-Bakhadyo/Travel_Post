
<?php
include('../connection.php');
include('../header.php');

//get city name from request with get method
$search_for = $_GET['city'];
$data;
$i=0;

$query="SELECT * FROM geocities WHERE  AsciiName = '$search_for';";
 $result=$conn->query($query);
 if($result->num_rows>0){
	 while($row=$result->fetch_assoc())
	 {
    $data=$row;
      $country_ISO = $row['ISO'];
      $city = $row['AsciiName'];
      $long = $row['Longitude'];
      $lat = $row['Latitude'];
      $ISO = $row['CountryCodeISO'];
      $CityCode=$row['GeoNameID'];
 	}
 }
?>

 <!-- Displaying city details -->
 <div class="container">
    <div class="row" style="margin-top:30px; margin-bottom:15px;">
    <!-- For map of city -->
    <div class="col">
        <div align="right" id = "map_api" style = "width: 100%;margin-right:30px; height: auto;">
                </div>
        </div>
        <div class="col">
            <div class="card-text" style="padding-left:50px;">
               <h3><?php echo $data['AsciiName'];?></h3><br>
               <h5>
                   <!-- Get city name using city code in city database -->
                    Country: 
                    <?php 
                    $query="SELECT CountryName FROM geocountries WHERE fipsCountryCode = '$ISO';";
                    $result=$conn->query($query);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc())
	                        {
                            $country=$row['CountryName'];
                            }
                    }
                    echo $country;?> <br>

                    Elevation: <?php echo $data['Elevation'];?> <br>
                    Population: <?php echo $data['Population'];?> <br>
               </h5>
        </div>
    </div>
 </div>
</div>

<!-- Displaying the relevant images -->
<section>
<div style="margin-left:110px; margin-top:10px; margin-bottom:30px;">
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
    WHERE travelimagedetails.CityCode = '$CityCode'
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
</section>
<script language = "JavaScript">
                    function drawChart() {
                        // Define the chart to be drawn.
                        var data = google.visualization.arrayToDataTable([
                        ['Lat', 'Long', 'Name'],
                        [<?php echo $lat;?>,<?php echo $long;?> ,<?php echo json_encode($city);?>]

                        ]);
                        
                        // Set chart options
                        var options = {showTip: true,
                        zoomLevel:6
                    };				

                        // Instantiate and draw the chart.
                        var chart = new google.visualization.Map(document.getElementById
                        ('map_api'));
                        chart.draw(data, options);
                    }
                    google.charts.setOnLoadCallback(drawChart);
                </script>
<?php
include('../footer.php');
?>