<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "Yandanimvuyo7@gmail.com"; 
    $subject = "New Contact Form Submission";
    
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $website = isset($_POST['website']) ? "Websites" : "";
    $branding = isset($_POST['branding']) ? "Branding" : "";
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Services: $website $branding\n";
    $email_message .= "Message: $message\n";

    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you for contacting us. We will get back to you shortly.";
    } else {
        echo "There was a problem sending your message. Please try again.";
    }
}
?>
