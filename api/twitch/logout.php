<?php

session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);

unset($_COOKIE['twitch_access_token']);
unset($_COOKIE['twitch_refresh_token']);

setcookie("twitch_access_token", null, -1, '/');
setcookie("twitch_refresh_token", null, -1, '/');

header("Location: /");

?>
