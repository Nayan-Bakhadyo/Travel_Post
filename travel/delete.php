<?php
$UID = $_GET['UID'];
$ImageID = $_GET['ImageID'];
include("../connection.php");

$query = "DELETE FROM travelreview WHERE `UID` = '$UID' AND ImageID = '$ImageID';";
if ($conn->query($query) === TRUE) {
echo('<script>alert("Successfully deleted!!")</script>');
echo('<script>history.back();</script>');
}
?>