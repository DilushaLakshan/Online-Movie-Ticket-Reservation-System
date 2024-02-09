<?php
require 'connection.php';

$mID = $_POST["mID"];
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$nic = $_POST["NIC"];
$email = $_POST["email"];
$address = $_POST["address"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$contact = $_POST["contact"];

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
} else {
    //update details of the staff table
    Database::insertUpdateDelete("UPDATE `staff` SET `first_name`='".$fName."', `last_name`='".$lName."', `nic_number`='".$nic."', `email`='".$email."', `address`='".$address."', `contact`='".$contact."' WHERE `id`='".$mID."'");

    //update the details of staff_login table
    Database::insertUpdateDelete("UPDATE `staff_login` SET `password`='".$password1."' WHERE `staff_id`='".$mID."'");
    echo "Success";
}
?>