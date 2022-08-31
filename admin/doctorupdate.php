<?php
include("head.php");
?>

  <div id="page-wrapper">
		<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          DOCTORS
                            <small>Add Doctor Information
                            </li></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="doctor.php">Doctor</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add Doctor Information
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
			<h2>Add New Articles</h2>
			<form action="" method="post" enctype="multipart/form-data" name="frmItemsAdd" id="frmItemsAdd">
			<table>
				<tr>
				  <td colspan="2">
				  	<?php

			$error = "";
		
			if (isset($_POST["submit"])) {
					
						$dname	=$_POST["dname"];
						$department	=$_POST["department"];
						$education	=$_POST["education"];
						$password	=	$_POST["password"];
						$dsignation	=$_POST["dsignation"];
						$past_affiliation	=$_POST["past_affiliation"];
						$image = "";

				if ($dname == "" || $department== "") {
					$error .= "Please fill all the required fields. <br> ";
				}

				if ($error == "") {
					if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
						move_uploaded_file($_FILES["image"]["tmp_name"], "../images/doctors/" . $_FILES["image"]["name"]);
						$image= $_FILES["image"]["name"];
						$sql = " UPDATE doctor set  dname='$dname', department='$department', education='$education',  password='$password', dsignation='$dsignation', past_affiliation='$past_affiliation',image='$image' WHERE doctor_id='$doctor_id' ";
					} else {
						$sql = " UPDATE doctor set  dname='$dname', department='$department', education='$education',  password='$password', dsignation='$dsignation', past_affiliation='$past_affiliation' ";
					}

					//echo $sql;
					//die();
					$result = mysqli_query($connection, $sql);
					if ($result) {
						echo "Data Updated";

					} else {
						echo mysqli_error();
					}
				} else {
					echo $error;
				}

			}

			$sql = " SELECT * FROM doctor  ";
			$result = mysqli_query($connection, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				
				$dname	=$row["dname"];
						$department	=$row["department"];
						$education	=$row["education"];
						$password	=	$row["password"];
						$dsignation	=$row["dsignation"];
						$past_affiliation	=$row["past_affiliation"];
				        $image = $row['image'];
			}
			?>
			
				  </td>
				  </tr>
			   
				<tr>
				  <td>Doctor Name</td>
				  <td><input name="dname" type="text" id="dname" size="50" class="form-control"  value=" <?php echo $dname ?>" /></td>
				</tr>
				<tr>
				  <td>Department</td>
				  <td><input name="department" type="text" id="department" size="50" class="form-control"  value="<?php echo $department ?> " /></td>
				</tr>
				<tr>
				  <td>Education</td>
				  <td><input name="education" type="text" id="education" size="50" class="form-control"  value="<?php echo $education ?>  " /></td>
				</tr>
			<tr>
				  <td>Password</td>
				  <td><input name="password" type="text" id="password" size="50" class="form-control"  value=" " /></td>
				</tr>
			   <tr>
				  <td>Dsignation</td>
				  <td><input name="dsignation" type="text" id="dsignation" size="50" class="form-control"  value=" " /></td>
				</tr>
				<tr>
				  <td>Past Affiliation</td>
				  <td><input name="past_affiliation" type="text" id="past_affiliation" size="50" class="form-control"  value=" " /></td>
				</tr>
			   <tr>
			<td>Feature Image </td>
			<td>
			<input type="file" name="image" id="image" />
				<br />
		<img src="../images/doctors/<?php echo $image; ?>" width="100" height="100" />
			</td>
		</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td><input class="btn btn-default" type="submit" name="submit" id="submit" value="Save Data" /></td>
				</tr>
			  </table>
			</form>

</div>
<?php
include("foot.php");
?>
