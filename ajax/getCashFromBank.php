<?php
include_once(__DIR__ . "../../classes/UserCash.php");


if (!empty($_POST)) {

    //new class object
    $cashFlow = new UserCash();
    $cashFlow->setTransferAmount($_POST['transferamount']);
    $cashFlow->setToken($_POST['token']);
  
    //update cash data
    $money = $cashFlow->cashFromBank();

    //return success
    $response = [
        'status' => 'success',
        'bank' => $money['bank'],
        'cash' => $money['cash']
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
