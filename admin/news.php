<?php

include("head.php");
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            News
                         
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
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
								$news_id=$_GET["id"];
								$sql="DELETE FROM news WHERE news_id='$news_id'";
								$result=mysqli_query($connection,$sql);
								
							}
						}
						/* End of Delete  */
						?>
						<h2>News</h2>

						<p><a href="articleadd.php">Add News News</a>
						  </p>
						<table class="table table-bordered">
						  <tr>
							
							<td><strong>Picture</strong></td>
							<td><strong>Title</strong></td>
							<td><strong>Description</strong></td>
							
						 
						  </tr>
						  <?php
							$sql=" SELECT * FROM news ";
							//echo $sql;
							$result = mysqli_query($connection,$sql) or die(mysqli_error());
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								
							   echo "<td> <img width='80' height='80' src='../img/".$row['image']."'></td>";	
								echo "<td>".$row['title']."</td>";
								echo "<td>".substr($row['description'],0,100)."</td>";
								
								echo "<td>  <a href=?id=".$row['news_id'].">Update</a> <a onclick='return confirmDel()' href=?mode=del&id=".$row['news_id'].">Delete</a> </td>";
							
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
