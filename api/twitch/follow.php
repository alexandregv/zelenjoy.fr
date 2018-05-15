<?php
session_start();

require "../../includes/global_vars.php";

$url = "https://api.twitch.tv/helix/users/{$_SESSION['username']}/follows/channels/zelenjoy";
$data = array("notifications" => "true");
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Client-ID: {$twitch_client_id}", "Authorization: Bearer {$_COOKIE['twitch_access_token']}"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$response = curl_exec($ch);

if (!$response)
{
    return false;
}else{
?>
  Vous suivez désormais ZelEnjoy! <br>
  <a href="https://twitch.tv/zelenjoy">https://twitch.tv/zelenjoy</a>
<?php
}
?>
