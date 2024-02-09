<?php
require 'connection.php';

$name = $_POST["movie"];
$category = $_POST["category"];
$company = $_POST["company"];
$producer = $_POST["producer"];
$director = $_POST["director"];
$writer = $_POST["writer"];
$musician = $_POST["musician"];
$description = $_POST["description"];
$imageFile;
$videoFile;

if(isset($_FILES["path"])){
    $path = $_FILES["path"];
    $extention  = $path["type"];
    $allowedImageExtention = array("image/jpg","image/png","image/jpeg");
    if(in_array($extention, $allowedImageExtention)){
        $imageFile = $name.uniqid().".png";
        move_uploaded_file($path["tmp_name"], "resources/images/".$imageFile);
    }
}

if(isset($_FILES["trailor"])){
    $trailor = $_FILES["trailor"];
    $videoExtention = $trailor["type"];
    $allowedVideoExtention = array("video/mp4");
    if(in_array($videoExtention, $allowedVideoExtention)){
        $videoFile = $name.uniqid().".mp4";
        move_uploaded_file($trailor["tmp_name"], "resources/trailors/".$videoFile);
    }
}

if(empty($name)){
    echo "Enter the Name of the movie";
}else if(strlen($name) > 50){
    echo "Name of the movie must be less than 50 characters";
}else if(empty($category)){
    echo "Select the category of the movie";
}else if(empty($company)){
    echo "Enter the production company";
}else if(strlen($company) > 50){
    echo "Company name should be less that 50 characters";
}else if(empty($producer)){
    echo "Enter the name of the producer";
}else if(strlen($producer) > 50){
    echo "Name of the producer should be less than 50 characters";
}else if(empty($director)){
    echo "Enter the name of the director";
}else if(strlen($director) > 50){
    echo "Name of the director should be less than 50 charcters";
}else if(empty($writer)){
    echo "Enter the name of the writer";
}else if(strlen($writer) > 50){
    echo "Name of the writer should be less than 50 characters";
}else if(empty($musician)){
    echo "Enter the name of the musician";
}else if(strlen($musician) > 50){
    echo "Name of the musician should be less than 50 characters";
}else if(empty($description)){
    echo "Enter a description or story of the movie";
}else if(strlen($description) >  2000){
    echo "Description is too long. It should be less than 2000 characters";
}

else{
    //get the category_id from the database
    $categoryRS = Database::search("SELECT * FROM `category` WHERE `name`='".$category."'");
    $categoryNumRows = $categoryRS->num_rows;
    if($categoryNumRows > 0 ){
        $categoryData = $categoryRS->fetch_assoc();
        $categoryID = $categoryData["id"];
        

        //insert movie details into the database
        $dateTime = new DateTime();
        $timeZone = new DateTimeZone('Asia/colombo');
        $dateTime->setTimezone($timeZone);
        $newDateTimeString = $dateTime->format('Y-m-d');
        Database::insertUpdateDelete("INSERT INTO `movie` (`title`,`release_date`,`description`,`image`,`trailor`,`category_id`) VALUES ('".$name."','".$newDateTimeString."','".$description."','".$imageFile."','".$videoFile."','".$categoryID."')");

        //get movie_id from the database
        $movieRS = Database::search("SELECT * FROM `movie` WHERE `title` = '".$name."'");
        $movieNumRows = $movieRS->num_rows;
        if($movieNumRows > 0){
            $movieData = $movieRS->fetch_assoc();
            $movieID = $movieData["id"];

            //insert data into the movie_team table
            Database::insertUpdateDelete("INSERT INTO `movie_team` (`movie_id`,`director`,`producer`,`writer`,`musician`) VALUES ('".$movieID."','".$director."','".$producer."','".$writer."','".$musician."')");

            echo "Success";

            //insert data into the show_time table
            //complete the coding part here
        }
    }
}
?>