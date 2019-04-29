<?php
//Daniel Garson 
//CIS 193
//Due: 2-10-19


//create variables
$result=" ";
$formatPay = " ";
$hoursworked = " ";
$formatbase = " ";
$overtime = " ";
$overtimeformat = " ";
$totalPay = " ";
$formatTotal = " ";

if(isset($_POST['calc']))
{
		$value1=$_POST['input1'];
		$value2=$_POST['input2'];
		
		
		$hoursworked = $value1;
		$payrate = $value2;
		
		//money format
		$formatPay = number_format($payrate, 2, '.', '');
		
		$result=$value1*$value2;
		$formatbase = number_format($result, 2, '.', '');
		
		//check for overtime hrs if true add time and a half
		if($hoursworked >40){
		$overtime = $formatPay * 1.5;
		$overtimeformat = number_format($overtime, 2, '.', '');
		}
		
		//total
		$totalPay = $overtimeformat + $formatbase;
		$formatTotal = number_format($totalPay, 2, '.', '');

}	

?>


<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
	<title>Part 2B</title>
</head>
<body>
<p>  Calculates an employee’s weekly gross salary. If greater than 40hr you earn time-and-a-half.</p>
<form action="partB.php" method="post">
	<label> Enter Numbers of Hours Worked</label><br>
	<input type="text" name ="input1"><br>
	<label> Enter Hourly wages</label><br>
	<input type="text" name ="input2"><br>
	<input type="submit" name="calc" value="Add"><br><br>
	
		Number of Hours worked: <?php echo $hoursworked ?><br>
		Rate of Pay: $<?php echo $formatPay ?><br>
		Base Pay is $<?php echo $formatbase ?><br>
		Overtime Pay is $<?php echo $overtimeformat ?><br>
		Total Pay is $<?php echo $formatTotal ?><br>

	
	
	

</body>
</html>