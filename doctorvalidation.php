<?php
include("connection.php");
$dname		=	$_POST["dname"];
$password		=	$_POST["password"];
// Check the empty validation then send back with error variable via GET method. 
if($dname=="" || $password=="") {
	header("location: doctorlogin.php?error=1");
	die();
	echo "sdfsdfsd";
} else {

	$sqlLogin="SELECT * FROM doctor WHERE dname='$dname' and password='$password'";
	$result = mysqli_query($connection,$sqlLogin) or die(mysqli_error($connection));
	while($row=mysqli_fetch_assoc($result)) {
		$_SESSION["dname"]=$row['dname']; // Add username in session variable. 
		$_SESSION["doctorid"]=$row['doctor_id']; // Add id in session variable 
		header("location: ci.php"); // redirect to dashboard
		die();
	}
	header("location: doctorlogin.php?error=1"); // if user and password didn't mttch send back to index with varibale via GET method. 
	die();
}
?>
