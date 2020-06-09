<!--Code-->
<?php
/* echo "<pre>";
print_r($_POST);
echo '</prev'; */

$message_sent = false;
if (isset($_POST['email']) && $_POST['email'] != '') {

    // sanitization
    if (filter_var($_POST['name'], FILTER_VALIDATE_EMAIL)) {
        //submit the form

        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];

        //email settings
        $to = "blah@blah.com";
        $body = "";
        $body .= "From: " . $userName . "\r\n";
        $body .= "Email: " . $userEmail . "\r\n";
        $body .= "Message: " . $message . "\r\n";

        // sendMessage
        mail($to, $messageSubject, $body);

        $message_sent = true;
    }
    // Validation
    $invalid_class_name = "form-invalid";
}

?>
<!--end of code-->