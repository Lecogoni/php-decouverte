<?php 

$users = [
  array(
    "email" => "nico@nico.fr",
    "password" => "nico"
  ),
  array(
    "email" => "lol@lol.fr",
    "password" => "lol"
  )
];

$url =  $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER['HTTP_HOST'];


// login
if (!(isset($_COOKIE['userLog'])) or $_COOKIE['userLog'] == 0) {

  // store in $loginUser email and password from the form
  if (isset($_POST['email']) and isset($_POST['password'])){
    $loginUser = array(
      "email" => $_POST['email'],
      "message" => $_POST['password'],
    );
  }
  
  $isLog = false;
  
  /**
   * check if $loginUser (data from login form) match a user in my "local json storage"
   * set is log to true if there is a match
   */
  foreach ($users as $user) {
    if ($user["email"] === $_POST['email'] and $user["password"] === $_POST["password"]) {
      $isLog = true;
      break;
    }
  };
  
  if ($isLog == true){
    session_start();
    $_COOKIE['userLog'] = true;
    setcookie('userLog', true, time() + 60 * 60 * 24, "/");
    header ("Location: " . $url );
  } else {
    header ("Location: " . $url . "/?page=login");
  }
//  log out
} else {
  setcookie('userLog', false, time() - 60 * 60 * 24, "/");
  header ("Location: " . $url ."/");
}


?>