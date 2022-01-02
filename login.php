<?php include_once 'connect/db.php'; ?>
<?php include_once 'inc/login_code.php'; ?>
<?php if (isset($_SESSION['user_login'])): redirect("index.php?nav=attendance")?>
<?php else: ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>The Beacon Public School</title>
<?php include_once 'links/head.php'; ?>
</head>
<body themebg-pattern="theme1">
<div class="theme-loader">
<div class="loader-track">
<div class="preloader-wrapper">
<div class="spinner-layer spinner-blue">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-red">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-yellow">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-green">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
</div>
</div>
</div>

<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<form class="md-float-material form-material" method="POST">
<div class="text-center">
<img src="img/login12.png" alt="logo.png">
</div>
<div class="auth-box card">
<div class="card-block">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-center txt-primary">Sign In</h3>
</div>
</div>
<p class="text-muted text-center p-b-5">Sign in with your regular account</p>
<div class="form-group form-primary">
<input type="text" name="user_email" class="form-control" required="">
<span class="form-bar"></span>
<label class="float-label">Username</label>
</div>
<div class="form-group form-primary">
<input type="password" name="user_pass" class="form-control" required="">
<span class="form-bar"></span>
<label class="float-label">Password</label>
</div>
<div class="row m-t-25 text-left">
<div class="col-12">
<div class="checkbox-fade fade-in-primary">
</div>
</div>
</div>
<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="loginUser">LOGIN</button>
</div>
</div>
</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>

<?php include_once 'links/foot.php'; ?>

</html>

<?php endif; ?>