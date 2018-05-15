<?php

require "includes/global_vars.php";

$data = array(
        'client_id' => $twitch_client_id,
        'client_secret' => $twitch_client_secret,
        'grant_type' => 'refresh_token',
        'refresh_token' => $_COOKIE["twitch_refresh_token"]
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

if (isset($response->status) && $response->status == 400){
  header("Location: https://id.twitch.tv/oauth2/authorize?response_type=code&client_id={$twitch_client_id}&redirect_uri=http://v2.zelenjoy.fr/api/twitch/login&scope=user_read+user_follows_edit");
}else{
  setcookie("twitch_access_token",  $response->access_token,  time()+3600*24*7, "/", null, true, true);
  setcookie("twitch_refresh_token", $response->refresh_token, time()+3600*24*7, "/", null, true, true);
  header("Location: /");
}

?>
