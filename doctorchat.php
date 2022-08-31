<?php

include("../connection.php");

if(!isset($_SESSION["user"])) {
	header("location:home.php");
	die();
}
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];

}
?>

<form action="" method="post" enctype="multipart/form-data" name="frmItemsAdd" id="frmItemsAdd">
<table width="600" border="0" cellspacing="1" cellpadding="4">
    <tr>
      <td colspan="2">
      <?php
	  	$chatid 		= 	"";
		$text	=	"";
		
	
	  	$error="";
	  	if(isset($_POST["submit"])) {
		
			$text		=	$_POST["text"];
		
		
		
		
											
			
		
			if($error=="") {
				
				$sql=" INSERT INTO chat(text) VALUES ('$text') ";
				//echo $sql;
				$result = mysqli_query($connection,$sql);
				if($result) {
					//echo "Data Submitted";		
				
						$text	=	"";
						
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
	  
	 
	   <?php
  	$sql=" SELECT * FROM chat";
	//echo $sql;
	$result = mysqli_query($connection,$sql) or die(mysqli_error());
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
	
		echo "<td>".$_SESSION["user"].":".$row['text']."</td>";
		
		
		echo "</tr>";	
	}
	
  ?>
	  
    <tr>
      <td><?php echo $_SESSION["user"];?>:</td>
      <td><input name="text" type="text" id="text" size="50" value=" " /></td>
    </tr>

  
   
    
   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Save Data" /></td>
    </tr>
  </table>
</form>
<script>

$(document).ready(function(e){
	$.ajaxSetup({cache:false});
	setInterval(function(){$('#text').load('chat.php');}, 2000); });
</script>
