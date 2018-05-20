<?php
session_start();
$_SESSION['return_url'] = "https://v2.zelenjoy.fr/api/twitch/follow.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../../includes/global_vars.php";
require "session.php";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.twitch.tv/kraken/users/{$_SESSION['user_id']}/follows/channels/{$channel_id}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_HTTPHEADER => array(
    "Accept: application/vnd.twitchtv.v5+json",
    "Authorization: OAuth {$_COOKIE['twitch_access_token']}",
    "Client-ID: {$twitch_client_id}"
  ),
));

$response = json_decode(curl_exec($curl));

curl_close($curl);

if (isset($response->error)){
  echo "Nous sommes désolés, une erreur s'est produite.";
}
else{
  header("Location: /");
}

?>
