<?php
session_start();

require "../../includes/global_vars.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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

$response_str = curl_exec($ch);
curl_close($ch);

$response = json_decode($response_str);

if (isset($response->error)){
  echo "Nous sommes désolés, une erreur est survenue.<br> Erreur: {$response_str}";
}else{
  setcookie("twitch_access_token",  $response->access_token,  time()+3600*24*7, "/", null, true, true);
  setcookie("twitch_refresh_token", $response->refresh_token, time()+3600*24*7, "/", null, true, true);
  header("Location: /");
}

?>
