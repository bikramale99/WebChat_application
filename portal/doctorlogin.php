<?php
session_start(['dname']);


?>

<html>
<head>

        <meta charset="utf-8">
     
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nepal Seminary</title>
   

      

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
<body>
<form method="post" action="doctorvalidation.php" id="loginform">
<h2>Docotor Login</h2>
 <?php
	  /* 
	  * The $_GET["error"] is from validation.php 
	  * if the suername and password didn't match or
	  * the fields are empty. 
	  */
	  	if(isset($_GET["error"])) {
			echo "<h4>Invalid Username or Password</h4>";	
		} else {
			echo "<h4></h4>";	
		}
	  ?>
	  
	  
 <div class="form-group">
    <label for="exampleInputName"> User Name</label>
    <input type="text" class="form-control" id="dname" name="dname" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputName"> Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Name">
	
  </div>
  
  <button onclick="myFunction()" type="submit" name="Log In" id="Log In" value="Submit" class="btn btn-default">Submit</button>
</form>  
</body>
<html>