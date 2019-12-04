<?php

$input = file_get_contents("input.txt");
$input = explode("-", $input);

$lowerBound = $input[0];
$upperBound = $input[1];

$passwords = [];

$passInt = $lowerBound;
$passStr = strval($passInt);

for($passInt = $lowerBound; $passStr <= $upperBound; $passInt++){
    
    $passStr = strval($passInt);

    $flag = TRUE;

    // It is a six-digit number.
    if(strlen($passStr) != 6){
        $flag = FALSE;
    }
    // The value is within the range given in your puzzle input.
    if($passInt<=$lowerBound || $passInt>=$upperBound){
        $flag = FALSE;
    }
    // Two adjacent digits are the same (like 22 in 122345).
    // The two adjacent matching digits are not part of a larger group of matching digits!
    $counter = 0;
    $ar =[];
    for($i = 0; $i < (strlen($passStr) - 1); $i++){
        if($passStr[$i] == $passStr[$i + 1]){
                $ar[$passStr[$i]]++;
        }
    }
    // The two adjacent matching digits are not part of a larger group of matching digits!
    for($i = 0; $i < 10; $i ++){
        if($ar[$i] == 1){
            $counter ++;
        }
    }
    if($counter == 0){
        $flag = FALSE;
    }
    // Going from left to right, the digits never decrease; they only ever increase or stay the same (like 111123 or 135679).
    for($i = 0; $i < (strlen($passStr) - 1); $i++){
        if($passStr[$i] > $passStr[$i + 1]){
            $flag = FALSE;
        }
    }

    if($flag) array_push($passwords, $passInt);
}

echo count($passwords) . "\n";
