<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "harshithaindia15@gmail.com"; // Your email
    $subject = "New Contact Form Submission";

    // Collect and sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Build the email body
    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<h2 style='text-align:center; color:green;'>Thank you! Your message has been sent.</h2>";
    } else {
        echo "<h2 style='text-align:center; color:red;'>Sorry, something went wrong. Please try again later.</h2>";
    }
} else {
    // Direct access to PHP file
    echo "<h2 style='text-align:center; color:red;'>Access denied!</h2>";
}
?>
