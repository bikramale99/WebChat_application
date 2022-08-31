


<?php

include("../connection.php");

if (!isset($_SESSION["visits"]))
       $_SESSION["visits"] = 0;
    $_SESSION["visits"] = $_SESSION["visits"] + 1;
	echo $_SESSION["visits"];

    if ($_SESSION["visits"] > 2)
    {
	 $insert=false;
	}
	else{
		$insert=true;
	}

if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	

}
?>

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