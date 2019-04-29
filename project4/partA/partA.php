<!doctype html>

<!--Daniel Garson
CIS 193
Project 4-->
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>part A</title>
	
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
 $mysqli = new mysqli("localhost", "countriesUser", "myPassword", "countries");
 if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}

	//select all data from table 
	$query = "SELECT * FROM `countries`";
	
	//sorting country name by ASC/DESC
	if (isset($_POST["county_nameASC"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_name`';
	} 
	if (isset($_POST["county_nameDesc"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_name` DESC';
	}
	
		//sorting country population by ASC/DESC
	if (isset($_POST["county_populationASC"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_population`';
	} 
	if (isset($_POST["county_populationDesc"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_population` DESC';
	}
	
		//sorting country code by ASC/DESC
	if (isset($_POST["county_codeASC"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_code`';
	} 
	if (isset($_POST["county_codeDesc"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_code` DESC';
	}
		//sorting country land area by ASC/DESC
		if (isset($_POST["county_land_areaASC"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_land_area`';
	} 
	if (isset($_POST["county_land_areaDesc"])){
		$query = 'SELECT * FROM `countries` ORDER BY `county_land_area` DESC';
	}
  
 
  if ($result = $mysqli->query($query)) {
	  //echo table
	echo '<form action="partA.php" method="post"><table ><tr>
	
			<th>state_name</th>
			<th>county_name
   			<span class="parent"> 
				<button type="submit" name="county_nameASC">
					<p>ASC</p>
				</button>
				<button type="submit" name="county_nameDesc">
					<p>DESC</p>
				</button>
			</span>
   			</th>
			
			
			<th>state_code</th>
		
			<th>county_population
   			<span class="parent"> 
				<button type="submit" name="county_populationASC">
					<p>ASC</p>
				</button>
				<button type="submit" name="county_populationDesc">
					<p>DESC</p>
				</button>
			</span>	
			</th>
		
			<th>county_code
			<span class="parent"> 
				<button type="submit" name="county_codeASC">
				<p>ASC</p>
				</button>
				<button type="submit" name="county_codeDesc">
				<p>DESC</p>
				</button>
			</span>
			</th>
			
			<th>county_land_area
			<span class="parent"> 
				<button type="submit" name="county_land_areaASC">
					<p>ASC</p>
				</button>
				<button type="submit" name="county_land_areaDesc">
				<p>DESC</p>
				</button>
			</span>
			</th>
			
			</tr>'; 

   //get results to table
 	while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row["state_name"].
	 "</td><td>".$row["county_name"].
	 "</td><td>".$row["county_land_area"].
	 "</td><td>".$row["county_population"].
	 "</td><td>".$row["state_code"].
	 "</td><td>".$row["county_code"]."</td></tr>";
			 
    }

	echo '</table></form>';


  $result->close();
 }

//close connection
 $mysqli->close();
?>	

</body>
</html>