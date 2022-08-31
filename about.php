<?php
include("header.php");
?>
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/bg-page-title.jpg);">
    	<div class="auto-container">
        	<h1>About Us</h1>
        </div>
    </section>
    
    
    <!--Features Style One-->
    <section class="features-style-one">
    	<div class="auto-container">
        	<div class="row clearfix">
            		<?php
					if(isset($_GET["mode"])) {
						$mode=$_GET["mode"];
						
					}
					/* End of Delete  */
					?>
                
                  <?php
						$sql=" SELECT * FROM about ";
						//echo $sql;
						$result = mysqli_query($connection,$sql) or die(mysqli_error());
						while($row = mysqli_fetch_assoc($result)) {
						
						
							echo "<h3 align='center'>".$row['heading']."</h3>";
							echo "<p>".$row['description']."</p>";
							
							
							
						}
					  ?>
              
                </div>
        </div>
    </section>
    
    
    <!--Intro Style Two-->
    <section class="intro-style-two" style="background-image:url(images/background/6.jpg);">
    	<div class="auto-container">
        	
            <h2>Be healthy <br>stay healthy</h2>
<a href="contact.php" class="theme-btn btn-style-four">Contact Us</a>
        </div>
    </section>
    
  
    
    <!--Two Column Fluid-->
    <section class="two-col-fluid">
    	<div class="outer-box clearfix">
        	<!--Image Column-->
            <div class="image-column" style="background-image:url(images/background/6.jpg);"></div>
            
           
            
        </div>
    </section>
    
   
    
  <?php
  include("footer.php");
  ?>