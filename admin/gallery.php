<?php
include("header.php");
/* 
* The below code is for delete the items
* Where click on delete button it will have mode and id variable via GET Method
* mode containt del and id contain the id of particular row. 
* 
*/
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM gallery WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
/* End of Delete  */
?>
<h2>Gallery</h2>

<p><a href="galleryadd.php">Add New Photos</a>
  </p>
<table width="800" border="0" cellspacing="1" cellpadding="4">
  <tr>
    
    <td><strong>S.N</strong></td>
    
	<td><strong>Picture</strong></td>
 
  </tr>
  <?php
  	$sql=" SELECT * FROM gallery";
	//echo $sql;
	$result = mysqli_query($connection,$sql) or die(mysqli_error());
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td> <img width='80' height='80' src='../assets/img/".$row['picture']."'></td>";
		echo "<td>  <a href=?id=".$row['id'].">Update</a> <a onclick='return confirmDel()' href=?mode=del&id=".$row['id'].">Delete</a> </td>";
		
		echo "</tr>";	
	}
  ?>
  
</table>
<p><br />
  <!-- please add this script to separate file like script.js -->
  <script>
  	function confirmDel(){
		var con = confirm("Are you sure you want to delete\n It will delete the data permanetly");
		if(con) {
			return true;	
		} else {
			return false;
		}	
	}	
  </script>
  
  
</p>
<?php
include("footer.php");
?>