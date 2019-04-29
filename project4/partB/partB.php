<!doctype html>
<!--Daniel Garson
CIS 193
Project 4-->
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>part B</title>
	
		<!--Style table-->
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
	
	
//connection
 $mysqli = new mysqli("localhost", "countriesUser", "myPassword", "wwwcountries");

 if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}
	//select all data from table 
	$query = "SELECT * FROM `wwwcountries`";
	
	//sorting country name by ASC/DESC
	if (isset($_POST["country_nameASC"])){
		$query = 'SELECT * FROM `wwwcountries` ORDER BY `country name`';
	} 
	if (isset($_POST["country_nameDesc"])){
		$query = 'SELECT * FROM `wwwcountries` ORDER BY `country name` DESC';
	}
	
	//sorting country population by ASC/DESC
	if (isset($_POST["country_populationASC"])){
		$query = 'SELECT * FROM `wwwcountries` ORDER BY `country population`';
	} 
	if (isset($_POST["country_populationDesc"])){
		$query = 'SELECT * FROM `wwwcountries` ORDER BY `country population` DESC';
	}
	
  
 
  if ($result = $mysqli->query($query)) {
	   //echo table
	echo '<form action="partB.php" method="post"><table ><tr>
	
			<th>country_name
   			<span class="parent"> 
				<button type="submit" name="country_nameASC">
					<p>ASC</p>
				</button>
				<button type="submit" name="country_nameDesc">
					<p>DESC</p>
				</button>
			</span>
   			</th>
			
			<th>country_population
   			<span class="parent"> 
				<button type="submit" name="country_populationASC">
					<p>ASC</p>
				</button>
				<button type="submit" name="country_populationDesc">
					<p>DESC</p>
				</button>
			</span>	
			</th>
			
			<th>area by kilometer</th>
			
			<th>population density</th>
			
			<th>area by miles squared</th>
			
			<th>population density by miles squared</th>
			
			</tr>'; 

  //get results to table
 	while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row["country name"].
	 "</td><td>".$row["country population"].
	 "</td><td>".$row["area by kilometers"].
	 "</td><td>".$row["population density by kilometers"].
	 "</td><td>".$row["area by miles squared"].
	 "</td><td>".$row["population density by miles squared"]."</td></tr>";
			 
    }

	echo '</table></form>';


  $result->close();
 }

//close connection
 $mysqli->close();
?>	

</body>
</html>