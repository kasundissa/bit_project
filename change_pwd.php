<?php
include_once("c_user.php");
$r="";
if (isset($_POST["email"])){
    if ($_POST["new_pwd"]==$_POST["con_pwd"]){
        $u = new user();
        $k = $u->change_pwd($_POST["email"],$_POST["old_pwd"],$_POST["new_pwd"],$_POST["con_pwd"]);
    }
    else
  /*  $r='<div class="alert alert-danger">
    <strong>Error!</strong> Something is going wrong.
</div>';*/
  $r='<div class="alert alert-danger fade in alert-dismissible show">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" style="font-size:20px">×</span>
  </button>    <strong>Error!</strong> Something is going wrong.
</div>';
}
include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="change_pwd.php" class="form-horizontal">
    <?php
    echo $r;
    ?>
    <h1>Change Password</h1><br/>
    <div class="form-group">
        <label class="control-label col-sm-2">User Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control"  placeholder="e.g.:-john@gmail.com" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Old Password:</label>
        <div class="col-sm-10">
            <input type="password" name="old_pwd" class="form-control"  placeholder="e.g.:-xyz456" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">New Password:</label>
        <div class="col-sm-10">
            <input type="password" name="new_pwd" class="form-control"  placeholder="e.g.:-abc123" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Confirm Password:</label>
        <div class="col-sm-10">
            <input type="password" name="con_pwd" class="form-control"  placeholder="e.g.:-abc123" required>
        </div>
    </div>
    <input type="submit" class="btn">
</form>







</body>
</html>
<?php
include_once("foot.php");
?>