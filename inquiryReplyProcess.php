<?php
require 'connection.php';

$replyEmail = $_POST["replyEmailAddress"];
$reply = $_POST["reply"];

if (empty($reply)) {
    echo "Please enter the answer for relevant inquiry";
} else {
    $to = $replyEmail;
    $subject = "Test email";
    $message = $reply;
    $headers = "From: dilushalakshankumara0@gmail.com";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Success";
    } else {
        echo "Failed to send email.";
    }
}
