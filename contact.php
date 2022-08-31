<?php
include("header.php");
?>

<div id="contact"  class="container">
<h2 align="center">Contact Us</h2>
<div id="contactinfo" > 
<div class="col-md-4">
<h4>Address</h4>
<p>Manbhawan, Lalitpur</p>
<p>Kathmandu,Nepal</p>
</div>
<div class="col-md-4">
<h4>Contact Number</h4>
<p>Phone:01-5546789</p>
<p>Mobile:98754323456,098767657</p>
</div>
<div class="col-md-4">
<h4>Email Address</h4>
<p>ehealthcare@gmail.com</p>

</div>
</div>

<div class="col-xs-12">

<form id="contactform" action="" method="post">
 <?php
	  	$contact_id= 	"";
		$name=	"";
		$address=	"";
		$email=	"";		
		$subject="";
		$message="";
	  	$error="";
	  	if(isset($_POST["submit"])) {
		
			$name		=	$_POST["name"];
			$address	=	$_POST["address"];
			$email		=	$_POST["email"];
			$subject	=	$_POST["subject"];
			$message	=	$_POST["message"];
		
			
			if($name=="" || $message=="") {
				$error.="Please fill all the required fields. <br> ";	
			}									
			
		
			if($error=="") {
				
				$query=" INSERT INTO contact(name,address,email,subject,message) VALUES ('$name', '$address', '$email', '$subject', '$message') ";
				//echo $query;
				$result = mysqli_query($connection,$query);
				if($result) {
							
				
					$name=	"";
					$address=	"";
					$email=	"";
					$subject=	"";
					$message=	"";
				} else {
					echo mysqli_error();	
				}									
			} else {
				echo $error;	
			}
			
			
			
		}
	  ?>

  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputAddress">Address</label>
    <input type="text" class="form-control" id="address" name="address"placeholder="Address">
  </div>

    <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
     <div class="form-group">
    <label for="exampleInputEmail">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
  </div>
  <label for="exampleInputMessage">Message</label>
  <textarea class="form-control" rows="3"  id="message" name="message" placeholder="Message">
  </textarea>



  <button onclick="myFunction()" type="submit" id="submit" name="submit" class="btn btn-default">Submit</button>
  <script>
function myFunction() {
    alert("Message Submitted!!");
}
</script>
   
</form>

</div>
 <div id="map" class="col-xs-12">
  <h4>Map</h4>
  

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY32DBO8A0Qa6DRLB7yyUE20QlC5y3L_E &callback=initMap">
    </script>
	</div>

</div>
<?php
include("footer.php")
?>

     





