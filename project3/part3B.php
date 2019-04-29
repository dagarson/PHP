<!--Daniel Garson
CIS 193
Due: 3-3-19-->

<!doctype html>
<html>
<body>
	<p>Enter a String to find out if it is a Palindrome </p>
	<form action="part3B.php" method="post">
		<input type="text" name="string" /><br>
		<input type="submit" /><br>
	
	
	<?php 
 
function check_plaindrome($string) {
	
		
	//avoid issues 
	
    //remove spaces
    $string = str_replace(' ', '', $string);

    //remove characters
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    //lowercase
    $string = strtolower($string);


    //reverse string
    $reverse = strrev($string);

	//output if string = the reverse of itself
    if ($string == $reverse) {
        echo $string." is Palindrome</p>";
    } 
    else {
        echo $string." is not Palindrome</p>";
    }
}

//get string from user.
$string = $_POST[ 'string' ];
check_plaindrome($string);
	
?>
	</form>
</body>
</html>
 
