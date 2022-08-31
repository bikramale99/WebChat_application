<?php
include("../connection.php");
$username		=	$_POST["username"];
$password		=	$_POST["password"];
// Check the empty validation then send back with error variable via GET method. 
if($username=="" || $password=="") {
	header("location: index.php?error=1");
	die();
} else {
	$sqlLogin="SELECT * FROM user WHERE username='$username' and password='$password'";
	$result = mysqli_query($connection,$sqlLogin) or die(mysqli_error($connection));
	while($row=mysqli_fetch_assoc($result)) {
		$_SESSION["user"]=$row['username']; // Add username in session variable. 
		$_SESSION["userid"]=$row['user_id']; // Add id in session variable 
		header("location: chat.php"); // redirect to dashboard
		die();
	}
	header("location: index.php?error=1"); // if user and password didn't mttch send back to index with varibale via GET method. 
	die();
}
?>