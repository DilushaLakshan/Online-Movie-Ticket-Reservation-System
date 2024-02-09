<?php
require 'connection.php';

$fName = $_POST["fName"];
$lName = $_POST["lName"];
$nic = $_POST["nic"];
$email = $_POST["email"];
$address = $_POST["address"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
//$gender = $_POST["gender"];
$contact = $_POST["contact"];
$userName = $_POST["userName"];
$userType = $_POST["userType"];
$joinedDate;

if (empty($fName)) {
    echo "Enter the First Name";
} else if (strlen($fName) > 50) {
    echo "Length of the Name should be less than 50";
} else if (empty($lName)) {
    echo "Enter the Last Name";
} else if (strlen($lName) >  50) {
    echo "Length of the Name should be less than 50";
} else if (empty($nic)) {
    echo "Enter the NIC Number";
} else if (strlen($nic) != 13) {
    echo "NIC must have 13 characters";
} else if (empty($email)) {
    echo "Enter the email address";
} else if (strlen($email) > 50) {
    echo "Length of the email should be less than 50 characters";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Enter a valid email address";
} else if (empty($address)) {
    echo "Enter the address";
} else if (strlen($address) > 100) {
    echo "Length of the address should be less than 100 characters";
} else if ($password1 != $password2) {
    echo "Check the password again";
} else if (strlen($password1) != 8) {
    echo "Password must have 8 characters";
} else if (empty($contact)) {
    echo "Enter the contact number";
} else if (strlen($contact) != 10) {
    echo "Contact number must have 10 characters";
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $contact)) {
    echo "Enter a valid contact number";
} else if(empty($userName)){
    echo "Enter a User Name";
} else if(strlen($userName) > 20){
    echo "user Name must be less than 20 characters";
} else if ($userType == "Select User Type") {
    echo "Select the user type";
} else {
    //get the current date
    $dateTime = new DateTime();
    $timeZone = new DateTimeZone('Asia/colombo');
    $dateTime->setTimezone($timeZone);
    $newDateTimeString = $dateTime->format('Y-m-d');

    //insert data into the staff table
    Database::insertUpdateDelete("INSERT INTO `staff` (`first_name`,`last_name`,`nic_number`,`email`,`address`,`contact`,`joined_date`,`gender_id`,`user_type`) VALUES ('" . $fName . "','" . $lName . "','" . $nic . "','" . $email . "','" . $address . "','" . $contact . "','" . $newDateTimeString . "','" . 1 . "','" . $userType . "')");

    //get the id of the lastly inserted record
    $staffResultSet = Database::search("SELECT * FROM `staff` ORDER BY `id` DESC LIMIT 1");
    $staffNumRows = $staffResultSet->num_rows;
    if($staffNumRows > 0){
        $staffData = $staffResultSet->fetch_assoc();

        //insert data into the staff_login table
        Database::insertUpdateDelete("INSERT INTO `staff_login` (`staff_id`,`user_name`,`password`,`staff_type`) VALUES ('".$staffData['id']."','".$userName."','".$password1."','".$userType."')");
        echo "Success";
    }
}
?>