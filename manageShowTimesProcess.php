<?php
require 'connection.php';
$text = $_POST["arrayTextFormat"];
$movieID = $_POST["movieID"];

$dateTimeSheduleArray = json_decode($text);
foreach($dateTimeSheduleArray as $currentObject){
Database::insertUpdateDelete("INSERT INTO `show_time` (`start_time`,`end_time`,`date`,`movie_id`) 
VALUES ('".$currentObject->startTime."','".$currentObject->endTime."','".$currentObject->date."','".$movieID."')");
}

$object = new stdClass();
$object->response = "Success";

$responseJSONText = json_encode($object);
echo $responseJSONText;
?>