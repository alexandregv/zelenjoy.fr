<?php
  require '../includes/stream.php';
  $streams = json_decode(file_get_contents("https://api.twitch.tv/kraken/streams/" .$channel. "?client_id=" .$clientId));
  if ($streams->stream != null){
    $viewers = $streams->stream->viewers;
  }else {
    $viewers = "0 ";
  }
  $channelStream = json_decode(file_get_contents("https://api.twitch.tv/kraken/channels/" .$channel. "?client_id=" .$clientId));
  if (isset($viewers)) {
    echo $viewers. " <i class=\"fas fa-eye\"></i>";
  }
?>
