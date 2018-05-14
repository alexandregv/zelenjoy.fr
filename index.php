<?php
  session_start();

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
            <div class="title"><?php if (isset($titleLive)) { if (strlen($titleLive) >= 65) { $titlecut = substr($titleLive, 0, 65) . '...'; echo $titlecut;} else {echo $titleLive;}}?></div>
            <div><span class="pseudo"><?php if (isset($pseudo)) {echo $pseudo;}?></span> <span class="game">joue à <?php if(isset($gameLive)) { echo $gameLive;}?></span></div>
          </div>
          <div class="transition-block"></div>
          <div class="top-stream-viewers-theater">
            <div class="theater-block" id="toggle-class-theater-btn">
              <span>mode theatre <i id="style-theater" class="fas fa-expand"></i></>
            </div>
            <div class="transition-block-viewers"></div>
            <div class="viewers-block">
              <span id="viewers"><?php if (isset($viewers)){echo $viewers;} ?></span>
            </div>
          </div>
        </div>

        <div class="frame-stream">
          <!-- CHANNEL -->
          <iframe src="<?php echo "https://player.twitch.tv/?channel=zelenjoy"; ?>"
                  width="100%"
                  height="100%"
                  autoplay=""
                  allowfullscreen=""
                  frameborder="0">
          </iframe>
        </div>
        <div class="fsd-btns">
          <a href="" class="">
            <h4>Follow</h4>
          </a>
          <a href="">
            <h4>Subscribe</h4>
          </a>
          <a href="">
            <h4>Donation</h4>
          </a>
        </div>

      </div>
    </div>
    <div class="chat">
      <iframe frameborder="0"
              scrolling="no"
              id="chat_embed"
              src="<?php echo "https://www.twitch.tv/embed/zelenjoy/chat?darkpopout"; ?>"
              height="100%"
              width="100%">
      </iframe>
    </div>
    <script type="text/javascript" src="js/app.js"></script>

    <!-- Twitch script-->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
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
