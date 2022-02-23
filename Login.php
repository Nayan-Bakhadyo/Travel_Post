<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/form/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/form/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/form/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/form/css/Ludens-Users---25-After-Register.css">
    <link rel="stylesheet" href="assets/form/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/form/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/form/css/styles.css">
</head>

<body>
    <section class="clean-block clean-form dark" style="height:100%;">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Login<br></h2>
                <p></p>
            </div>
            <form action="login_process.php" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group mb-3"><label class="form-label">Email*</label>
                <input class="form-control" type="text" placeholder="Type Your Username" name="username" required=""></div>
                <div class="form-group mb-3"><label class="form-label">Password*</label>
                <input class="form-control" type="password" placeholder="Your Password" name="password" required=""></div>
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit">
                <strong>LOGIN</strong></button></div>
                <a href="/Travel/travel/index.php">Back to Home</a>
            </form>
        </div>
    </section>
    <script src="assets/form/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="assets/form/js/Profile-Edit-Form.js"></script>
</body>

</html>