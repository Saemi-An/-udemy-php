<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    // explode(string, string);
    // implode(string, array);
    
    $emailContent = "Subject: Unlock Your Potential with Us!\n\nDear Alex,\n\nWe hope this message finds you well.\n\nQuote of the Month:\n\nDr. Albert Szent-Györgyi: 'Innovation is seeing what everybody has seen and thinking what nobody has thought.'\n\nBest wishes,\nYour Discovery Network Team\nP.S. Don't miss our special announcement next month!";


// TASK - 1
$splittedEmailContent = explode("\n\n", $emailContent);

$idx = array_search("Quote of the Month:", $splittedEmailContent) + 1;


$author = explode(": ", $splittedEmailContent[$idx])[0];
$quote = explode(": ", $splittedEmailContent[$idx])[1];

// TASK - 2
$quote . " - " . $author;

// TASK - 3
foreach ( $splittedEmailContent AS $line ) {
    if ( $line === ($author . ": " . $quote) ) {
        $splittedEmailContent[array_search($line, $splittedEmailContent)] = $quote . " - " . $author;
        break;
    }
}

$modifiedEmailContent = implode("\n\n", $splittedEmailContent);

var_dump($modifiedEmailContent);

?></pre>

</body>
</html>