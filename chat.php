<html>
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
<body>
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

<div class="container">
<form action="" method="post" enctype="multipart/form-data" id="container">
<div>
<a href="logout.php" align="right" id="logout">Logout</a>
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
			if($RequestSignature){
				$count++;
				
			}
			
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
						header("location: chat.php?");
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
							echo"<td>".$row['fk_user_id'].":".$row['text']."</td>";
				
				}
				
			  ?>
	  
    <tr>
	
      <td>
<br/>	  
Message</td>

      <td><input name="text" type="text" id="text" size="50" value=" " /></td>
    </tr>

  
   
    
   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Send" /></td>
    </tr>
  </table>
</form>


</div>


<script>

$(document).ready(function(e){
	$.ajaxSetup({cache:false});
	setInterval(function(){$('#text').load('chat.php');}, 2000); });
	
	
</script>
</body>
<html>