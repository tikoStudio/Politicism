<?php
include_once(__DIR__ . "../../classes/Map.php");


if (!empty($_POST)) {

    //new class object
    $map = new map();
    $map->setId($_POST['id']);
  

    //get map data
    $stateData = $map->getRegionsStateData();
    $regionData = $map->allRegionData();

    //return success
    $response = [
        'status' => 'success',
        'region' => $regionData,
        'state' => $stateData
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
