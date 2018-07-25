<?php
  session_start();
  ob_start();

  $title = 'ZelEnjoy - Stream';
  $navPage = 'Stream';
?>
<html lang="fr" dir="ltr">
  <head>
    <?php include "./includes/head.php"?>
  </head>
  <body class="toggler main">
    <div class="website">
      <?php include "./includes/navbar.php";?>
      <div class="stream">

        <div class="top-stream">
          <div class="top-stream-title">
            <div class="title"><?php echo ((strlen($titleLive) >= 65) ? (substr($titleLive, 0, 65) . '...') : $titleLive); ?></div>
            <div><span class="pseudo"><?php if (isset($pseudo)) {echo $pseudo;}?></span> <span class="game">joue à <?php if(isset($gameLive)) { echo $gameLive;}?></span></div>
          </div>
          <div class="viewers ml-auto mr-3">
            <div class="text-center count">
              <?= $viewers ?>
            </div>
            <div class="text-center subtitle">
              <?php if(isset($streamsOffline)) echo "followers";
                    else echo "viewers";
              ?>
            </div>
          </div>
        </div>

        <div class="frame-stream">
          <!-- CHANNEL -->
          <iframe src="<?php echo "https://player.twitch.tv/?channel={$channel}"; ?>"
                  width="100%"
                  height="100%"
                  autoplay=""
                  allowfullscreen=""
                  frameborder="0">
          </iframe>
        </div>
        <div class="fsdt-btn">
          <div class="d-flex">
            <div class="fsd-btn">
              <form action="api/twitch/follow.php" class="btn-follow-block">

                <input type="submit" class="text-follow" value="Suis moi!">

                <div class="icon-follow">
                  <i class="fas fa-heart"></i>
                </div>

              </form>

              <a href="https://www.twitch.tv/products/zelenjoy" class="btn-subs-block" target="_blank">
                <div class="text-subs">
                  Abonne-toi !
                </div>
                <div class="icon-subs">
                  <i class="fas fa-star"></i>
                </div>
              </a>

              <a href="https://streamlabs.com/zelenjoy" class="btn-donate-block" target="_blank">
                <div class="text-donate">
                  Soutiens moi !
                </div>
                <div class="icon-donate">
                  <i class="fas fa-money-bill-wave"></i>
                </div>
              </a>

            </div>

            <div class="theater-btn">

              <div class="btn-block" id="toggle-class-theater-btn">
                <div class="text-theater">
                  Mode théâtre
                </div>
                <div class="icon-theater">
                  <i id="style-theater" class="fas fa-expand "></i>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
    <?php include "./includes/chat.php"; ?>
    <!-- Twitch script-->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
    <script src="js/app.js"></script>
    <?php
    if ($streams->stream != null) {
      ?>
      <script type="text/javascript">
        setInterval('load_stream()', 5000);
        function load_stream(){
          $('#viewers').load('/php/viewers.php');
        }
      </script>
      <?php
    }
    ?>
    
  </body>
</html>
