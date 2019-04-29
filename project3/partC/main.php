<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hangman</title>
<h2>Hangman</h2>
</head>

<body>
<?php
	//include file with all functions and work
    include 'part1.php';
	
	
    if (isset($_POST['newWord'])) unset($_SESSION['answer']);
    if (!isset($_SESSION['answer']))
    {
        $answer = wordArray($wordList);
        $_SESSION['answer'] = $answer;
        $_SESSION['hiddenChar'] = charHide($answer);
    }else
    {
        if (isset ($_POST['input']))
        {
            $input = $_POST['input'];
            $_SESSION['hiddenChar'] = replace(strtolower($input), $_SESSION['hiddenChar'], $_SESSION['answer']);
            gameWon( $_SESSION['answer'],$_SESSION['hiddenChar']);
        }
      
    }
    $hiddenChar = $_SESSION['hiddenChar'];
    foreach ($hiddenChar as $char) echo $char."  ";
?>

<!-- Javascript validation -->
<script type="application/javascript">
    function validate()
    {
    var x=document.forms["inputForm"]["input"].value;
    if (x=="" || x==" ")
      {
          alert(" enter a vailid character.");
          return false;
      }
    if (!isNaN(x))
    {
        alert("enter a valid character.");
        return false;
    }
}
</script>

<form name = "inputForm" action = "" method = "post">
										<!--Only allow one letter input-->
Guess: <input name = "input" type = "text" maxlength="1"  /><br>
<input type = "submit"  value = "Guess" onclick="return validate()"/>
<input type = "submit" name = "newWord" value = "New Word"/>

</form>
</body>
</html>