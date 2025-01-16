<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Prepare email
    $headers = "From: $email\r\n"; // Corrected line
    $to = "vikasofficial097@gmail.com"; // Replace with your email address
    $headers .= "Reply-To: $email\r\n"; // Corrected line
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Construct the email body
    $emailBody = "Name: $name\n";
    $emailBody .= "Email: $email\n";
    $emailBody .= "Subject: $subject\n";
    $emailBody .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <link href="css/tqpage.css" media="all" rel="stylesheet" type="text/css">
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Thank You Message</title>
        </head>
        <body>
          <div class="message-container">
            <div class="tick-box"></div>
            <div class="message-title">Thank You for Contacting Us</div>
            <div class="message-body">will get in touch with you as soon as possible.</div>
            <a href="index.html" class="back-button">Back to Home</a>
          </div>
        </body>
        </html>
        ';
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request method.";
}
?>