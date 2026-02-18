<?php
// === Basic Settings ===
$subject = 'New Visit Request';  // Subject of your email
$to = 'contact@designesia.com';  // Recipient's email address

// === Get Form Data Safely ===
$name    = isset($_POST['name']) ? trim($_POST['name']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$date    = isset($_POST['date']) ? trim($_POST['date']) : '';
$time    = isset($_POST['time']) ? trim($_POST['time']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// === Validate Required Fields ===
if (empty($name) || empty($email) || empty($date) || empty($time) || empty($message)) {
    echo 'failed';
    exit;
}

// === Email Content ===
$email_from = $name . ' <' . $email . '>';

$headers  = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
$headers .= "From: " . $email_from . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";

// === Email Body ===
$body  = "New Visit Request:\n\n";
$body .= "Name : " . $name . "\n";
$body .= "Email: " . $email . "\n";
$body .= "Preferred Date: " . $date . "\n";
$body .= "Preferred Time: " . $time . "\n";
$body .= "Message: " . $message . "\n";

// === Send Email ===
if (@mail($to, $subject, $body, $headers)) {
    echo 'sent';
} else {
    echo 'failed';
}
?>
