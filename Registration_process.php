<?php
include('connection.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$region = $_POST['region'];
$postal = $_POST['postal'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO traveluser (UserName, Pass, `State`) 
VALUES ('$email', '$password',1)";
    if ($conn->query($sql) === TRUE) {
        $query = "INSERT INTO traveluserdetails 
        (`UID`, FirstName, LastName, `Address`,City, Region, Country, Postal, Phone,Email, Privacy)
        SELECT `UID`,'$firstname', '$lastname', '$address', '$city', '$region','$country','$postal','$phone','$email','1' FROM traveluser WHERE UserName = '$email'";
        if ($conn->query($query) === TRUE) {
            echo ('<script>alert("Successfully Registered");</script>');
            header("location: login.php");
        }
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
