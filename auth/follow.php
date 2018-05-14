<?php
session_start();

$url = "https://api.twitch.tv/kraken/users/{$_SESSION['username']}/follows/channels/VezoSqua";
$data = array("notifications" => "true");
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Client-ID: pyi7agvbio407jdaq8a20kia903t22", "Authorization: OAuth {$_SESSION['token']}"));
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
  <a href="https://twitch.tv/vezosqua">https://twitch.tv/vezosqua</a>
<?php
}
?>
