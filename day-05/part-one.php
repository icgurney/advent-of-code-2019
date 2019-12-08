<?php

// add $input and $output
// add position mode "0" (position) and immediate mode "1" (value)
// for number ABCD, CD = "opcode" aka switch statement, read right to left: CD -> AB -> etc.
// $input / pow(10, 2 * x) % 100
function compute($noun, $verb){
    $opcode = file_get_contents("input.txt");
    $opcode = explode(",",$opcode);

    $opcode[1] = $noun;
    $opcode[2] = $verb;
    for ($i=0; $opcode[$i]!=99; ) {
        $op = $opcode[$i];
        $param1 = $opcode[$i+1];
        $param2 = $opcode[$i+2];
        $param3 = $opcode[$i+3];
    
    
        switch ($op) {
            case 1:
		        $opcode[$param3] = $opcode[$param1] + $opcode[$param2];
                $i += 4;
                break;
            case 2:
                $opcode[$param3] = $opcode[$param1] * $opcode[$param2];
                $i += 4;
                break;
            case 3:
                $opcode[$param1] = INPUT;
                $i += 2;
                break;
            case 4:
                OUTPUT = $opcode[$param1];
                $i += 2;
                break;
        }
        
    }
    return $opcode[0];
}

for($j=0;$j<100;$j++){
    for($k=0;$k<100;$k++){
        if (compute($j,$k) == 19690720){
            echo  $j . " " . $k;
        }
    }
}