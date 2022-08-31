<?php

include("header.php");
	if(isset($_GET["mode"])) {	
	$mode=$_GET["mode"];
						}
?>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/dc.jpg);">
    	<div class="auto-container">
        	<h1>Doctors</h1>
        </div>
    </section>
    
    
    <!--Sidebar Page-->
    <div class="sidebar-page-container">
    	<!--Tabs Box-->
        <div class="auto-container tabs-box">
            <div class="row clearfix">
                
                
                <!--Content Side-->	
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    
                    <!--Projects Section-->
                    <section class="blog-news-section two-column no-padd-bottom no-padd-top padd-right-10">
                    	<div class="row clearfix">        
                          
						  
                          
                            <?php
							 
						
								$sql=" SELECT * FROM doctor";
									//echo $sql;
									$result = mysqli_query($connection,$sql) or die(mysqli_error());
									while($row = mysqli_fetch_assoc($result)) 		
								{
									
		
									echo" <div class='column blog-news-column margin-bott-50 col-sm-4'>";
							
									echo"<article class='inner-box wow fadeInUp' data-wow-delay='0ms' data-wow-duration='1500ms'>";
										echo "<figure class='image-box'>";
												//echo "<td> <img width='80' height='80' src='../img/".$row['image']."'></td>";
											echo "<img src='images/doctors/".$row['image']."' alt='img'>";
										  
										echo "</figure>";
										echo "<div class='content-box'>";
											echo "<h3>".$row['dname']."</h3>";
											echo "<ul class='post-info clearfix'>";
											  // echo "<li>By <a href="#">Admin</a></li><li>In <a href="#">Finance</a></li><li><a href="#">07 Comments</a></li>";
											echo"</ul>";
											echo"<div class='text'><h3>department</h3>".$row['department']."</div>"; 
												echo"<div class='text'><h3>Education</h3>".$row['education']."</div>";
												echo"<div class='text'><h3>Designation</h3>".$row['dsignation']."</div>"; 												
												echo"<div class='text'><h3>Past_affiliation</h3>".$row['past_affiliation']."</div>"; 	
											//echo"<div class=\"text\">Here's the story of a man named Brady who was busy with three boys of his own. It's time to play the music. It's time to light the lights. It's time to meet. </div>";
										echo "</div>";
									echo "</article>";
							
									echo"</div>";
								}
							  
							?>
                        
                            
                     
                            
                          
                            
                        
                            
                        </div>
                
                    </section>
                
                    
                </div>
                <!--Content Side-->
                
               
                      
                
            </div>
        </div>
    </div>
    
    
<?php
include("footer.php");
?>