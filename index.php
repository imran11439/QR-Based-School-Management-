<?php include 'connect/db.php'; ?>
<?php include_once 'inc/login_code.php'; ?>
<?php if (!isset($_SESSION['user_login'])): redirect("login.php")?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php include_once 'links/head.php'; ?>

</head>
<body>

<div class="loader-bg">
<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<?php include_once 'inc/top_nav.php'; ?>


<div class="pcoded-main-container">
<div class="pcoded-wrapper">

<?php include_once 'inc/main_nav.php'; ?>

<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">
	<?php include_once $page; ?>
</div>
</div>
</div>

<div id="styleSelector">
</div>

</div>
 </div>
</div>
</div>

<?php include_once 'links/foot.php'; ?>

</html>
<?php endif; ?>
