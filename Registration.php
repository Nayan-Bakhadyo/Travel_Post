<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/form/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/form/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/form/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/form/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="assets/form/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/form/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/form/css/styles.css">
</head>

<body>
    <div class="container profile profile-view" id="profile">
        <form action="Registration_process.php" Method="POST">
            <div class="row profile-row">
                <div class="col-md-10">
                    <h1>Registration</h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Firstname </label><input class="form-control" type="text" name="firstname" required=""></div>
                            <div class="form-group mb-3"><label class="form-label">Address</label><input class="form-control" type="text" name="address" required=""></div>
                            <div class="form-group mb-3"><label class="form-label">Region</label><input class="form-control" type="text" name="region" required=""></div>
                            <div class="form-group mb-3"><label class="form-label">Postal</label><input class="form-control" type="text" name="postal" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Lastname </label><input class="form-control" type="text" name="lastname" required=""></div>
                            <div class="form-group mb-3"><label class="form-label">City</label><input class="form-control" type="text" name="city" required=""></div>
                            <div class="form-group mb-3"><label class="form-label">Country</label><input class="form-control" type="text" name="country" required=""></div>
                            <div class="form-group mb-3"><label class="form-label">Phone</label><input class="form-control" type="text" name="phone" required=""></div>
                        </div>
                    </div>
                    <div class="form-group mb-3"><label class="form-label">Email </label><input class="form-control" type="email" autocomplete="off" required="" name="email"></div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Password </label><input class="form-control" type="password" name="password" autocomplete="off" required=""></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" type="submit">REGISTER </button><button class="btn btn-danger form-btn" type="reset">CANCEL </button></div>
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