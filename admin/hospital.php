<?php

include("head.php");
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           HOSPITAL
                            <small>Add description</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="hospital.php">Hospital</a>
                            </li>
                          
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
			
			<?php
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$hospital_id=$_GET["id"];
		$sql="DELETE FROM hospital WHERE hospital_id='$hospital_id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
/* End of Delete  */
?>
<h2>Hospital</h2>

<p><a href="hospitaladd.php">Add New Hospital Information</a>
  </p>
<table class="table table-bordered">
  <tr>
    
	
    <td><strong>Hospital name</strong></td>
    <td><strong>Location</strong></td>
    <td><strong>Phone</strong></td>
	<td><strong>Web</strong></td>
	<td><strong>POB</strong></td>
	<td><strong>Image</strong></td>

	
	
	
	<td><strong>Update/Delete</strong></td>
 
  </tr>
  <?php
  	$sql=" SELECT * FROM hospital ";
	//echo $sql;
	$result = mysqli_query($connection,$sql) or die(mysqli_error());
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row['hospital_name']."</td>";
		echo "<td>".$row['location']."</td>";	
		
		echo "<td>".$row['phone']."</td>";
			echo "<td>".$row['web']."</td>";
				echo "<td>".$row['pob']."</td>";
		echo "<td> <img width='80' height='80' src='../images/hospital/".$row['image']."'></td>";
		echo "<td>  <a href=hospitalupdate.php?id=".$row['hospital_id'].">Update</a> <a onclick='return confirmDel()' href=?mode=del&id=".$row['hospital_id'].">Delete</a> </td>";
		
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
      </div>
        <!-- /#page-wrapper -->



<?php

include("foot.php")

?>