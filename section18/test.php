<?php

header('Content-Type: text/plain');

function calculateTimeOverlap($offset1, $offset2) {
    $start = 12;
    $end = 18;
    
    $first = [($start + $offset1), ($end + $offset1)];
    $second = [($start + $offset2), ($end + $offset2)];

    $overlap_start = max($first[0], $second[0]);
    $overlap_end = min($first[1], $second[1]);

    if ( $overlap_start >= $overlap_end ) {
        return [];
    } else {
        return [$overlap_start, $overlap_end];
    }

}


// $result = calculateTimeOverlap(5.5, 2);
// var_dump($result);
// [17.5, 23.5]
// [14, 20]


// $result = calculateTimeOverlap(0, -4);
// var_dump($result);
// [12, 18]
// [8, 14]

// [15, 19]
// [18, 20]


$result = calculateTimeOverlap(-6, 1);
// var_dump($result);
// [7, 13]
// [13, 19]

// $result = calculateTimeOverlap(10, 12);
// var_dump($result);


// $result = calculateTimeOverlap(0, -4);