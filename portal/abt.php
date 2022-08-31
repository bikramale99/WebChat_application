<?php

include("head.php");
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           About
                            <small>Add description</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="abt.php">ABOUT</a>
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
							$about_id=$_GET["id"];
							$sql="DELETE FROM about WHERE about_id='$about_id'";
							$result=mysqli_query($connection,$sql);
							
						}
					}
					/* End of Delete  */
					?>
					<h2>About</h2>

					<p><a href="abtadd.php">Add New Description</a>
					  </p>
					<table class="table table-bordered" >
					  <tr>
						
						<td><strong>Title</strong></td>
						<td><strong>Description</strong></td>
						<td><strong>Update/Delete</strong></td>
					 
					  </tr>
					  <?php
						$sql=" SELECT * FROM about ";
						//echo $sql;
						$result = mysqli_query($connection,$sql) or die(mysqli_error());
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
						
							echo "<td>".$row['heading']."</td>";
							echo "<td>".substr($row['about_description'],0,100)."</td>";
							
							echo "<td>  <a href=abtupdate.php?id=".$row['about_id'].">Update</a> <a onclick='return confirmDel()' href=?mode=del&id=".$row['about_id'].">Delete</a> </td>";
							
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