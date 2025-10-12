<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
$totalEnergyConsumption = 200000;
$monthlyIncrease = 300;
$efficiencyImprovement = 0.0005;
$energyCapacityThreshold = 150000;
    
// TAKS

$months = 0;

$newConsumption = $totalEnergyConsumption;

while ( $newConsumption < $energyCapacityThreshold ) {
    if ( ($months / 12) > 50 ) {
        $months = null;
        echo "The energy consumption threshold of {$energyCapacityThreshold} kWh will not be met within 50 years.";
        break;
    }
    
    $months++;
    $newConsumption += $monthlyIncrease;
    $newConsumption *= (1 - $efficiencyImprovement);
}

if ( $months !== null ) echo "It will take {$months} months to reach or exceed the threshold of {$energyCapacityThreshold} kWh.";
   
    ?></pre>
</body>
</html>