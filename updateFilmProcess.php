<?php
require 'connection.php';

$id = $_POST["id"];
$category = $_POST["category"];
$company = $_POST["company"];
$producer = $_POST["producer"];
$director = $_POST["director"];
$writer = $_POST["writer"];
$musician = $_POST["musician"];
$description = $_POST["description"];

if (empty($company)) {
    echo "Enter the production company";
} else if (strlen($company) > 50) {
    echo "Company name should be less that 50 characters";
} else if (empty($producer)) {
    echo "Enter the name of the producer";
} else if (strlen($producer) > 50) {
    echo "Name of the producer should be less than 50 characters";
} else if (empty($director)) {
    echo "Enter the name of the director";
} else if (strlen($director) > 50) {
    echo "Name of the director should be less than 50 charcters";
} else if (empty($writer)) {
    echo "Enter the name of the writer";
} else if (strlen($writer) > 50) {
    echo "Name of the writer should be less than 50 characters";
} else if (empty($musician)) {
    echo "Enter the name of the musician";
} else if (strlen($musician) > 50) {
    echo "Name of the musician should be less than 50 characters";
} else if (empty($description)) {
    echo "Enter a description or story of the movie";
} else if (strlen($description) >  2000) {
    echo "Description is too long. It should be less than 2000 characters";
} else {
    //update data in the movie_team table
    Database::insertUpdateDelete("UPDATE `movie_team` SET `director`='" . $director . "', `producer`='" . $producer . "', `writer`='" . $writer . "', `musician`='" . $musician . "' WHERE `movie_id`='" . $id . "'");

    //get the category id from the category table
    $categoryResultSet = Database::search("SELECT * FROM `category` WHERE `name`='" . $category . "'");
    $categoryNumRows = $categoryResultSet->num_rows;
    if ($categoryNumRows > 0) {
        $categoryData = $categoryResultSet->fetch_assoc();
        $categoryID = $categoryData["id"];

        //update details in the movie table
        Database::insertUpdateDelete("UPDATE `movie` SET `description`='" . $description . "',`category_id`='" . $categoryID . "' WHERE `id`='" . $id . "'");
    }
    echo "Success";
}
?>
