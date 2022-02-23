<?php
include('../connection.php');
include('../header.php');
session_start();
$img_id = $_GET['image_id'];
$flag=0;
?>
<main class="page projects-page" >
                        <section class="portfolio-block projects-cards" style="padding-top:30px; border-top:solid; padding-bottom:5px;">
                         <div class="container">
                         <div class="row">
<?php
$query_img="SELECT DISTINCT travelimage.Path, travelimage.UID, travelimage.ImageID,travelimagedetails.title, travelimagedetails.Description, travelpostimages.PostID
                            ,travelimagedetails.Longitude,travelimagedetails.Latitude, geocountries.CountryName, geocities.AsciiName
                                from travelimage 
                                LEFT JOIN travelimagedetails
                                ON travelimage.ImageID = travelimagedetails.ImageID
                                LEFT JOIN travelpostimages
                                ON travelimage.ImageID = travelpostimages.ImageID
                                LEFT JOIN geocountries
                                ON travelimagedetails.CountryCodeISO = geocountries.ISO
                                LEFT JOIN geocities
                                ON travelimagedetails.CityCode = geocities.GeoNameID
                                WHERE travelimage.ImageID = '$img_id';";

                                $result_img=$conn->query($query_img);
                                if($result_img->num_rows>0){
                            
                                    while($img_row=$result_img->fetch_assoc())
                                    {
                                        $lat = $img_row['Latitude'];
                                        $long = $img_row['Longitude'];
                                        $city = $img_row['AsciiName'];
                                        ?>
                                        <div class="col-6">
                                            <a href="#"><img class="card-img-top scale-on-hover" src="../assets/img/travel/<?php echo $img_row['Path'];?>" alt="Card Image" style="border: 50px;"></a>
                                        </div>
                                        <div class="col-6">
                                            <h3 align=center><?php echo $img_row['title'];?></h3>
                                            <div style="font-size:20px; border-top:solid;" >
                                            <br>
                                               City : <?php echo $img_row['AsciiName'];?><br>
                                               Country : <?php echo $img_row['CountryName'];?><br>
                                               Description : <?php echo $img_row['Description'];?><br><br>
                                            <?php
                                                if(isset($_SESSION['UID'])){
                                                    $flag=1;
                                                    $user_id = $_SESSION['UID'];
                                                    $sql = "SELECT * FROM travelreview WHERE `UID` = '$user_id' AND ImageID = '$img_id';";
                                                    $res=$conn->query($sql);
                                                    if($res->num_rows>0){
                                                        while($data=$res->fetch_assoc())
                                                        {
                                                        $flag=2;
                                                        echo('Your Review : ');echo($data['Review']);echo('<br>');
                                                        }
                                                    }
                                                        ?>
                                                        
                                                        <?php
                                                    }
                                                    
                                                    if($flag==0 || $_SESSION['is_admin']==1){
                                                        echo('<hr>');
                                                        echo('Reviews:');
                                                        $review_query = "SELECT * FROM travelreview WHERE ImageID='$img_id';";
                                                        $res=$conn->query($review_query);
                                                            if($res->num_rows>0){
                                                            while($data=$res->fetch_assoc())
                                                            {
                                                                echo ('<br>');echo($data['Review']);
                                                                if($_SESSION['is_admin']==1){
                                                                    $flag=2;
                                                                   ?>
                                                                   <a href="delete.php?UID=<?php echo $data['UID'];?>&ImageID=<?php echo $data['ImageID'];?>"><Button class="btn-danger" style="margin-left:20px; font-size:12px;">Delete</Button></a>
                                                                   <?php
                                                                }
                                                            }
                                                        }
                                                        echo('<hr>');
                                                    }
                                            ?>
                                            <div style="font-size:15px;">
                                               <a href="post.php?post_id=<?php echo $img_row['PostID']?>"><span>Click here to view POST &nbsp;&nbsp; &nbsp;</span></a> 
                                            <a href="city.php?city=<?php echo $img_row['AsciiName']?>"><span>Click to view City &nbsp;&nbsp;&nbsp;</span></a>
                                            <a href="country.php?country=<?php echo $img_row['CountryName']?>"><span>Click to view Country</span></a><br>
                                            </div>
                                            <?php
                                            if($flag==1){
                                            ?>
                                            <br>
                                            <div>
                                                        <form action="review.php" method="post" >
                                                        <input class="form-control" id="review" name="review"  placeholder="Type your review" style="font-size:15px; height:100%; width:100%;">
                                                        <input type="hidden" name="ImageID" value="<?php echo $img_id;?> ">
                                                        </form>
                                                    </div>
                                                    <?php
                                            }
                                            ?><br>
                                            <button type="btn btn-primary" id="map_btn" style="font-size:13px; float:right;" onclick="myFunction()">Show/Hide Map</button>
                                            </div>
                                    </div>
                                    <div class="container" id="map" style="margin-top:30px; margin-bottom:30px;">
                                    <div align="right" id = "map_api" style = "width: 100%;margin-right:30px; height: auto;">
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
<script language = "JavaScript">
   function myFunction() {
  var x = document.getElementById("map");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
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
include('footer.php');
?>