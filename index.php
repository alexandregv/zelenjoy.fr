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
              <?php if(isset($viewers)) {echo $viewers;} ?>
            </div>
            <div class="text-center subtitle">
              viewers
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

                <button type="submit" class="text-follow">
                  Suis moi !
                </button>

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
    <div class="chat">
     <?php
       if(isset($_COOKIE["twitch_access_token"])){
           $ch = curl_init('https://api.twitch.tv/helix/users');
           curl_setopt_array($ch, array(
               CURLOPT_HTTPHEADER  => array("Client-ID: {$twitch_client_id}", "Authorization: Bearer {$_COOKIE["twitch_access_token"]}"),
               CURLOPT_RETURNTRANSFER  => true,
               CURLOPT_VERBOSE     => 1
           ));
           $response_str = curl_exec($ch);
           curl_close($ch);
           $response = json_decode($response_str);
           if (isset($response->error)){
             require "api/twitch/refresh.php";
           }else{
              $response = $response->data[0];
           }

           ob_end_flush();

           $streamlabs = json_decode(file_get_contents("https://streamlabs.com/api/v1.0/points?access_token=t44FpCOYqZsA4BLsbE7YUMn0nLIVHrMWuajyaNDx&username={$response->login}&channel={$channel}"));
           $cookies = $streamlabs->points;
           $total_xp = $streamlabs->time_watched;
           $xp_per_lvl = 4500;
           $lvl_xp = $total_xp % $xp_per_lvl;
           $lvl = floor($total_xp / $xp_per_lvl);

        ?>
         <div class="btn-on-logged-twitch">
           <div class="block-logged">
             <div class="d-flex">
               <div class="text-logged d-flex">
                 <div>
                   <div class="pseudo-twitch"><?php echo ((strlen($response->display_name) >= 13) ? (substr($response->display_name, 0, 13) . '...') : $response->display_name); ?></div>
                   <div class="xp"><?= "{$lvl_xp}/{$xp_per_lvl}" ?></div>
                   <div class="cookies"><?= "{$cookies} cookies" ?></div>
                 </div>
                 <div class="dropdown-account">
                   <i class="fas fa-angle-down fa-2x"></i>
                 </div>
               </div>
               <div class="logo-logged">
                 <img src="<?= $response->profile_image_url; ?>" class="user-logo"/>
                 <div class="lvl"><?= "lvl. {$lvl}" ?></div>
               </div>
             </div>
           </div>
           <div class="sub-account">
             <div class="block-account">

               <a href="" class="profile">
                 <div class="icon-profile">
                   <i class="fas fa-user"></i>
                 </div>
                 <div class="text-profile">
                   Voir mon profil <i class="fas fa-angle-right"></i>
                 </div>
               </a>

               <a href="api/twitch/logout.php" class="disconnect">
                 <div class="icon-disconnect">
                   <i class="fas fa-sign-out-alt"></i>
                 </div>
                 <div class="text-disconnect">
                   Déconnexion <i class="fas fa-angle-right"></i>
                 </div>
               </a>

             </div>
           </div>
         </div>
       <?php }else{ ?>
        <div class="btn-login-twitch">
            <div class="block-login">
                <a href="api/twitch/login.php" class="d-flex">
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
              src="https://www.twitch.tv/embed/<?= $channel ?>/chat"
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
