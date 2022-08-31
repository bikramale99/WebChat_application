<?php
include("../connection.php");
// Check wheather the session exists. if not send back to login page. 
if(!isset($_SESSION["adminuser"])) {
	header("location:dashboard.php");
	die();
}
?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
</head>

<body>
<table width="950" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td bgcolor="green"><table width="100%" border="0" cellspacing="1" cellpadding="4">
      <tr>
        <td><h1>Admin Panel</h1></td>
        <td align="right">Welcome User: <?php echo $_SESSION["adminuser"];?> |  <a href="logout.php">Log Out</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="yellow"><table width="100%" border="0" cellspacing="1" cellpadding="4">
      <tr>
        <td align="center"><a href="dashboard.php">Home</a></td>
        <td align="center"><a href="about.php">About</a></td>
        
        <td align="center"><a href="gallery.php">Gallery</a></td>
        
        <td align="center"><a href="services.php">Services</a></td>
       
        <td align="center"><a href="news.php">News</a></td>

        
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>