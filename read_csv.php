<?php

$file1 = file_get_contents('fa8ece0b8362.csv');
$file2 = file_get_contents('cc2e8a12fd81.csv');

$latestTemperature1 = null;
$latestHumidity1 = null;
$latestTemperature2 = null;
$latestHumidity2 = null;

$arrayHoge = explode("\n", $file1);
$arrayHoge2 = explode("\n", $file2);


$arrayData = [];
$arrayData2 = [];

foreach($arrayHoge as $key => $value) {
	$arrayData[] = explode(",",$value);
}
foreach($arrayHoge2 as $key => $value) {
	$arrayData2[] = explode(",",$value);
}

for ($i = 0; $i < count($arrayData)-1; $i++) {
	if(sizeof($arrayData[$i]) > 4) {
		$latestTemperature1 = $arrayData[$i][3];
		$latestHumidity1 = $arrayData[$i][2];
		
	}
}
for ($i = 0; $i < count($arrayData2)-1; $i++) {
	if(sizeof($arrayData2[$i]) > 4) {
		$latestTemperature2 = $arrayData2[$i][3];
		$latestHumidity2 = $arrayData2[$i][2];
		
	}
}

$data = array (
	"CTA" => $latestTemperature1,
	"CHA" => $latestHumidity1,
    	"CTB" => $latestTemperature2,
	"CHB" => $latestHumidity2
    
);

echo json_encode($data);

?>
