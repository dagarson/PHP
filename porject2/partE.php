<?php
//Daniel Garson
//Cis 193
//Due: 2-10-19

//hides no value error not nessessary
error_reporting(0);

//variable
$orLength = " ";
$B = " ";
$C = " ";
$result = " ";

if(isset($_POST['calc']))
{
		$value1=$_POST['input1'];
		$value2=$_POST['input2'];
		$value3=$_POST['input3'];
		
		$A = $value1;
		$B = $value2;
		$C = $value3;
		
		//if statments any two sides must be greater than the third side.
		if( ($value1 + $value2 > $value3) or ($value1 + $value3 > $value2) or ($value2 + $value3 > $value1) )
		{
			//true
			$result = "YES";  
		}
		else
		{
			//false
			$result = "NO";  
		}
		
		
}	

?>


<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
	<title>Part E</title>
</head>
<body>
<p> Enter the Lenght of the three sides to determine if they can form a triangle.</p>
<form action="partE.php" method="post">
	<label> Side A</label><br>
	<input type="text" name ="input1"><br>
	<label> Side B</label><br>
	<input type="text" name ="input2"><br>
	<label> Side C</label><br>
	<input type="text" name ="input3"><br>
	<input type="submit" name="calc" value="Add"><br>
	<br><br>
	Side A: <?php echo $A ?><br>
	Side B: <?php echo $B ?><br>
	Side C: <?php echo $C ?><br>
	Is it a Triangle: <?php echo $result?>
	
	
	

</body>
</html>