<?php
error_reporting(0);
	
	//and call the word list 
    $wordList = 'wordlist.txt';
	
	//get the file into array the loop through 
	//word count
    function wordArray($wordFile)
    { $file = fopen($wordFile,'r');
           if ($file)
        {
            $random_line = null;
            $line = null;
            $count = 0;
            while (($line = fgets($file))
				!== false) 
            {
                $count++;
                if(rand() % $count == 0) 
                {
                      $random_line = trim($line);
                }
        }
        if (!feof($file)) 
        {
            fclose($file);
            return null;
        }else 
        {
            fclose($file);
        }
    }
        $answer = str_split($random_line);
        return $answer;
    }

	//hide character spaces from the user
    function charHide($answer)
    {$numChar = floor((sizeof($answer)/2) + 1);
        $count = 0;
        $hiddenChar = $answer;
        while ($count < $numChar )
        {
            $rand_element = rand(0,sizeof($answer)-2);
            if( $hiddenChar[$rand_element] != '*' )
            {
                $hiddenChar = str_replace($hiddenChar[$rand_element],'*',$hiddenChar,$replace_count);
                $count = $count + $replace_count;
            }
        }
        return $hiddenChar;
    }

	//replace hiddenChar letter with correct user input
    function replace($input, $hiddenChar, $answer)
    {
        $i = 0;
        $wrong = true;
        while($i < count($answer))
        {
            if ($answer[$i] == $input)
            {
                $hiddenChar[$i] = $input;
                $wrong = false;
            }
            $i = $i + 1;
        }
        return $hiddenChar;
    }
    
    

	//check if the game has been won by seeing if the answer have matched to all hiddenChar characters
    function gameWon($answer, $hiddenChar)
    {
			//print that the game is over and give option to select a new word
            if ($hiddenChar == $answer)
            {
                echo "You are correct Answer= ";
                foreach ($answer as $letter) echo $letter;
				echo '<br><form action = "" method = "post"><input type = "submit" name = "newWord" value = "New Word"/></form>';
                die();
            }
    }
?>