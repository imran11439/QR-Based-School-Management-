<?php 

// logging user admin code 
 	if (isset($_REQUEST['loginUser'])) {
 		# code...
 		$_SESSION['user_email']=$user_email= $_REQUEST['user_email'];
 		$user_pass= $_REQUEST['user_pass'];
	 	$q=mysqli_query($dbc,"SELECT * FROM users WHERE user_email='$user_email' AND user_pass='$user_pass' AND user_sts = '1'");
 		if (mysqli_num_rows($q)==1) {
	 		$_SESSION['user_login']=$user_email;
	 		redirect("index.php",1500);
	 		}else{
	 		redirect("login.php",1500);
 		}
 	exit();	
	}

@$fetchUserlogin=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM users WHERE user_email='$_SESSION[user_email]'"));
@$school=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM school"));

?>