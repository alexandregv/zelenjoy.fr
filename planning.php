<?php
session_start();

$title = 'ZelEnjoy - Planning';
$navPage = 'Planning';

$date = date('l');
?>
<html lang="fr" dir="ltr">
  <head>
  <?php include "./includes/head.php"?>
  </head>
  <body class="toggler main">
    <div class="website">
      <?php include "./includes/navbar.php";?>
      <section class="title-planning">
        <h5>Planning de la semaine</h5>
        <hr>
      </section>
      <section class="planning-block">
        <!-- LUNDI -->
        <div class="blockday <?php if ($date === 'Monday') {echo 'thisday';} ?>">
          <div class="day">
            <h6>Lundi</h6>
          </div>
          <div class="hours">
            22h15 - 00h00
          </div>
        </div>
        <!-- MARDI -->
        <div class="blockday <?php if ($date === 'Thuesday') {echo 'thisday';} ?>">
          <div class="day">
            <h6>Mardi</h6>
          </div>
          <div class="hours">
            20h30 - 22h00
          </div>
        </div>
        <!-- MERCREDI -->
        <div class="blockday <?php if ($date === 'Wednesday') {echo 'thisday';} ?>">
          <div class="day">
            <h6>Mercredi</h6>
          </div>
          <div class="hours">
            16h15 - 18h00
          </div>
        </div>
        <!-- JEUDI -->
        <div class="blockday <?php if ($date === 'Thursday') {echo 'thisday';} ?>">
          <div class="day">
            <h6>Jeudi</h6>
          </div>
          <div class="hours">
            16h15 - 18h00
            <br>
            22h15 - 00h00
          </div>
        </div>
        <!-- VENDREDI -->
        <div class="blockday <?php if ($date === 'Friday') {echo 'thisday';} ?>">
          <div class="day">
            <h6>Vendredi</h6>
          </div>
          <div class="hours">
            22h15 - 01h00
          </div>
        </div>
        <!-- SAMEDI -->
        <div class="blockday <?php if ($date === 'Saturday') {echo 'thisday';} ?>">
          <div class="day">
            <h6>Samedi</h6>
          </div>
          <div class="hours">
            Pas de stream
          </div>
        </div>
        <!-- DIMANCHE -->
        <div class="blockday <?php if ($date === 'Sunday') {echo 'thisday';} ?>">
          <div class="day">
            <h6>Dimanche</h6>
          </div>
          <div class="hours">
            Pas de stream
          </div>
        </div>

      </section>
      <section class="text-planning">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          A architecto atque deleniti dicta dolorem est eveniet ex excepturi,
          hic illo inventore, laudantium modi neque officia placeat quam quo saepe unde?
        </p>
      </section>
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
