<?php
require 'connection.php';

$userName = $_POST["userName"];
$password = $_POST["password"];

if (empty($userName)) {
    echo "Enter the User Name";
} else if (empty($password)) {
    echo "Enter the password";
} else {
    $staffResultSet = Database::search("SELECT * FROM `staff_login` WHERE `user_name`='" . $userName . "' AND `password`='" . $password . "'");
    $staffNumRows = $staffResultSet->num_rows;
    if ($staffNumRows == 1) {
        $staffData = $staffResultSet->fetch_assoc();
        $position = $staffData["staff_type"];

        if ($position == "admin") {
            echo "admin";
        } else if ($position == "manager") {
            echo "manager";
        } else {
            echo "Something went wrong";
        }
    } else {
        echo "Invalid Login";
    }
}
?>