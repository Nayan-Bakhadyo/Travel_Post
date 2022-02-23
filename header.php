<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('connection.php');
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Travel Page</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="../assets/css/Card-Carousel-1.css">
    <link rel="stylesheet" href="../assets/css/Card-Carousel.css">
    <link rel="stylesheet" href="../assets/css/Carousel_Image_Slider-1.css">
    <link rel="stylesheet" href="../assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="../assets/css/File-Images-Component.css">
    <link rel="stylesheet" href="../assets/css/header-1.css">
    <link rel="stylesheet" href="../assets/css/header-2.css">
    <link rel="stylesheet" href="../assets/css/header-3.css">
    <link rel="stylesheet" href="../assets/css/header-4.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="../assets/css/Large-Dropdown-Menu-BS3-1.css">
    <link rel="stylesheet" href="../assets/css/Large-Dropdown-Menu-BS3.css">
    
    <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="../assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="../assets/css/Search-Input-responsive.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/card/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="../assets/card/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="../assets/card/css/untitled.css">

    
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
      </script>
      <script type = "text/javascript" src = "https://www.google.com/jsapi">
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['map']});     
      </script>

</head>

<body style="font-weight: bold;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="opacity: 1;">
        <div class="container"><img src="../assets/img/logo.jpeg" style="margin: 0;height: 29.6562px;"><a class="navbar-brand" href="#"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1" style="width: 1072px;">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item">
                        <div class="nav-item dropdown" style="margin-top: 8px;"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: rgb(0,0,0);font-size: 14;padding-top: 3px;">BROWSE&nbsp;</a>
                            <div class="dropdown-menu" style="width:auto; height:auto;">
                            <a class="dropdown-item" href="browse_post.php">Posts</a>
                            <a class="dropdown-item" href="browse_image.php">Images</a>
                            <a class="dropdown-item" href="browse_user.php">Users</a></div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item dropdown" style="margin-top: 8px;padding-left: 23px;"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: rgb(0,0,0);font-size: 14;padding-top: 3px;">CONTINENT</a>
                            <div class="dropdown-menu">
                                <!-- Fetch continent from database -->
                                <?php
                                    $query="SELECT * FROM geocontinents";
                                    $result=$conn->query($query);
                                    if($result->num_rows>0){
                                        while($row=$result->fetch_assoc())
                                        {?>
                                <a class="dropdown-item" href="continent.php?continent=<?php echo $row['ContinentCode'];?>&continent_name=<?php echo $row['ContinentName'];?>"><?php echo $row['ContinentName'];?></a>
                               <?php
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item dropdown" style="margin-top: 8px;padding-left: 23px; "><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: rgb(0,0,0);font-size: 14;padding-top: 3px;">COUNTRY</a>
                            <div class="dropdown-menu" style="width:180px; height:170px; overflow:auto;">
                                <!-- Fetch country from database -->
                                <?php
                                    $query="SELECT DISTINCT geocountries.CountryName FROM travelimagedetails
                                    LEFT JOIN geocountries ON travelimagedetails.CountryCodeISO = geocountries.ISO;";
                                     $result=$conn->query($query);
                                     if($result->num_rows>0){
                                         while($row=$result->fetch_assoc())
                                         {
                                ?>
                                <a class="dropdown-item" href="country.php?country=<?php echo $row['CountryName'];?>"><?php echo $row['CountryName'];?></a>
                               <?php
                                         }
                                        }
                                        ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item dropdown" id="city" style="margin-top: 8px;padding-left: 23px;"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: rgb(0,0,0);font-size: 14;padding-top: 3px;">CITY</a>
                            <div class="dropdown-menu" style="width:180px; height:170px; overflow:auto;">
                                <!-- Fetch city from database having image -->
                                <?php
                                    $query="SELECT DISTINCT geocities.AsciiName FROM travelimagedetails
                                    LEFT JOIN geocities ON travelimagedetails.CityCode = geocities.GeoNameId;";
                                     $result=$conn->query($query);
                                     if($result->num_rows>0){
                                         while($row=$result->fetch_assoc())
                                         {
                                ?>
                                <a class="dropdown-item" href="city.php?city=<?php echo $row['AsciiName'];?>"><?php echo $row['AsciiName'];?></a>
                                <?php }
                                     }
                                ?>
                            </div>
                        </div>
                    </li>

                <form class="me-auto bounce animated search-form" action="searchresult.php" target="_self" style="padding-left: 20px;float: right;" METHOD="GET">
                    <div class="float-start float-md-end mt-5 mt-md-0 search-area"><i class="fas fa-search float-start search-icon"></i>
                    <input class="form-control float-start float-sm-end bounce animated custom-search-input" 
                    style=" border: none; border-bottom: 2px solid #757575; background: transparent; outline: none; padding-bottom: 5px; min-width: 250px; text-indent: 40px;" 
                    type="search" name="search" id="search" placeholder="Type any country or city" style="height: 28px;"></div>
                </form>

                <div class="nav-item dropdown" style="margin-top: 8px; margin-left:13px;" >
                <!-- Utility menu for user -->
                <?php 
                    if(isset($_SESSION['UID'])){
                        $user_id = $_SESSION['UID'];
                    $query = "SELECT * from traveluserdetails WHERE `UID`='$user_id';";
                    $result=$conn->query($query);
                        if($result->num_rows>0){
	                    while($row=$result->fetch_assoc())
	                    {
                            $firstname = $row['FirstName'];
                            $lastname = $row['LastName'];
                    ?>
                                <a aria-expanded="false" class="dropdown-toggle" href="#"><?php echo $firstname; echo ('  '); echo $lastname; if($_SESSION['is_admin']==1){
                                    echo(" ( Admin )");
                                }?></a>  
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="user.php?userid=<?php echo $user_id;?>">My Account</a>
                                <?php if(isset($_SESSION['is_admin'])){?>
                                    <a class="dropdown-item" href="manage_users.php">Manage Users</a>
                               <?php } ?>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                                <!-- <a class="dropdown-item" href="#">Register</a> -->
                </div>
                <?php
                        }
                    }
                    }
                    else{
                ?>
                    <a aria-expanded="false" class="dropdown-toggle" href="#">USER UTILITY</a>  
                    <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="#">My Account</a> -->
                    <a class="dropdown-item" href="../login.php">Login</a>
                    <a class="dropdown-item" href="../Registration.php">Register</a>
                </div>
                <?php
                    }
                    ?>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <?php
include_once('../ads.php');
    ?>