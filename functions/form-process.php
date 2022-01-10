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


/**
 * if key sessionMessage do not exist in superglobal $_SESSION define it as empty []
 */
if(!(isset($_SESSION['sessionMessage']))) $_SESSION['sessionMessage'] = [];



/**
 * if $message exist / if there is a new message push it in my session, key sessionMessage
 */
if(isset($message)) array_push($_SESSION['sessionMessage'], $message);

//var_dump($_SESSION['sessionMessage']);

/**
 * Iterate of local store $message and push each message in 
 * $_SESSION key sessionMessage
 */
// foreach ($messages as $Message){
//   array_push($_SESSION['sessionMessage'], $Message);
// }

$newLocation = "http://0.0.0.0:2022?page=message";
header ("Location: " . $newLocation);
exit;

?>