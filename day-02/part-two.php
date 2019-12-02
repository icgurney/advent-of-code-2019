<?php



$answer = 'none';
function compute($noun, $verb){
    $opcode = [1,0,0,3,1,1,2,3,1,3,4,3,1,5,0,3,2,10,1,19,2,19,6,23,2,13,23,27,1,9,27,31,2,31,9,35,1,6,35,39,2,10,39,43,1,5,43,47,1,5,47,51,2,51,6,55,2,10,55,59,1,59,9,63,2,13,63,67,1,10,67,71,1,71,5,75,1,75,6,79,1,10,79,83,1,5,83,87,1,5,87,91,2,91,6,95,2,6,95,99,2,10,99,103,1,103,5,107,1,2,107,111,1,6,111,0,99,2,14,0,0];
    $opcode[1] = $noun;
    $opcode[2] = $verb;
    for ($i=0; $opcode[$i]!=99; ) {
        $op = $opcode[$i];
        $num1 = $opcode[$i+1];
        $num2 = $opcode[$i+2];
        $dest = $opcode[$i+3];
    
    
        switch ($op) {
            case 1:
		        $opcode[$dest] = $opcode[$num1] + $opcode[$num2];
                $i += 4;
                break;
            case 2:
                $opcode[$dest] = $opcode[$num1] * $opcode[$num2];
                $i += 4;
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