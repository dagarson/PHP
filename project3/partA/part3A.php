<!doctype html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
			.columnFormat{
			width: 5%;
		}
		td {
			border: 3px solid black;
		}
	</style>
</head>
<body>
		
<?php
	// newReport button
	if (!empty($_POST['submitReport'])){
		createReport();
	}
	
	// view PastReport button
	if (!empty($_POST['PastReport'])){
		readFiles();
	}
		

function readFiles(){
	
	$dir = 'airline';
	$fileArray = scandir($dir);
	
	for ($i = 3; $i < count($fileArray); $i++){
		$fileName = 'airline/' . $fileArray[$i];
	
		//print out record
		echo '<u><b>Record: ' . $fileName . '</b></u><br>';
		
		//try to open file
		$Fiile = fopen($fileName, 'r')
		or die('file cant open');
		
		//print each file until none left
		while (!feof($Fiile)){
		echo fgets($Fiile) . '<br>';
		} 
		fclose($Fiile);
	} 
	
}
	
function createReport(){
	$display = "";
	$dir = 'airline';
	
	
	//get friendly
	if(isset($_POST['friend'])){
		$friend = $_POST['friend'];
		echo "Friendliness of staff: " . $friend."<br>";  
		$display .= "friend =" . $friend . '<br>';
	}

	//get Space for luggage
		if(isset($_POST['Space'])){
		$Space = $_POST['Space'];		
		echo "Space for luggage: " . $Space."<br>";   
		$display .= "Space=" . $Space . '<br>';
	}
	
		//get seat comfort
		if(isset($_POST['Comfort'])){
		$Comfort = $_POST['Comfort'];		
		echo "Comfort of seating: " . $Comfort."<br>";   
		$display .= "Comfort=" . $Comfort . '<br>';
	}
	
		//get aircraft cleanliness
		if(isset($_POST['Clean'])){
		$Clean = $_POST['Clean'];		
		echo "Cleanliness of aircraft: " . $Clean."<br>";   
		$display .= "Clean=" . $Clean . '<br>';
	}
	
		//get aircraft noise
		if(isset($_POST['Noise'])){
		$Noise = $_POST['Noise'];		
		echo "Noise level of aircraft: " . $Noise."<br>";   
		$display .= "Noise=" . $Noise . '<br>';
	}
	

	// get depart ontime 
	if(isset($_POST['Yes'])){
		echo "Depart Ontime"; 
		$display .= "Depart Ontime = Yes" . '<br>';
	}
	if(isset($_POST['No'])){
		echo "Depart Late";
		$display .= "Depart Ontime = No" . '<br>';
	}
	
	//get landed ontime
	if(isset($_POST['Y2'])){
		echo "Land Ontime"; 
		$display .= "Land Ontime = Yes" . '<br>';
	}
	if(isset($_POST['N2'])){
		echo "Land Late";
		$display .= "land Ontime = No" . '<br>';
	}
	

	//loop through files 
	$fileArray = scandir($dir); 
	for ($i = 0; $i < count($fileArray); $i++){
		$fileName = $fileArray[$i];
	} 
	$numofFile = substr($fileName, 3,5);
	
	$numofFile = intVal($numofFile);
	
	for ($i = 0; $i < 5 - strLen($numofFile); $i++){
		;
	} 
	$fileName = 'air' .  ($numofFile + 1) . '.txt';
	
	
	$Fiile = fopen('airline/' . $fileName , 'w')
	or die("ERROR");
	
	//create/update file
	echo 'file created: '. $fileName . '<br>';
	fwrite($Fiile, $display);
	echo 'file updated: '.$fileName . '<br>';
	
	// close file
	fclose($Fiile);
}
?>

</form>
</body>
</html>















