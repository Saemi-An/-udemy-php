<pre><?php
// Object Oriented Syntax


$zip = new ZipArchive();

$zip -> open(__DIR__ . "/Archive.zip");

var_dump($zip);

echo "\n\n";

$total = $zip->count();

for ( $i=0; $i<$total; $i++ ) {
    var_dump($zip->getNameIndex($i));
}

echo "\n\n";


var_dump($zip->getFromName("message.txt"));

?></pre>