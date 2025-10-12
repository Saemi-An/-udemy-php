<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php

var_dump(58727.91);
    
$totalEnergyConsumption = 50000;
$monthlyIncrease = 200;
$efficiencyImprovement = 0.001;
$years = 5;

# 답안
// $forecastedEnergyConsumption = $totalEnergyConsumption;
 
// for ($month = 1; $month <= 12 * $years; $month++) {
//     $forecastedEnergyConsumption += $monthlyIncrease;
    
//     $forecastedEnergyConsumption *= (1 - $efficiencyImprovement);
// }
// $forecastedEnergyConsumption = round($forecastedEnergyConsumption, 2);

// var_dump($forecastedEnergyConsumption);
// die();

# 시작

$forecastedEnergyConsumption = $totalEnergyConsumption;

for ( $i = 0; $i < $years * 12; $i++ ) {

    // $newEnergyConsumption = $totalEnergyConsumption + $monthlyIncrease;
    
    // $newEnergyConsumption *= (1 - $efficiencyImprovement);

    // $forecastedEnergyConsumption += $newEnergyConsumption;
    
    //

    $forecastedEnergyConsumption += $monthlyIncrease;
    $forecastedEnergyConsumption *= (1 - $efficiencyImprovement);
}

$forecastedEnergyConsumption = round($forecastedEnergyConsumption, 2);

var_dump($forecastedEnergyConsumption);
    
    
    ?></pre>
</body>
</html>