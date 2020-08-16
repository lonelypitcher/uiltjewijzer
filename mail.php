<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Naam is niet ingevuld', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Email-adres is niet ingevuld', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Ongeldig email-adres', 'code' => 0));
exit();
}
}
if ($subject === ''){
print json_encode(array('message' => 'Onderwerp is niet ingevuld', 'code' => 0));
exit();
}
if ($message === ''){
print json_encode(array('message' => 'Bericht is niet ingevuld', 'code' => 0));
exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "bart.mj.nys@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Uw bericht is verzonden ! Ik neem spoedig contact met u op.', 'code' => 1));
exit();
?>