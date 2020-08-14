<?php
include_once(__DIR__ . "../../classes/UserCash.php");
include_once(__DIR__ . "../../classes/UserPerks.php");

if (!empty($_POST)) {

    //new class object
    $cashFlow = new UserCash();
    $cashFlow->setToken($_POST['token']);

    $perks = new UserPerks();
    $perks->setToken($_POST['token']);
  
    //update cash and perk data
    //remove cash
    $cashFlow->setPerkAmount($_POST['perkamount']);
    $cashFlow->buyPerk();
    //add perk points
    $perks->setPerkAmount($_POST['perkamount']);
    $perks->setPerkType($_POST['perktypes']);
    $perks->perkTimer();
    $result = $perks->getPerks();
    

    //return success
    $response = [
        'status' => 'success',
        'data' =>  $result
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
