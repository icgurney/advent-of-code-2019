<?php
// This works but sucks. Need to refactor.
$start = [0,0];

$input1 = file_get_contents("input1.txt");
$input1 = explode(",", $input1);

$input2 = file_get_contents("input2.txt");
$input2 = explode(",", $input2);

$pointer1 = [0,0];
$pointer2 = [0,0];

$wire1 = [];
$wire2 = [];

$crossed = [];

while($input1){
    $command1 = array_shift($input1);
    $direction1 = substr($command1, 0, 1);
    $distance1 = intval(substr($command1, 1));
    for($i=0; $i<$distance1; $i++){
        $pointer1 = move($pointer1, $direction1);
        array_push($wire1, implode(',', $pointer1));
    }

}

while($input2){
    $command2 = array_shift($input2);
    $direction2 = substr($command2, 0, 1);
    $distance2 = intval(substr($command2, 1));
    for($i=0;$i<$distance2;$i++){
        $pointer2 = move($pointer2, $direction2);
        array_push($wire2, implode(',', $pointer2));
    }
}

$timings=[];
// Find intersections between arrays, calculate manhattan distance.
$intersection = array_intersect($wire1, $wire2);
foreach ($intersection as $i) {
    foreach($wire1 as $j => $v){
        if($i==$v){
            $timings[$i]=$j;
        }
    };
}

foreach ($intersection as $i) {
    foreach($wire2 as $j => $v){
        if($i==$j){
            $timings[$i]+=$j;
        }
    };
}

sort($timings);

print_r($timings[0]);

function taxiDistance($origin, $destination){
    return abs($origin[0] - $destination[0]) + abs($origin[1] - $destination[1]);
}

function move($pointer, $direction){
    switch ($direction){
        case 'U':
            $pointer[1]+=1;
            break;
        case 'R':
            $pointer[0]+=1;
            break;
        case 'D':
            $pointer[1]-=1;
            break;
        case 'L':
            $pointer[0]-=1;
            break;
    }

    return $pointer;
}