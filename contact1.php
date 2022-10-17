<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to_email = "chandelaman1234@gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi, This is test email send by PHP Script";
$headers = "From: $email";

if (mail($to_email, $name, $message, $headers)) {
    echo "Email successfully sent to $to_email...";
} 
else {
    echo "Email sending failed...";
}
