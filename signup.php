<?php


include("header.php");
?>
    
    
   
    
    
    <!--Features Style One-->
    <section class="features-style-one">
    	<div class="auto-container">
        	<div class="row clearfix">
<form action="" method="post" enctype="multipart/form-data" id="loginform">
<h3>User Register Form</h3>
  <img height="200px" width="400px" src="images/icons/register.png">
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
					echo "<h3>Data Submitted</h3>";		
				
						$firstname	=	"";
						$lastname=	"";
						$username=	"";
						$password=	"";
						$address=	"";
						header("location:chatindex.php");
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
</div>
</div>
</section>
  <?php
  include("footer.php");
  ?>