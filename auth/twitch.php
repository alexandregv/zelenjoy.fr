<?php
session_start();

// Display PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

-----[ Partie 1: Obtention d'un code ]-----<br>
Code: <?= $_GET['code'] ?><br>
Scope: <?= $_GET['scope'] ?><br>
<br>
<br>

-----[ Partie 2: Obtention d'un token à l'aide de ce code ]-----<br>
<?php
$data = array(
        'client_id' => 'qml5b1xcchymsysftuik4mm9tzj0yj',
        'client_secret' => 'x0tg45ysc7dehw65q5j6cznx7n4w50',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://v2.zelenjoy.fr/auth/twitch',
        'code' => $_GET['code']
      );

$url = 'https://api.twitch.tv/api/oauth2/token';
$ch = curl_init($url);

$postString = http_build_query($data, '', '&');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_str = curl_exec($ch);
curl_close($ch);

$response = json_decode($response_str);

if (isset($response->error)){
  echo "Erreur: {$response_str}";
}else{
  $_SESSION['token'] = $response->access_token;
  echo "Token: {$_SESSION['token']} <br>";
  echo "<a href=\"https://api.twitch.tv/kraken?oauth_token={$response->access_token}\" target=\"_blank\">Consultez l'état et les infos de ce token ici</a><br>";
}
?>
<br>
<br>

-----[ Partie 3: Utilisation du token ]-----<br>
<?php

$url = 'https://api.twitch.tv/kraken/user';
$ch = curl_init($url);

curl_setopt_array($ch, array(
    CURLOPT_HTTPHEADER  => array("Client-ID: {$data->client_id}", "Authorization: OAuth {$_SESSION['token']}"),
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_VERBOSE     => 1
));
$response_str = curl_exec($ch);
curl_close($ch);

$response = json_decode($response_str);

if (isset($response->error)){
  echo "Erreur: {$response_str}";
}else{
  $_SESSION['username'] = $response->name;
?>
  Réponse: <?=$response_str?> <br>
  Mail de l'user (info privée): <?=$response->email?> <br>

  <form action="follow.php">
    <p><input type="submit" value="Follow ZelEnjoy avec ce compte"></p>
  </form>

<?php
}
?>
