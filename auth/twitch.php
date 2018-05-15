<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$data = array(
        'client_id' => 'qml5b1xcchymsysftuik4mm9tzj0yj',
        'client_secret' => 'x0tg45ysc7dehw65q5j6cznx7n4w50',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://v2.zelenjoy.fr/auth/twitch',
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
  setcookie("twitch_token", $response->access_token, time()+3600*24*7, "/", null, true, true);
  header('Location: /');
}

?>
