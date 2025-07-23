<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../config/Security.php';
include_once '../classes/DataEntry.php';
include_once '../classes/Validator.php';
include_once '../classes/APIHandler.php';

$database = new Database();
$db = $database->connect();
$dataEntry = new DataEntry($db);
$apiHandler = new APIHandler($dataEntry);

$apiHandler->handleRequest();
?>