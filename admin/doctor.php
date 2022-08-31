<?php

include("head.php");
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Doctor
                            <small>Add description</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="abt.php">DOCTOR</a>
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
		$doctor_id=$_GET["id"];
		$sql="DELETE FROM doctor WHERE doctor_id='$doctor_id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
/* End of Delete  */
?>
<h2>Doctor</h2>

<p><a href="doctoradd.php">Add New Doctor Description</a>
  </p>
<table class="table table-bordered">
  <tr>
    
	
    <td><strong>Doctor Name</strong></td>
    <td><strong>Department</strong></td>
    <td><strong>Education</strong></td>
	<td><strong>Password</strong></td>
	<td><strong>Image</strong></td>
	<td><strong>Designation</strong></td>
	<td><strong>Past Afiiliation</strong></td>
	
	
	
	<td><strong>Update/Delete</strong></td>
 
  </tr>
  <?php
  	$sql=" SELECT * FROM doctor ";
	//echo $sql;
	$result = mysqli_query($connection,$sql) or die(mysqli_error());
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
	
		echo "<td>".$row['dname']."</td>";	
		
		echo "<td>".$row['department']."</td>";
			echo "<td>".$row['education']."</td>";
				echo "<td>".$row['password']."</td>";
		echo "<td> <img width='80' height='80' src='../images/doctors/".$row['image']."'></td>";
			echo "<td>".$row['dsignation']."</td>";
				echo "<td>".$row['past_affiliation']."</td>";
		echo "<td>  <a href=doctorupdate.php?id=".$row['doctor_id'].">Update</a> <a onclick='return confirmDel()' href=?mode=del&id=".$row['doctor_id'].">Delete</a> </td>";
		
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