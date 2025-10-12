<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php







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


// TASK-3
$individualStatus = "";

$dummies = array_merge($finalAttendees, $backupCandidates);
$waitingList = array_diff($waitingList, $dummies);
$waitingList = array_values($waitingList);

if ( in_array($individualName, $finalAttendees) ) {
    $individualStatus = "Final Attendee";
} else if ( in_array($individualName, $backupCandidates) ) {
    $individualStatus = "Backup Candidate";
} else if ( in_array($individualName, $waitingList) ) {
    $position = array_search($individualName, $waitingList) + 1;
    $individualStatus = "Waiting, position " . $position;
} else {
    $individualStatus = "Not found";
}






    ?></pre>
</body>
</html>