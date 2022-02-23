<?php
include('../connection.php');

//adding review in database table travelreview
session_start();
$review = $_POST['review'];
$ImageID =  $_POST['ImageID'];
$UID = $_SESSION['UID'];

$sql = "INSERT INTO travelreview (`UID`, ImageID, Review) 
VALUES ('$UID', '$ImageID','$review');";
    if ($conn->query($sql) === TRUE) {
        echo('<script>alert("Review posted successfully!")</script>');
        echo('<script>history.back();</script>');
    }
    else{
        echo('<script>alert("Error posting reivew!")</script>');
    }

?>