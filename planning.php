<?php
session_start();

$title = 'ZelEnjoy - Planning';
$navPage = 'Planning';
?>
<html lang="fr" dir="ltr">
<head>
<?php include "./includes/head.php"?>
</head>
<body class="toggler main">
<div class="block">
<?php include "./includes/navbar.php";?>
</div>
<div class="frame-stream-mini-player">
  <!-- CHANNEL -->
  <iframe src="<?php echo "https://player.twitch.tv/?channel=zelenjoy"; ?>"
          width="100%"
          height="100%"
          autoplay=""
          allowfullscreen=""
          frameborder="0">
  </iframe>
</div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
