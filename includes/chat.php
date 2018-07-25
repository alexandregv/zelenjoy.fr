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
          src="https://www.twitch.tv/embed/lestream/chat"
          height="100%"
          width="100%">
  </iframe>
</div>
<div id="slider" class="parameters">
  <section class="title-parameters">
    <h4>Paramètres</h4>
  </section>
  <section class="block-parameters">

    <div class="element-params">
      <div class="mode-params">
        <h5>Mode nuit</h5>
        <span>Changer entre le mode blanc est noir.</span>
      </div>
      <div class="btn-params" id="night-btn">
        <i id="night-btn-toggle" class="fas "></i>
      </div>
    </div>

    <div class="element-params">
      <div class="mode-params">
        <h5>Position du chat</h5>
        <span>Changer entre le chat à gauche ou à droite.</span>
      </div>
      <div class="btn-params" id="chat-btn">
        <i id="chat-btn-toggle" class="fas "></i>
      </div>
    </div>

    <div class="element-params">
      <div class="mode-params">
        <h5>Mini player</h5>
        <span>Activer ou désactiver le mini player</span>
      </div>
      <div class="btn-params" id="chat-btn">
        <i id="mplayer-btn-toggle" class="fas "></i>
      </div>
    </div>
  </section>

  <section class="footer-params">
    <hr class="hr-footer-params">
    <div class="credits-params">
      <a href="" class="credits" data-toggle="modal" data-target="#credits">Crédits</a>
      <span><i class="fas fa-circle"></i></span>
      <a href="" class="cgu">Mentions légales</a>
      <span><i class="fas fa-circle"></i></span>
      <a href="" class="github">Contact</a>
    </div>
    <div class="footer-dev">
      <a href="" class="github">Github</a>
      <span><i class="fas fa-circle"></i></span>
      <a href="" class="github">Signaler un bug</a>
    </div>
    <div class="copyright-block">
      <a href="" class="copyright">zelenjoy.fr 2018</a>
    </div>
  </section>
</div>




<!-- Modal credits-->
<div class="modal fade" id="credits" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crédits</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="dev-list">
        	<div class="dev">
        		<div class="dev-logo">
        			<img src="/img/logomrtwizard.png">
        		</div>
        		<div class="dev-pseudo">
        			<a href="https://mrtwizard.fr/" target="_blank">mrtwizard</a>
        			<span>Développeur frontend</span>
        		</div>
        		<div class="dev-links">
        			<a href="https://twitter.com/mrtwizard" target="_blank" id="twitter"><i class="fab fa-twitter"></i></a>
        			<a href="https://github.com/mrtwizard" target="_blank" id="github"><i class="fab fa-github"></i></a>
        		</div>
        	</div>

        	<div class="dev">
        		<div class="dev-logo">
        			<img src="/img/logotriinoxys.png">
        		</div>
        		<div class="dev-pseudo">
        			<a href="https://triinoxys.fr/" target="_blank">triinoxys</a>
        			<span>Développeur backend</span>
        		</div>
        		<div class="dev-links">
        			<a href="https://twitter.com/triinoxys" target="_blank" id="twitter"><i class="fab fa-twitter"></i></a>
        			<a href="https://github.com/triinoxys" target="_blank" id="github"><i class="fab fa-github"></i></a>
        		</div>
        	</div>
        	
        </div>
      </div>
    </div>
  </div>
</div>