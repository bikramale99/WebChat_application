<?php

include ("head.php");
?>

<div class="container">

	<div class="col-lg-8 col-md-8 col-sm-8">
		<div class="white-container">
			<span class="title">REGISTER</span>

			<!-- Form Register -->
			<form action="" method="post">

				<?php
				if (isset($_POST['reg'])) {
					$code = rand(100, 999);
					$FIRSTNAME = $_POST['FIRSTNAME'];
					$LASTNAME = $_POST['LASTNAME'];
					$USERNAME=$_POST['USERNAME'];
					
					$ADDRESS = $_POST['ADDRESS'];
					$CONTACT_NUMBER = $_POST['CONTACT_NUMBER'];
				
					$EMAIL = $_POST['EMAIL'];
					$PASSWORD = $_POST['PASSWORD'];
					$CON_PWD = $_POST['CON_PWD'];
					
					$sql="SELECT * FROM USER";
					$result = mysqli_query($connection, $sql);
		oci_execute($result);
		while ($row = mysqli_fetch_assoc($result)) {
		$UNAME = $row['USERNAME'];
		
		}
			if($UNAME==$USERNAME){
				echo "Use different Username</br>Go back to Register Page</br>";
				echo "<a href='register.php' class='btn btn-success btn-sm pull-right'>Register</a>";
				die();
			}else{			
					
					

					require 'mail/Send_Mail.php';
					$subject = "Account Verification";
					$to = $EMAIL;
					$body = "Hello<br/>Your verification code is $code <br/>Double AB Online Shop";
					// HTML  tags
					$mail = Send_Mail($to, $subject, $body);
					if ($mail) {
										
						$sql = "INSERT INTO user(FIRSTNAME,LASTNAME,USERNAME,ADDRESS,CONTACT_NUMBER,EMAIL,PASSWORD,CON_PWD,CODE,STATUS)VALUES('$FIRSTNAME','$LASTNAME','$USERNAME','$ADDRESS','$CONTACT_NUMBER','$EMAIL','$PASSWORD','$CON_PWD','$code','Disable')";
						$result = oci_parse($connection, $sql);
						oci_execute($result);
						if ($result) {
							echo "<script language='javascript'>window.location.href='activate.php?u=$USERNAME'</script>";
							die();
						}
					} else {
						echo "<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css'>
<script src='https://code.jquery.com/jquery-1.10.2.min.js'></script>
<script src='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js'></script>

<body onLoad=$('#my-modal').modal('show');>
    <div id='my-modal' class='modal fade'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden=true'>&times;</button>
                <h4 class='modal-title'>Verification Code</h4>
                </div>
                <div class='modal-body'>
                  <h4 class='modal-title'> Insert A Valid Email Address!!</h4>
            </div>
        </div> 
    </div>
</body>";
					}
					}
				}
				?>

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="first_name">First Name (*)</label>
					<input type="text" class="form-control" id="first_name" name="FIRSTNAME">
					<br clear="all"/>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="last_name">Last Name (*)</label>
					<input type="text" class="form-control" id="last_name" name="LASTNAME">
					<br clear="all"/>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="username">Address (*)</label>
					<input type="text" class="form-control" id="username" name="ADDRESS">
					<br clear="all"/>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="username">Contact Number (*)</label>
					<input type="text" class="form-control" id="username" name="CONTACT_NUMBER">
					<br clear="all"/>
				</div>
				
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="email">Email (*)</label>
					<input type="text" class="form-control" id="email" name="EMAIL">
					<br clear="all"/>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="username">Username (*)</label>
					<input type="text" class="form-control" id="username" name="USERNAME">
					<br clear="all"/>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="password">Password (*)</label>
					<input type="password" class="form-control" id="password" name="PASSWORD">
					<br clear="all"/>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<label for="confirm_password">Confirm Password (*)</label>
					<input type="password" class="form-control" id="confirm_password" name="CON_PWD">
					<br clear="all"/>
				</div>
				<div class="clearfix"></div>
				

				<button name="reg" type="submit" class="btn btn-danger">
					Register
				</button>
			</form>
			<!-- End Form Register -->
		</div>

	</div>

	<div class="col-lg-4 col-md-4 col-sm-4">

		<!-- Login Form -->
		<div class="white-container">
			<span class="title">ALREADY REGISTERED ?</span>
			<form role="form" action="login.php" method="post">
				<div class="form-group">
					<div class="input-group login-input">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" placeholder="Username" name="USERNAME">
					</div>
					<br>
					<div class="input-group login-input">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-control" placeholder="Password" name="PASSWORD">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox">
							Remember me </label>
					</div>
					<button type="submit" class="btn btn-sm btn-primary pull-right" name="login">
						<i class="fa fa-long-arrow-right"></i> Login
					</button>
					<button type="button" class="btn btn-xs btn-primary btn-login-social">
						<i class="fa fa-facebook"></i>
					</button>
					<button type="button" class="btn btn-xs btn-info btn-login-social">
						<i class="fa fa-twitter"></i>
					</button>
					<button type="button" class="btn btn-xs btn-danger btn-login-social">
						<i class="fa fa-google-plus"></i>
					</button>
				</div>
			</form>
		</div>
		<!-- End Login Form -->

	</div>

</div>