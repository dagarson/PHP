<?php
//Daniel Garson 
//CIS 193
//Due: 2-10-19


//create variables 
$result=" ";
$after10=" ";
$totalPrice=" ";
$format = " ";

$orLength = " ";
$orWidth = " ";
$orprice = " ";

if(isset($_POST['calc']))
{
		$value1=$_POST['input1'];
		$value2=$_POST['input2'];
		$value3=$_POST['input3'];
		
		//used to display original values
		$orLength = $value1;
		$orWidth = $value2;
		$orprice = $value3;
		
		// calculations before adding 10% after adding 10% and formatting for money.
		$result=$value1*$value2;
		$after10=$result*1.10;
		$totalPrice=$after10 *$value3;
		$format = number_format($totalPrice, 2, '.', '');
		
}	

?>


<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
	<title>Part 2A</title>
</head>
<body>
<p> Enter the Lenght in Linear ft, the Width in Linear ft and the Price per Square ft</p>
<form action="part2A.php" method="post">
	<label> Enter Length</label><br>
	<input type="text" name ="input1"><br>
	<label> Enter Width</label><br>
	<input type="text" name ="input2"><br>
	<label> Enter price</label><br>
	<input type="text" name ="input3"><br>
	<input type="submit" name="calc" value="Add"><br>
	<br><br>
	Length entered: <?php echo $orLength ?><br>
	Width entered: <?php echo $orWidth ?><br>
	Price entered: <?php echo $orprice ?><br><br>
	
	Number of squareft Needed before 10%: <?php echo $result ?><br>
	Number of squareft Needed after 10%: <?php echo $after10 ?><br>
	Cost to the User $ <?php echo $format ?><br>
	
	

</body>
</html>