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
                            <small>Add Hospital Information
                            </li></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="hospital.php">Hospital</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add Hospital Information
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
			<h2>Add New Description</h2>
			<form action="" method="post" enctype="multipart/form-data" name="frmItemsAdd" id="frmItemsAdd">
			<table>
				<tr>
				  <td colspan="2">
				   <?php
					
						$hospital_name	=	"";
					$location	=	"";
					$phone	=	"";
					$web	=  "";
					$pob	=	"";
					$image	=	"";
					
					$error= "";
					if(isset($_POST["submit"])) {
					
						
						$hospital_name	=$_POST["hospital_name"];
						$location	=$_POST["location"];
						$phone	=$_POST["phone"];
						$web	=	$_POST["web"];
						$pob	=$_POST["pob"];
				
						$image	=	"";
							
						if($hospital_name=="" || $location=="") {
							$error.="Please fill all the required fields. <br> ";	
						}									
						
					
						if($error=="") {
							if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
								move_uploaded_file($_FILES["image"]["tmp_name"],"../images/hospital/".$_FILES["image"]["name"]);
								$image = $_FILES["image"]["name"];
							}
							$sql=" INSERT INTO hospital(hospital_name,location,phone,web,pob,image) VALUES ('$hospital_name', '$location','$phone','$web','$pob','$image') ";
							//echo $sql;
							$result = mysqli_query($connection,$sql);
							if($result) {
								echo "Data Submitted";		
							
							$hospital_name	="";
						$location	="";
						$phone	="";
						$web	="";
						$pob	="";
							
								
							} else {
								echo mysqli_error();	
							}									
						} 
						else {
							echo $error;	
						}
						
						
						
					}
			?>
				  </td>
				  </tr>
			   
				<tr>
				  <td>Hospital Name</td>
				  <td><input name="hospital_name" type="text" id="hospital_name" size="50" class="form-control"  value=" " /></td>
				</tr>
				<tr>
				  <td>Location</td>
				  <td><input name="location" type="text" id="location" size="50" class="form-control"  value=" " /></td>
				</tr>
				<tr>
				  <td>Phone</td>
				  <td><input name="phone" type="text" id="phone" size="50" class="form-control"  value=" " /></td>
				</tr>
			<tr>
				  <td>Web</td>
				  <td><input name="web" type="text" id="web" size="50" class="form-control"  value=" " /></td>
				</tr>
			   <tr>
				  <td>POB</td>
				  <td><input name="pob" type="text" id="pob" size="50" class="form-control"  value=" " /></td>
				</tr>
				
			   <tr>
			<td>Feature Image </td>
			<td>
			<input type="file" name="image" id="image" />
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