<?php

#	Это основные кишки нашего рандомайзера.
#	Он меняет случайную кириллицу на латиницу.


function WordReplace ($wordID, $letterID, $newletter) #Рандомайзер слов. (индекс слова, индекс буквы, ноавя буква)
	{
		global $wordIDs;
		
		$wordIDs[$wordID][$letterID] = $newletter;
	}


function LetterChanger ($wordIDp) 		//Эта функция перебирает все параметры в заданном массиве и, если находит
	{									//указанную букву, то меняет её на ту, что вы дали циклу выше.
		global $wordIDs;
		
		$i = -1; $j = -1;
		
		foreach ($wordIDs[$wordIDp] as $letterpick)
			{
				$i ++;
				$dorep = rand(0, 1);
				
				if ($letterpick == "а")
					{
						if ($dorep == 1)
							{
								WordReplace($wordIDp, $i, "a");
							}
					}
				elseif ($letterpick == "в")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "B");
							}
					}
				elseif ($letterpick == "е")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "e");
							}
					}
				elseif ($letterpick == "з")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "3");
							}
					}
				elseif ($letterpick == "З")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "3");
							}
					}
				elseif ($letterpick == "к")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "k");
							}
					}
				elseif ($letterpick == "м")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "M");
							}
					}
				elseif ($letterpick == "н")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "H");
							}
					}
				elseif ($letterpick == "о")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "o");
							}
					}
				elseif ($letterpick == "р")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "p");
							}
					}
				elseif ($letterpick == "с")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "c");
							}
					}
				elseif ($letterpick == "т")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "T");
							}
					}
				elseif ($letterpick == "у")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "y");
							}
					}
				elseif ($letterpick == "х")
					{
						if ($dorep ==1)
							{
								WordReplace($wordIDp, $i, "x");
							}
					}
			}
	}
	
$j = -1;

foreach ($wordIDs as $wordnum)
	{
		$j ++;
		LetterChanger($j);
	}

$word0pick = rand(0, 2);

$word3pick = rand(4, 5);

$word7pick = rand(9, 10);
	
$linkpick = rand(0, 22)	;


function WordReturn($wordidtoreturn)
	{
		global $wordIDs;
		foreach ($wordIDs[$wordidtoreturn] as $letterpick)
			{
				$letrread = $letrread . $letterpick;
			}
		return($letrread);
	}

$TextPaste =	WordReturn($word0pick) . " " . WordReturn($word3pick) . " " .
				WordReturn(6) . " " . WordReturn(7) . " " . WordReturn(8) . " " . WordReturn($word7pick). " " .
				$wordlink[$linkpick] . " ?" ;

#$txtresult = $wordIDs[0][$word1pick] . "%20" . 


	
?>