<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
$campaigns = [
    'Spring Sale' => [
        'AdSet1' => [
            'impressions' => 10000
        ],
        'AdSet2' => [
            'impressions' => 15000
        ]
    ],
    'Holiday Deals' => [
        'AdSet1' => [
            'impressions' => 12000
        ],
        'AdSet2' => [
            'impressions' => 18000
        ]
    ]
];
    
// TAKS - 1
$totalCampaignClicks = [];
$totalCampaignImpressions = [];

foreach ( $campaigns AS $cam => $sets ) {
    $name = $cam;
    $total_clicks = 0;
    $total_impressions = 0;

    foreach ( $sets AS $ad => $info ) {
        if ( isset($info["clicks"]) && !empty($info["clicks"]) ) {
            $total_clicks += $info["clicks"];
        };
        if ( isset($info["impressions"]) && !empty($info["impressions"]) ) {
            $total_impressions += $info["impressions"];
        };

    }

    $totalCampaignClicks[$name] = $total_clicks;
    $totalCampaignImpressions[$name] = $total_impressions;
}


// TASK - 2

$valid_sets_cnt_click = 0;
foreach ( $campaigns AS $cam => $sets) {
    foreach ( $sets AS $info ) {
        if ( isset($info["clicks"]) && !empty($info["clicks"]) ) $valid_sets_cnt_click += 1;
    }
}
$valid_sets_cnt_impressions = 0;
foreach ( $campaigns AS $cam => $sets) {
    foreach ( $sets AS $info ) {
        if ( isset($info["impressions"]) && !empty($info["impressions"]) ) $valid_sets_cnt_impressions += 1;
    }
}

$clicks_in_total = array_sum(array_values($totalCampaignClicks));
$impressions_in_total = array_sum(array_values($totalCampaignImpressions));

$result_clicks = $clicks_in_total && $valid_sets_cnt_click ? round($clicks_in_total / $valid_sets_cnt_click) : 0;
$result_impressions = $impressions_in_total && $valid_sets_cnt_impressions ? round($impressions_in_total / $valid_sets_cnt_impressions) : 0;

echo "Average clicks per ad set: {$result_clicks}, Average impressions per ad set: {$result_impressions}.";


// $totalCampaignClicks = [
//     'Spring Sale' => 400,
//     'Holiday Deals' => 500
// ];
 
// $totalCampaignImpressions = [
//     'Spring Sale' => 25000,
//     'Holiday Deals' => 30000
// ];
    
    ?></pre>
</body>
</html>