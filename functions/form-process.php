<?php 
session_start();

/**
 * define $variable with POST form data if $_POST exist
 */
if (isset($_POST['email-address']) and isset($_POST['message'])){
  $message = array(
    "email" => $_POST['email-address'],
    "message" => $_POST['message'],
  );
}

// Local storage of some messages
$messages = [
  array(
    "email" => "machin@truc.bd",
    "message" => "le super message de machin"
  ),
  array(
    "email" => "micro@loge.db",
    "message" => "le message de merde de micro"
  )
];
$newMessage = json_encode($message);


// setcookie('user_id', $newMessage, time() + 50000000000);
// setcookie('user_name', 'dark_theme', time() + 5000000000);
// setcookie('pref', 'dark');

exit;


header ("Location: " . $_SERVER["HTTP_ORIGIN"] . "?page=message");

?>