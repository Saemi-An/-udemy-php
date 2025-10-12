<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php

	$waitingList = [];

	$priorityParticipants = ['Ava Stone', 'Dylan Marsh', 'Emma Lake', 'Grace Hill', 'Henry Cole', 'Kyle Brook', 'Lily Snow', 'Mason Cliff', 'Nora Field', 'Sophia Forest', 'Theo River'];

	$individualName = 'Theo River';


// TASK-1
$finalAttendees = [];

foreach ( $priorityParticipants AS $priority ) {
    
    if ( !in_array($priority, $finalAttendees) ) {
        $finalAttendees[] = $priority;
    }
    if ( count($finalAttendees) === 5 ) break;
}

if ( count($finalAttendees) < 5 ) {
    
    foreach ( $waitingList AS $wait ) {
        
        if ( !in_array($wait, $finalAttendees) ) {
            $finalAttendees[] = $wait;
        }        
        if ( count($finalAttendees) === 5 ) break;
    }
}

sort($finalAttendees);

// TASK-2
$backupCandidates = [];
foreach ( $priorityParticipants AS $priority ) {
    
    if ( !in_array($priority, $finalAttendees) && !in_array($priority, $backupCandidates) ) {
        $backupCandidates[] = $priority;
        echo "Hey {$priority}, we want to inform you that you are one of our backup candidates. 🥳";
    }
    if ( count($backupCandidates) === 3 ) break;
}

if ( count($backupCandidates) < 3 ) {
    
    foreach ( $waitingList AS $wait ) {
        
        if ( !in_array($wait, $finalAttendees) && !in_array($wait, $backupCandidates) ) {
            $backupCandidates[] = $wait;
            echo "Hey {$wait}, we want to inform you that you are one of our backup candidates. 🥳";
        }
        if ( count($backupCandidates) === 3 ) break;
    }
}

// 테스트
echo "\n\n 우선순위 승객 목록: ";
echo '[' . implode(', ', $priorityParticipants) . ']';
echo "\n\n 대기 승객 목록: ";
echo '[' . implode(', ', $waitingList) . ']';
echo "\n\n 최종 승객 목록: ";
echo '[' . implode(', ', $finalAttendees) . ']';
echo "\n\n 백업 승객 목록: ";
echo '[' . implode(', ', $backupCandidates) . ']';


// TASK-3
$individualStatus = "";

// echo "\n\n\n테테테스트1: [" . implode(', ', $dummies) . "]\n\n\n";
// echo "\n\n\n테테테스트2: [" . implode(', ', $waitingList) . "]\n\n\n";

$dummies = array_merge($finalAttendees, $backupCandidates);

if ( !empty($waitingList) ) {
    $waitingList = array_diff($waitingList, $dummies);
    $waitingList = array_values($waitingList);
} else {
    $priorityParticipants = array_diff($priorityParticipants, $dummies);
    $priorityParticipants = array_values($priorityParticipants);

}

if ( in_array($individualName, $finalAttendees) ) {
    $individualStatus = "Final Attendee";

} else if ( in_array($individualName, $backupCandidates) ) {
    $individualStatus = "Backup Candidate";

} else if ( in_array($individualName, $waitingList) ) {
    $individualStatus = "Waiting, position " . array_search($individualName, $waitingList);
    
} else if ( in_array($individualName, $priorityParticipants) ) {
    $individualStatus = "Waiting, position " . array_search($individualName, $priorityParticipants);
} else {
    $individualStatus = "Not found";
}


echo "\n\n 수정된 대기 승객 목록: ";
echo '[' . implode(', ', $waitingList) . ']';
echo "\n\n 포지션 테스트: ";
var_dump(array_search($individualName, $waitingList));




    ?></pre>
</body>
</html>