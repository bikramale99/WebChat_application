<?php

include("head.php");
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Contact
                            <small>Add description</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="contact.php">CONTACT</a>
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
							$contact_id=$_GET["id"];
							$sql="DELETE FROM contact WHERE contact_id='$contact_id'";
							$result=mysqli_query($connection,$sql);
							
						}
					}
					/* End of Delete  */
					?>
					<h2>Contact</h2>

					<table class="table table-bordered" >
					  <tr>
						
						<td><strong>Name</strong></td>
						<td><strong>Address</strong></td>
						<td><strong>Email</strong></td>
						<td><strong>Subject</strong></td><td
						><strong>Message</strong></td>
					
					  </tr>
					  <?php
						$sql=" SELECT * FROM contact ";
						//echo $sql;
						$result = mysqli_query($connection,$sql) or die(mysqli_error());
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
						
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['address']."</td>";
							echo "<td>".$row['email']."</td>";
							
							echo "<td>".$row['subject']."</td>";
							echo "<td>".$row['message']."</td>";
						
							
							
							echo "<td>   <a onclick='return confirmDel()' href=?mode=del&id=".$row['contact_id'].">Delete</a> </td>";
							
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