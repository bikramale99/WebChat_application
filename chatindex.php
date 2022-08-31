<?php
session_start(['user']);
include("header.php");
?>
    
    

    
    
    <!--Features Style One-->
    <section class="features-style-one">
    	<div class="auto-container">
        	<div class="row clearfix">
			
<form method="post" action="validation.php" id="loginform">
<h3>Login Form</h3>
  <img height="200px" width="300px" src="images/icons/loginpng.png">
 <?php
	  /* 
	  * The $_GET["error"] is from validation.php 
	  * if the suername and password didn't match or
	  * the fields are empty. 
	  */
	  	if(isset($_GET["error"])) {
			echo "<h4>Invalid Username or Password</h4>";	
		} else {
			echo "<h4>Enter Username and Password</h4>";	
		}
	  ?>
	  
	
 <div class="form-group">
    <label for="exampleInputName"> User Name</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputName"> Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Name">
	
  </div>
  
  <button onclick="myFunction()" type="submit" name="Log In" id="Log In" value="Submit" class="btn btn-default">Login </button>
  
    <a href="signup.php"> Or  Register</a>
	<br/>
	<a href="doctorlogin.php">Login as Doctor</a>
</form>  
</div>
</div>
</section>
  <?php
  include("footer.php");
  ?>