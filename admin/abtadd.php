<?php
include("head.php");
?>

  <div id="page-wrapper">
		<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="abt.php">ABOUT</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add Description
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
					$about_id 		= 	"";
					$heading			=	"";
					$description	=	"";
				
					$error="";
					if(isset($_POST["submit"])) {
					
						$heading			=	$_POST["heading"];
						$description	=	$_POST["description"];
					
						
						if($heading=="" || $description=="") {
							$error.="Please fill all the required fields. <br> ";	
						}									
						
					
						if($error=="") {
							
							$sql=" INSERT INTO about(heading,description) VALUES ('$heading', '$description') ";
							//echo $sql;
							$result = mysqli_query($connection,$sql);
							if($result) {
								echo "Data Submitted";		
							
								$heading			=	"";
								$description	=	"";
								
							} else {
								echo mysqli_error();	
							}									
						} else {
							echo $error;	
						}
						
						
						
					}
				  ?>
				  </td>
				  </tr>
			   
				<tr>
				  <td>Title *</td>
				  <td><input name="heading" type="text" id="heading" size="50" class="form-control"  value="<?php echo $heading; ?>" /></td>
				</tr>
				<tr>
				  <td valign="top">Description *</td>
				  <td><textarea name="description" id="description" class="form-control"><?php echo $description; ?></textarea></td>
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