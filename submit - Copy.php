<?php
// Use the PHPMailer classes for sending email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the autoload.php file from the PHPMailer library
require '/var/www/html/vendor/autoload.php';

// Set PHP to display errors for debugging (should be turned off in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP(); // Set the mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Define the SMTP server (Gmail in this case)
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'XXXXX'; // SMTP username (replace with actual username)
    $mail->Password = 'XXXXXX'; // SMTP password (replace with actual password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption
    $mail->Port = 465; // TCP port to connect to (465 for Gmail with SSL)

    // Retrieve sender information from the form submission
    $name = htmlspecialchars($_POST['name']); // Sender's name
    $email = htmlspecialchars($_POST['email']); // Sender's email
    $message = htmlspecialchars($_POST['message']); // Sender's message

    // Sender and recipient settings
    $mail->setFrom("{$email}", "{$name}"); // Set the sender's email and name
    $mail->addAddress('lotuslandscaping62@gmail.com', 'Lotus Landscaping Recipient'); // Add a recipient

    // Email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'New message from ' . $name; // Set the subject line
    $mail->Body = "<strong>Email:</strong> {$email}<br><strong>Message:</strong><br>{$message}"; // Set the HTML message body
    $mail->AltBody = "Email: {$email}\nMessage:\n{$message}"; // Set the plain-text alternative body

    // Send the email
    $mail->send();
    echo 'Message has been sent'; // Confirm message sent
    header("Location: index.html"); // Redirect to a different page
} catch (Exception $e) {
    // Handle exceptions by displaying the error message
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
