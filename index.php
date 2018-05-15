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
              <span>Mode theatre <i id="style-theater" class="fas fa-expand"></i></span>
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
     <?php //TODO: Vérifier si token expiré, puis créer/afficher compte du gars
       if(isset($_COOKIE["twitch_token"])){
           $ch = curl_init('https://api.twitch.tv/kraken/user');
           curl_setopt_array($ch, array(
               CURLOPT_HTTPHEADER  => array("Client-ID: qml5b1xcchymsysftuik4mm9tzj0yj", "Authorization: OAuth {$_COOKIE["twitch_token"]}"),
               CURLOPT_RETURNTRANSFER  => true,
               CURLOPT_VERBOSE     => 1
           ));
           $response_str = curl_exec($ch);
           curl_close($ch);
           $response = json_decode($response_str);
           if (isset($response->error)){ ?>
             <script>
                 alert("Une erreur est survenue: <?php echo $response_str; ?>");
             </script>
           <?php }

           $streamlabs = json_decode(file_get_contents("https://streamlabs.com/api/v1.0/points?access_token=t44FpCOYqZsA4BLsbE7YUMn0nLIVHrMWuajyaNDx&username={$response->name}&channel=zelenjoy"));
           $cookies = $streamlabs->points;
           $total_xp = $streamlabs->time_watched;
           $xp_per_lvl = 4500;
           $lvl_xp = $total_xp % $xp_per_lvl;
           $lvl = floor($total_xp / $xp_per_lvl);

        ?>
           <div class="btn-login-twitch">
            <div class="block-login">
                <a href="" class="d-flex">
                    <div class="text-login">
                        <div class="text-1"><?php echo $response->display_name; ?></div>
                        <div class="subtext-1"><?php echo "lvl. {$lvl} - {$lvl_xp}/{$xp_per_lvl} xp"; ?></div>
                        <div class="subtext-2"><?php echo "{$cookies} cookies"; ?></div>
                    </div>
                    <div class="icon-login">
                        <img src="<?= $response->logo; ?>" width="64" height="64" class="user-logo"/>
                    </div>
                </a>
            </div>
        </div>
       <?php }else{ ?>
        <div class="btn-login-twitch">
            <div class="block-login">
                <a href="https://id.twitch.tv/oauth2/authorize?response_type=code&client_id=qml5b1xcchymsysftuik4mm9tzj0yj&redirect_uri=http://v2.zelenjoy.fr/auth/twitch&scope=user_read+user_follows_edit" class="d-flex">
                    <div class="text-login">
                        <div class="text-1">Connexion</div>
                        <div class="subtext-1">avec twitch</div>
                    </div>
                    <div class="icon-login">
                        <i class="fab fa-twitch fa-3x"></i>
                    </div>
                </a>
            </div>
        </div>
       <?php }
     ?>

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
