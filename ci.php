<?php


include("header.php");
?>
    
    
   
    
    
    <!--Features Style One-->
    <section class="features-style-one">
    	<div class="auto-container">
        	<div class="row clearfix">
            		<?php

include("connection.php");

if (!isset($_SESSION["visits"]))
       $_SESSION["visits"] = 0;
    $_SESSION["visits"] = $_SESSION["visits"] + 1;
	echo $_SESSION["visits"];

    if ($_SESSION["visits"] > 2)
    {
	 $insert=true;
	}
	else{
		$insert=true;
	}

if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	

}
?>

<div class="">
<h3 align="center" >Chat room</h3>
<form action="" method="post" enctype="multipart/form-data" id="container">
<div class="chat-header">
<h4>Chat Box</h4>
<a  href="logout.php"  id="logout"><img src="images/icons/cross.png" height="30px" width="30px"></a>
</div>


<table>
    <tr>
      <td colspan="2">
     
<?php
	  	$chatid = 	"";
		$text	=	"";
		if(isset($_SESSION['user'])){
	 
	  $username= $_SESSION["user"];
  }
  else if(isset($_SESSION['dname'])){
	   
		$username= $_SESSION["dname"];
	  
  }
		
	  	$error="";
		
	  	if(isset($_POST["submit"])) {
			
			//echo $_POST["submit"];
		$text = isset($_POST['text']) ? $_POST['text'] : "";
		echo $text;
			
			/*if("" == $text){
				//break;
			}
			*/
			$count=0;
			$RequestSignature = md5($_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'].print_r($_POST, true));
           // echo $RequestSignature;
			//if($RequestSignature){
				//$count++;
				
			//}
			
			if($insert) {
							
               
				  
				  $sql=" INSERT INTO chat(text,fk_user_id) VALUES ('$text','$username') ";
				$_POST["submit"]="";
				
				//echo $_POST["submit"];
				
				//echo $sql;
				$result = mysqli_query($connection,$sql);
				if($result) {
					//echo "Data Submitted";		
				    
						$text="";
						$username="";
						//echo $text;
						header("location: ci.php?");
							die();
						
				} else {
					echo mysqli_error();	
				}	
			  }				
			} else {
				echo $error;	
			}
	  ?>
      </td>
      </tr>
	  
	 
	   <?php
				$sql=" SELECT * FROM chat";
				//echo $sql;
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo"<td><img src='images/icons/user.png' width='50px' height='50px'>".$row['fk_user_id'].":".$row['text']."</td>";
				
				}
				
			  ?>
	  
    
	


  
  </table>
   <div class="form-group">
    <label for="exampleInputName"> Message</label>
    <input type="text" class="form-control" id="text" name="text" placeholder="Name">
  </div>
   <button onclick="myFunction()" type="submit" name="submit" id="submit" value="Send" class="btn btn-default">Send </button>
</form>


</div>


<script>

$(document).ready(function(e){
	$.ajaxSetup({cache:false});
	setInterval(function(){$('#text').load('ci.php');}, 2000); });
	
	
</script>

   <!--Sidebar-->	
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">
                    
                  <h3>List</h3>
				  <?php
								$sql=" SELECT doctor.dname,user.username FROM doctor, user";
									//echo $sql;
									$result = mysqli_query($connection,$sql) or die(mysqli_error());
									while($row = mysqli_fetch_assoc($result)) 		
								{
									
									if(isset($_SESSION['dname']))
									{
									
									echo "<h3>".$row['username']."<a href='chatindex.php'>Chat</a></h3>";
									}
									else if(isset($_SESSION['user']))
									{
										echo "<h3>".$row['dname']."<a href='chatindex.php'>Chat</a></h3>";
									}
								}
							?>
                        
                        
                       
                      
                        
                       
                    
                                
                    </aside>
                
                    
                </div>
                <!--Sidebar-->  
        </div>
    </section>
    
    

  
    
   
    
  <?php
  include("footer.php");
  ?>