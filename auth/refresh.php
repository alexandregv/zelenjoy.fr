<?php

$data = array(
        'client_id' => 'qml5b1xcchymsysftuik4mm9tzj0yj',
        'client_secret' => 'x0tg45ysc7dehw65q5j6cznx7n4w50',
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
  header("Location: https://id.twitch.tv/oauth2/authorize?response_type=code&client_id=qml5b1xcchymsysftuik4mm9tzj0yj&redirect_uri=http://v2.zelenjoy.fr/auth/twitch&scope=user_read+user_follows_edit");
}else{
  setcookie("twitch_access_token",  $response->access_token,  time()+3600*24*7, "/", null, true, true);
  setcookie("twitch_refresh_token", $response->refresh_token, time()+3600*24*7, "/", null, true, true);
  header("Location: /");
}

?>
