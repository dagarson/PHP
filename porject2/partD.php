<!--Daniel Garson
CIS 193
Due: 2-10-19-->

<!doctype html>
<html>
<body>
	<p>Enter a Year to find out if its a leap year. </p>
	<form action="partD.php" method="post">
		<input type="text" name="year" /><br>
		<input type="submit" /><br>
	
	
	<?php 
 
	if( $_POST )
	{	
		//get the year
		$year = $_POST[ 'year' ];
		
		
		//conditional statments to check if is a leap year
		if( (0 == $year % 4) and (0 != $year % 100) or (0 == $year % 400) )
		{
			//true
			echo $year . ' is a leap year';  
		}
		else
		{
			//false
			echo $year .' is not a leap year';  
		}
 
	}
	
?>
	</form>
</body>
</html>
 
