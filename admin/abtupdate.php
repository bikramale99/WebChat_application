<?php
include ("head.php");
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
                                <i class="fa fa-dashboard"></i>  <a href="abt.php">About</a>
                            </li>
							 <li class="active">
                                <i class="fa fa-file"></i> Update description
                            </li>
                          
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
			<h2>Update Items</h2>
			<?php
			$id = $_GET["id"];
			?>

						<form action="" method="post" enctype="multipart/form-data" name="frmItemsAdd" id="frmItemsAdd">
							<table>
								<tr>
									<td colspan="2">
									<?php

									$error = "";
									if (isset($_POST["submit"])) {
										
										$heading = $_POST["heading"];
										$description = $_POST["description"];
										

										if ($heading == "" || $description == "") {
											$error .= "Please fill all the required fields. <br> ";
										}

										if ($error == "") {
												$sql = " UPDATE about set  heading='$heading', about_description='$description' WHERE about_id='$id' ";
											}

											//echo $sql;
											//die();
											$result = mysqli_query($connection, $sql);
											if ($result) {
												echo "Data updated";

											} else {
												echo mysqli_error();
											}
										} else {
											echo $error;
										}

									

									$sql = " SELECT * FROM about WHERE about_id='$id' ";
									$result = mysqli_query($connection, $sql);
									while ($row = mysqli_fetch_assoc($result)) {
										
										$heading = $row['heading'];
										$description = $row['description'];
										
									}
									?></td>
								</tr>
								
								<tr>
									<td>Title*</td>
									<td>
									<input class="form-control"name="heading" type="text" id="heading" size="50" value="<?php echo $heading; ?>" />
									</td>
								</tr>
								<tr>
									<td valign="top">Description *</td>
									<td><textarea class="form-control" name="escription" id="description" cols="45" rows="5"><?php echo $description; ?></textarea></td>
								</tr>
								

								
								<tr>
									<td>&nbsp;</td>
									<td>
									<input  class="btn btn-default" type="submit" name="submit" id="submit" value="Save Data" />
									</td>
								</tr>
							</table>
						</form>

</div>
<?php
include ("foot.php");
?>