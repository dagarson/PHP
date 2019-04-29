<!doctype html>
<!--Daniel Garson
CIS 193
Project 4-->
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>partA</title>
	
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
	
<?php
 $servername = "localhost";
 $username = "surveysUser";
 $password = "myPassword";
 $dbname = "surveys";
 
 //test connection
 $conn = new mysqli($servername,$username,$password,$dbname); 
 if($conn ->connect_error){
	 die("connection failed with a <strong><em>".$conn->connect_error."</em></strong> connect error");
	
 }
 //select all data
 $sql = "SELECT * FROM surveys";
 
 $result = $conn->query($sql);
 
 //display table
 if ($result->num_rows >0){
	 echo "<table><tbody><tr><th>Flight_Number</th>".
	 "<th>Flight_Date</th><th>Flight_Time</th>".
	 "<th>Friendliness_of_customer_staff</th><th>Space_for_luggage_storage</th>".
	  "<th>Comfort_of_seating</th><th>Cleanliness_of_aircraft</th>".
	 "<th>Noise_level_of_aircraft</th></tr>";
 
 while($row = $result->fetch_assoc()){
	 echo "<tr><td>".$row["Flight_Number"].
	 "</td><td>".$row["Flight_Date"].
	 "</td><td>".$row["Flight_Time"].
	 "</td><td>".$row["Friendliness_of_customer_staff"].
	 "</td><td>".$row["Space_for_luggage_storage"].
	  "</td><td>".$row["Comfort_of_seating"].
	 "</td><td>".$row["Cleanliness_of_aircraft"].
	 "</td><td>".$row["Noise_level_of_aircraft"]."</td></tr>";
 }
 echo"<tbody><table>";
 }else{
	 echo"0 results";
 }
 //close connection
 mysqli_close($conn);
 echo"<br><hr>connection closed"
 
?>	

</body>
</html>