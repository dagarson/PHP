<!--Daniel Garson
CIS 193
Due: 2-10-19-->

<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Project 2C</title>
</head>
<body>
<form action="partC.php" method="post">
<label> Enter Numbers of Pennies</label><br>
<input type="text" name="money"><br>
<input type="submit">
</form>	
		
<?php
//create function
function modCurrency($money){
	
//create variables
	$dollars = 0; 
	$quaters = 0;	
	$dimes= 0;
	$nickels=0;
	$pennies = $money;
	
	//check how many dollars
	if ($pennies >= 100){
		$dollars = intval($pennies / 100);
		$pennies = $money % 100;
	} 
	
	//check how many quaters
	if ($pennies >= 25){
		$quaters = intval($pennies / 25);
		$pennies = $money % 25;
	} 
	
	//check how many dimes
	if ($pennies >= 10){
		$dimes = intval($pennies / 10);
		$pennies = $money % 10;
	} 
	
	//check how many nickels
	if ($pennies >= 5){
		$nickels = intval($pennies / 5);
		$pennies = $money % 5;
	} 
	
	//whatevers left is pennies
	
	echo 'TOTAL: ' . $money . '<br>';
	
	//only display output if have dollars
	if($dollars !=0){
	echo 'Dollars: ' . $dollars . '<br>';}
	else{
		echo '  ';
	}
	
		//only display output if have quaters
	if($quaters !=0){
	echo 'Quarters ' . $quaters . '<br>';
	}
	else{
		echo '  ';
	}
	
		//only display output if have dimes
	if($dimes !=0){
	echo 'Dimes ' . $dimes . '<br>';
	}
	else{
		echo '  ';
	}
	
		//only display output if have nickels
	if($nickels !=0){
	echo 'Nickels ' . $nickels . '<br>';
	}
	else{
		echo '  ';
	}
	
		//only display output if have pennies
	if($pennies !=0){
	echo 'Pennies ' . $pennies . '<br>';
	}
	else{
		echo '  ';
	}
	
} 
	
	

$validate = TRUE;
	
// validate have money
if (!empty($_POST['money'])){	
	$money = $_POST['money'];
} else {
	$validate = FALSE;
}	
if 	($validate){
	modCurrency($money);
} else {
	echo "Not Valid Input";
}
	
?>

</form>
</body>
</html>
