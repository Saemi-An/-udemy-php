<?php
header('Content-Type: text/plain');

$participants = [
    ["Name" => "Max", "Timezone" => "UTC-3"],
    ["Name" => "Charlie", "Timezone" => "UTC+1"],
    ["Name" => "Alex", "Timezone" => "UTC+2"],
    ["Name" => "Nina", "Timezone" => "UTC"]
];

function extract_offset($ary) {
    $result = [];

    foreach ( $ary AS $a ) {
        $str_offset = substr($a['Timezone'], 3);
        ($str_offset === '' ) ? $result[] = 0 : $result[] = (int) $str_offset;
    }

    return $result;
}

function calculateTimeOverlap($participants) {
    $offsets = extract_offset($participants);
    $start = 12;
    $end = 18;

    $collect_starts = [];
    $collect_ends = [];
    foreach ( $offsets AS $offset ) {
        $collect_starts[] = ($start + $offset);
        $collect_ends[] = ($end + $offset);
    };

    $overlap_start = max($collect_starts);
    $overlap_end = min($collect_ends);
    
    if ( $overlap_start >= $overlap_end ) {
        return null;
    } else {
        return ['start' => $overlap_start, 'end' => $overlap_end];
    }
}

function suggestOptimalMeetingTime($participants = 0) {

    if ( empty($participants) ) {
        echo "Suggested meeting time: 12 to 18 UTC";

    } else {
        $result = calculateTimeOverlap($participants);
    
        if ( empty($result) ) {
            echo "No available meeting time for these time zones.";
        } else {
            echo "Suggested meeting time: {$result['start']} to {$result['end']} UTC";
        }
    }
}
