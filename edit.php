<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit User</title>
    <link rel="stylesheet" href="assets/form/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/form/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/form/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/form/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="assets/form/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/form/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/form/css/styles.css">
</head>
<?php
$UID = $_POST['UID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$region = $_POST['region'];
$postal = $_POST['postal'];
$phone = $_POST['phone'];
$email = $_POST['email'];

?>
<body>
    <div class="container profile profile-view" id="profile">
        <form action="edit_process.php" Method="POST">
            <div class="row profile-row">
                <div class="col-md-10">
                    <h1>Edit User</h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Firstname </label><input class="form-control" type="text" name="firstname" required="" value="<?php echo $firstname;?>"></div>
                            <div class="form-group mb-3"><label class="form-label">Address</label><input class="form-control" type="text" name="address" required="" value="<?php echo $address;?>"></div>
                            <div class="form-group mb-3"><label class="form-label">Region</label><input class="form-control" type="text" name="region" required="" value="<?php echo $region;?>"></div>
                            <div class="form-group mb-3"><label class="form-label">Postal</label><input class="form-control" type="text" name="postal" required="" value="<?php echo $postal;?>"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Lastname </label><input class="form-control" type="text" name="lastname" required="" value="<?php echo $lastname;?>"></div>
                            <div class="form-group mb-3"><label class="form-label">City</label><input class="form-control" type="text" name="city" required="" value="<?php echo $city;?>"></div>
                            <div class="form-group mb-3"><label class="form-label">Country</label><input class="form-control" type="text" name="country" required="" value="<?php echo $country;?>"></div>
                            <div class="form-group mb-3"><label class="form-label">Phone</label><input class="form-control" type="text" name="phone" required="" value="<?php echo $phone;?>"></div>
                            <input type="hidden" name="UID" value="<?php echo $UID;?>">
                        </div>
                    </div>
                
                    <hr>
                    <div class="row">
                        <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" type="submit">EDIT </button><button class="btn btn-danger form-btn" type="reset">CANCEL </button></div>
                    </div>
                </div>
            </div>
            <a href="/Travel/travel/index.php">Back to Home</a>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>