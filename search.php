	<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Ajax Live Data Search using Jquery PHP MySql</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>

	<script>
								$(document).ready(function(){

								 load_data();

								 function load_data(query)
								 {
								  $.ajax({
								   url:"fetch.php",
								   method:"POST",
								   data:{query:query},
								   success:function(data)
								   {
									$('#result').html(data);
								   }
								  });
								 }
								 $('#search_text').keyup(function(){
								  var search = $(this).val();
								  if(search != '')
								  {
								   load_data(search);
								  }
								  else
								  {
								   load_data();
								  }
								 });
								});
								</script>
								
								
								<?php
									
								
										$output = '';
										if(isset($_POST["query"]))
										{
										 $search = mysqli_real_escape_string($connection, $_POST["query"]);
										 $query = "
										  SELECT * FROM doctor 
										  WHERE dname LIKE '%".$search."%'
										  OR  department'%".$search."%' 
										  OR education '%".$search."%' 
										  OR dsignation LIKE '%".$search."%' 
										  OR past_affiliation '%".$search."%'
										 ";
										}
										else
										{
										 $query = "
										  SELECT * FROM doctor ORDER BY doctor_id
										 ";
										}
										$result = mysqli_query($connection, $query);
										if(mysqli_num_rows($result) > 0)
										{
										 $output .= '
										  <div class="table-responsive">
										   <table class="table table bordered">
											<tr>
											 <th>Customer Name</th>
											 <th>Address</th>
											 <th>City</th>
											 <th>Postal Code</th>
											 <th>Country</th>
											</tr>
										 ';
										 while($row = mysqli_fetch_array($result))
										 {
										  $output .= '
										   <tr>
											<td>'.$row["dname"].'</td>
											<td>'.$row["education"].'</td>
											<td>'.$row["department"].'</td>
											<td>'.$row["dsignation"].'</td>
											<td>'.$row["past_affiliation"].'</td>
										   </tr>
										  ';
										 }
										 echo $output;
										}
										else
										{
										 echo 'Data Not Found';
										}

										?>