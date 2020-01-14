<?php
include_once("c_user.php");

    if (isset($_POST['email'])) { //to reset the password
        if ($_POST['n_pwd']== $_POST['con_pwd']) {
        $u = new user();
        $n = $u->reset_pwd($_POST['email'], $_POST['pin'], $_POST['n_pwd'], $_POST['con_pwd']);
    }
    else
        echo "Error-Something is wrong";
    header("location:page-login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">


</head>
<body>
<form method="post" action="pwd_recovery.php">
    <h1>Reset Password</h1>
    <div class="form-group">
        <div class="form-group">
            <label class="control-label col-sm-6">User Email:</label>
            <div class="col-sm-6">
                <input type="email" name="email" class="form-control" placeholder="john@gmail.com" required>
            </div>
        </div>
        <label class="control-label col-sm-6">Enter PIN Code:</label>
        <div class="col-sm-6">
            <input type="text" name="pin" class="form-control" placeholder="1234567" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6">New Password:</label>
        <div class="col-sm-6">
            <input type="password" name="n_pwd" class="form-control" placeholder="abc123" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6">Confirm Password:</label>
        <div class="col-sm-6">
            <input type="password" name="con_pwd" class="form-control" placeholder="abc123" required>
        </div>
    </div>

    <input type="submit" class="btn">
</form>
</body>
</html>
