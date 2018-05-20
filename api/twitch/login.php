<?php
session_start();

require "../../includes/global_vars.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_GET['code'])){
  $data = array(
        'client_id' => $twitch_client_id,
        'client_secret' => $twitch_client_secret,
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://v2.zelenjoy.fr/api/twitch/login',
        'code' => $_GET['code']
      );

  $url = 'https://id.twitch.tv/oauth2/token';
  $ch = curl_init($url);

  $postString = http_build_query($data, '', '&');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = json_decode(curl_exec($ch));
  curl_close($ch);

  if (isset($response->error)){
    echo "Nous sommes désolés, une erreur est survenue.";
  }else{
    setcookie("twitch_access_token",  $response->access_token,  time()+3600*24*7, "/", null, true, true);
    setcookie("twitch_refresh_token", $response->refresh_token, time()+3600*24*7, "/", null, true, true);

    if(isset($_SESSION['return_url'])){
      header("Location: {$_SESSION['return_url']}");
    }else{
      header("Location: /");
    }
  }
}
else{
  header("Location: https://id.twitch.tv/oauth2/authorize?response_type=code&client_id={$twitch_client_id}&redirect_uri=http://v2.zelenjoy.fr/api/twitch/login&scope=user_read+user_follows_edit");
}

?>
