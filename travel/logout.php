<?php
session_start();
session_start();
unset($_SESSION['UID']);
session_destroy();
header("location: index.php");

?>