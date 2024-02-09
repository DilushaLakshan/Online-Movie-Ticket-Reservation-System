<?php
require 'connection.php';

$userName = $_POST["user-name"];
$password = $_POST["password"];

if(empty($userName)){
    echo "Enter the user Name";
}else if(empty($password)){
    echo "Enter the password";
}else{
    $userResultSet = Database::search("SELECT * FROM `customer` WHERE `user_name`='".$userName."' AND `password`='".$password."'");
    $userNumRows = $userResultSet->num_rows;
    if($userNumRows ==  1){
        $userData = $userResultSet->fetch_assoc();
        echo "Success";
    }else{
        echo "Invalid Login";
    }
}

?>