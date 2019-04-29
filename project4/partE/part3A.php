<!doctype html>
<!--Daniel Garson
CIS 193
Project 4-->
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title></title>
	
</head>
<body>

<!--Create form -->
<form method="post" action="part3A.php">


<p>Flight Number <input type="text" name="Flight_Number" /></p>
<p>Flight Date <input type="text" name="Flight_Date" /></p>
<p>Flight Time <input type="text" name="Flight_Time" /></p><br /><br />

<p>Friendliness of customer staff</p><br />
<input type="radio" name="Friendliness_of_customer_staff" value="No Opinion" />No Opinion<br />
<input type="radio" name="Friendliness_of_customer_staff" value="Poor" />Poor<br />
<input type="radio" name="Friendliness_of_customer_staff" value="Fair" />Fair<br />
<input type="radio" name="Friendliness_of_customer_staff" value="Good" />Good<br />
<input type="radio" name="Friendliness_of_customer_staff" value="Excellent" />Excellent<br /><br />

<p>Space for luggage storage</p><br />
<input type="radio" name="Space_for_luggage_storage" value="No Opinion" />No Opinion<br />
<input type="radio" name="Space_for_luggage_storage" value="Poor" />Poor<br />
<input type="radio" name="Space_for_luggage_storage" value="Fair" />Fair<br />
<input type="radio" name="Space_for_luggage_storage" value="Good" />Good<br />
<input type="radio" name="Space_for_luggage_storage" value="Excellent" />Excellent<br /><br />

<p>Comfort of seating</p><br />
<input type="radio" name="Comfort_of_seating" value="No Opinion" />No Opinion<br />
<input type="radio" name="Comfort_of_seating" value="Poor" />Poor<br />
<input type="radio" name="Comfort_of_seating" value="Fair" />Fair<br />
<input type="radio" name="Comfort_of_seating" value="Good" />Good<br />
<input type="radio" name="Comfort_of_seating" value="Excellent" />Excellent<br /><br />

<p>Cleanliness of aircraft</p><br />
<input type="radio" name="Cleanliness_of_aircraft" value="No Opinion" />No Opinion<br />
<input type="radio" name="Cleanliness_of_aircraft" value="Poor" />Poor<br />
<input type="radio" name="Cleanliness_of_aircraft" value="Fair" />Fair<br />
<input type="radio" name="Cleanliness_of_aircraft" value="Good" />Good<br />
<input type="radio" name="Cleanliness_of_aircraft" value="Excellent" />Excellent<br /><br />

<p>Noise level of aircraft</p><br />
<input type="radio" name="Noise_level_of_aircraft" value="No Opinion" />No Opinion<br />
<input type="radio" name="Noise_level_of_aircraft" value="Poor" />Poor<br />
<input type="radio" name="Noise_level_of_aircraft" value="Fair" />Fair<br />
<input type="radio" name="Noise_level_of_aircraft" value="Good" />Good<br />
<input type="radio" name="Noise_level_of_aircraft" value="Excellent" />Excellent<br /><br />

<p><input type="submit" value="Submit"  />
<input type="reset" value="Reset" /></p>
</form>
<!--send to second php doc-->
<p><a href="part3B.php">Show Past Survey Results</a></p>
<?php

	//test connection
	$con = mysqli_connect("localhost", "surveysUser", "myPassword", "surveys");
	if(!$con)
	{
		echo 'Not connected';
	}
	if(!mysqli_select_db($con, 'surveys'))
	{
		echo 'Database not selected';
	}
	
	//set variables
	$Flight_Number = $_POST['Flight_Number'];
	$Flight_Date = $_POST['Flight_Date'];
	$Flight_Time = $_POST['Flight_Time'];
	$Friendliness_of_customer_staff = $_POST['Friendliness_of_customer_staff'];
	$Space_for_luggage_storage = $_POST['Space_for_luggage_storage'];
	$Comfort_of_seating = $_POST['Comfort_of_seating'];
	$Cleanliness_of_aircraft = $_POST['Cleanliness_of_aircraft'];
	$Noise_level_of_aircraft = $_POST['Noise_level_of_aircraft'];
	
	//insert statement
	$sql = "INSERT INTO surveys(Flight_Number,Flight_Date,Flight_Time,Friendliness_of_customer_staff,Space_for_luggage_storage,
	Comfort_of_seating,Cleanliness_of_aircraft,Noise_level_of_aircraft) VALUES('$Flight_Number','$Flight_Date','$Flight_Time',
	'$Friendliness_of_customer_staff','$Space_for_luggage_storage','$Comfort_of_seating','$Cleanliness_of_aircraft','$Noise_level_of_aircraft')";
	
	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
		
	}
	else{
		echo ' Inserted';
	}
	$con->close();
	
?>
</body>
</html>














