<?php
include('connection.php');
$UID = $_POST['UID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$region = $_POST['region'];
$postal = $_POST['postal'];
$phone = $_POST['phone'];


$sql = "UPDATE traveluserdetails 
SET FirstName = '$firstname', LastName = '$lastname', `Address`='$address',City='$city', Region='$region', Country='$country', Postal='$postal', Phone='$phone'
WHERE `UID` = '$UID'";
    if ($conn->query($sql) === TRUE) {
       echo("<script>alert('Succesfully Updated!!!')</script>");
       echo("<script>history.go(-2)</script>");
       
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
