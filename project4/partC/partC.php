<!doctype html>
<!--Daniel Garson
CIS 193
Project 4-->
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>part C</title>
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
	
<?php
	
	

 $mysqli = new mysqli("localhost", "carsUser", "myPassword", "cars");
 
 //test connection
 if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}

	$query = "SELECT * FROM `cars`";
	
	//order by make
	if (isset($_POST["makeSort"])){
		$query = 'SELECT * FROM `cars` ORDER BY `make`';
	} 
	
	//order by model
	if (isset($_POST["modelSort"])){
		$query = 'SELECT * FROM `cars` ORDER BY `model`';
	} 
	
	//get car with highest mpg
	if (isset($_POST["mpgBest"])){
		$query = 'SELECT * FROM `cars` WHERE mpg=(select max(mpg) from cars)';
	} 
  
  //get car with lowest mpg
 if (isset($_POST["worstMPG"])){
		$query = 'SELECT * FROM `cars` WHERE mpg=(select min(mpg) from cars)';
	} 
  if ($result = $mysqli->query($query)) {
	  
	  //display table
	echo '<form action="partC.php" method="post"><table ><tr>	
			<th>make
   			<span class="parent"> 
				<button type="submit" name="makeSort">
					<p>Sort</p>
				</button>
				
			</span>
   			</th>
			<th>model
   			<span class="parent"> 
				<button type="submit" name="modelSort">
					<p>Sort</p>
				</button>
			</span>	
			</th>
			<th>year</th>
			<th>price</th>
			<th>mpg 
			<span class="parent"> 
				<button type="submit" name="mpgBest">
					<p>Best</p>
				</button>
				
			</span>
			<span class="parent"> 
				<button type="submit" name="worstMPG">
					<p>Worst</p>
				</button>
				
			</span>
			</th>
			</tr>'; 

   /* fetch results by row */
 	while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row["make"].
	 "</td><td>".$row["model"].
	 "</td><td>".$row["year"].
	 "</td><td>".$row["price"].
	 "</td><td>".$row["mpg"]."</td></tr>";
			 
    }

	echo '</table></form>';

  /* free the result set */
  $result->close();
 }

 /* close the connection */
 $mysqli->close();
?>	

</body>
</html>
