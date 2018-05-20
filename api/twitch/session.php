<?php
//session_start();

require "../../includes/global_vars.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_COOKIE["twitch_access_token"])){
  if(!isset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_logo'])){
    $ch = curl_init('https://api.twitch.tv/helix/users');
    curl_setopt_array($ch, array(
       CURLOPT_HTTPHEADER  => array("Client-ID: {$twitch_client_id}", "Authorization: Bearer {$_COOKIE["twitch_access_token"]}"),
       CURLOPT_RETURNTRANSFER  => true,
       CURLOPT_VERBOSE     => 1
    ));
    $response = json_decode(curl_exec($ch));
    curl_close($ch);

    if (isset($response->error)){
     require "api/twitch/refresh.php";
    }
    else{
      $response = $response->data[0];

      $_SESSION['user_id']   = $response->id;
      $_SESSION['user_name'] = $response->display_name;
      $_SESSION['user_logo'] = $response->profile_image_url;
    }
  }
  
}
else{
  header("Location: login.php");
}

?>
