<!doctype html>
<!--Daniel Garson
CIS 193
Project 4-->
<html>
<head>
<meta charset="utf-8">
<title>partD</title>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
		//display form
	<form action="partD.php" method="post">	
	Name: <input type="type" name="name">
	<br>
	Address: <input type="type" name="address">
	<br>
	Phone number: <input type="type" name="phone">
	<br>
	<input type="submit" value="insert">
	</form>
	
	<?php
	
//connection
	$con = mysqli_connect("localhost", "registrantsUser", "myPassword", "registrants");

	//test connection
	if(!$con)
	{
		echo 'Not connected';
	}
	
	if(!mysqli_select_db($con, 'registrants'))
	{
		echo 'Database not selected';
	}

	//set variables
	$Name = $_POST['name'];
	$Address = $_POST['address'];
	$telephone_number = $_POST['phone'];
	
	//insert statment
	$sql = "INSERT INTO registrants(Name,Address,telephone_number) VALUES('$Name','$Address','$telephone_number')";
	
	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
		
	}
	else{
		echo ' Inserted';
	}
	$con->close();
	
	//reopen connection
	$con = mysqli_connect("localhost", "registrantsUser", "myPassword", "registrants");
	
	//test connection
	if(!$con)
	{
		echo 'Not connected';
	}
	
	if(!mysqli_select_db($con, 'registrants'))
	{
		echo 'Database not selected';
	}
	
$query = "SELECT * FROM `registrants`";

//display all data
  if ($result = $con->query($query)) {
	echo '<form action="partD.php" method="post"><table ><tr>	
			<th>Name</th>
			<th>Address</th>
			<th>telephone_number</th>
			</tr>'; 

   /* fetch results by row */
 	while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row["Name"].
	 "</td><td>".$row["Address"].
	 "</td><td>".$row["telephone_number"]."</td></tr>";
			 
    }

	echo '</table></form>';

  /* free the result set */
  $result->close();
 }

 /* close the connection */
 $con->close();
?>

</body>
</html>