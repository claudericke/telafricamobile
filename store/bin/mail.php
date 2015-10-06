<?php
if ($_POST) {
    $name  = $_POST['name'];
    $email = $_POST['emailAddress'];
    $message  = "New Inquire from"  . $email . "\n\n" . $_POST['message'];
    $headers = "Email \r\n".$email."\r\n\r\nName \r\n".$name;

    //send email
    mail("claudericke@gmail.com", "email enquiry", $message, $headers);
}

?>
