<?php

include("../connection.php");
?>
<head>

        <meta charset="utf-8">
     
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Health Care</title>
   

      

        <!-- Bootstrap css -->                 

        <link rel="stylesheet" type="text/css" href="css/admincss.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Lato|Oswald" rel="stylesheet"> 

      <style type="text/css">p{font-family: 'Lato', sans-serif;} a,h1,h2,h3,h4{font-family: 'Oswald', sans-serif;}</style>
</head>

<form action="" method="post" enctype="multipart/form-data" id="loginform">
<h3>User Register Form</h3>
<table>
    <tr>
      <td colspan="2">
      <?php
	  	$userid 		= 	"";
		$firstname	=	"";
		$lastname=	"";
		$username=	"";
		$password=	"";
		$address=	"";
	
	  	$error="";
	  	if(isset($_POST["submit"])) {
		
			$firstname		=	$_POST["firstname"];
			$lastname	=	$_POST["lastname"];
			$username	=	$_POST["username"];
				$password	=	$_POST["password"];
				$address	=	$_POST["address"];
		
		
		
			
			if($username=="username" || $password=="password") {
				$error.="Please choose different username. <br> ";	
			}									
			
		
			if($error=="") {
				
				$sql=" INSERT INTO user(firstname,lastname,username,password,address) VALUES ('$firstname', '$lastname','$username', '$password', '$address') ";
				//echo $sql;
				$result = mysqli_query($connection,$sql);
				if($result) {
					echo "Data Submitted";		
				
						$firstname	=	"";
						$lastname=	"";
						$username=	"";
						$password=	"";
						$address=	"";
						header("location:index.php");
						die();
				} else {
					echo mysqli_error();	
				}									
			} else {
				echo $error;	
			}
			
			
			
		}
	  ?>
      </td>
      </tr>
   
    <div class="form-group">
    <label for="exampleInputName"> First Name</label>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Name">
  </div>
      <div class="form-group">
    <label for="exampleInputName"> Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Name">
  </div>
     <div class="form-group">
    <label for="exampleInputName"> Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Name">
  </div>
  
  <div class="form-group">
    <label for="exampleInputName"> Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Name">
	
  </div>
   <div class="form-group">
    <label for="exampleInputName"> Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Name">
  </div>
    
   
    
   
    <tr>
      <td>&nbsp;</td>
      <td><input class="btn btn-default" type="submit" name="submit" id="submit" value="Save Data" /></td>
    </tr>
  </table>
</form>
