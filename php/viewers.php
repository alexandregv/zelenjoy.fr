<?php

  $streams = json_decode(file_get_contents("https://api.twitch.tv/kraken/streams/{$channel}?client_id={$twitch_client_id)}");

  if ($streams->stream != null) $viewers = $streams->stream->viewers;
  else $viewers = $streams->stream->followers;

  echo $viewers;
?>
