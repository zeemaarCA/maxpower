<?php
session_start();
include '../../includes/conn.php';

	if(isset($_POST['login'])){


    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);



	$sel_user = "SELECT * FROM admins WHERE user_email='$email' AND user_pass='$pass'";

	$run_user = mysqli_query($con, $sel_user);

	 $check_user = mysqli_num_rows($run_user);

	if($check_user==1){

	$_SESSION['user_email']=$email;

	header('Location:../dashboard.php');

	}
	else {

	header('Location:../index.php?err=Email or Password are incorrect!');

	}


	}

?>
