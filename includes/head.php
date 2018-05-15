<?php
  require 'global_vars.php';

  $streams = json_decode(file_get_contents("https://api.twitch.tv/kraken/streams/" .$channel. "?client_id=" .$twitch_client_id));

  if ($streams->stream != null) {
    $_SESSION['streamon'] = time();
    $statusLive = "<i class='fas fa-circle online-mode'></i>";
    $titleLive = $streams->stream->channel->status;
    $viewers = $streams->stream->viewers. " <i class=\"fas fa-eye\"></i>";
    $gameLive = $streams->stream->game;
  }else {
    $streamsOffline = json_decode(file_get_contents("https://api.twitch.tv/kraken/channels/" .$channel. "?client_id=" .$twitch_client_id));
    $titleLive = $streamsOffline->status;
    $statusLive = "<i class='fas fa-circle offline-mode'></i>";
    $viewers = "0";
  }
  $channelStream = json_decode(file_get_contents("https://api.twitch.tv/kraken/channels/" .$channel. "?client_id=" .$twitch_client_id));
  $followLive = $channelStream->followers;
  $language = $channelStream->language;
  $pseudo = $channelStream->display_name;
  $gameLive = $channelStream->game;

  $URLs = array(
    'Accueil' => '/',
    'Informations' => '/informations',
    'Rediffusions' => "https://www.twitch.tv/{$channel}/videos/all",
    'Planning' => '/planning',
    'Leaderboard' => '/Leaderboard',
  );

?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="icon" href="/img/favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon" />

<title><?php echo($title); ?></title>

<meta name="description" content="" />
<meta name="keywords" content="" />

<!-- Google API fonts -->
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet" />

<!-- FontAwesome 5.0.2 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- My style.css -->
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<!--
 Website by mrtwizard
-->
