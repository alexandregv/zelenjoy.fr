<?php
session_start();

$title = 'ZelEnjoy - Informations';
$navPage = 'Informations';

?>
<html lang="fr" dir="ltr">
  <head>
  <?php include "./includes/head.php"?>
  </head>
  <body class="toggler main">
    <div class="website">
      <?php include "./includes/navbar.php";?>
      
    </div>

    <?php include "./includes/chat.php"; ?>

    <div class="frame-stream-mini-player">
      <!-- CHANNEL -->
      <iframe src="<?php echo "https://player.twitch.tv/?channel={$channel}"; ?>"
              width="100%"
              height="100%"
              autoplay=""
              allowfullscreen=""
              frameborder="0">
      </iframe>
    </div>
    <script src="js/app.js"></script>
  </body>
</html>
