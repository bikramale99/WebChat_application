<?php
include ("header.php");
?>
<h2>Add New Photos</h2>

<form action="" method="post" enctype="multipart/form-data" name="frmItemsAdd" id="frmItemsAdd">
	<table width="600" border="0" cellspacing="1" cellpadding="4">
		<tr>
			<td colspan="2">
				<?php

				$error = "";
				if (isset($_POST["submit"])) {

					$picture = "";

					if ($error == "") {
						if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
							move_uploaded_file($_FILES["picture"]["tmp_name"], "../assets/img/" . $_FILES["picture"]["name"]);
							$picture = $_FILES["picture"]["name"];
						}
						$sql = " INSERT INTO gallery (picture) VALUES ('$picture') ";
						//echo $sql;
						$result = mysqli_query($connection, $sql);
						if ($result) {
							echo "Data Submitted";
							$picture = "";

						} else {
							echo mysqli_error();
						}
					} else {
						echo $error;
					}

				}
			?></td>
		</tr>

		<tr>
			<td>Feature Image </td>
			<td>
			<input type="file" name="picture" id="picture" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="submit" name="submit" id="submit" value="Save Data" />
			</td>
		</tr>
	</table>
</form>
<?php
include ("footer.php");
?>