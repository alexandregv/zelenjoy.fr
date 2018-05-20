<?php
/**
 * Created by PhpStorm.
 * User: MrTwiZarD
 * Date: 12/05/2018
 * Time: 16:43
 */
?>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-bg theater">
  <a href="" class="navbar-brand navbar-font-title">ZelEnjoy</a>
  <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-font-nav">
      <li class="nav-item"><a href="/" class="nav-link <?php if($navPage === "Stream") { echo "active"; } ?>">Stream <?php if (isset($statusLive)) { echo $statusLive;}?></a></li>
      <li class="nav-item"><a href="<?php echo $URLs['Planning']; ?>" class="nav-link <?php if($navPage === "Planning") { echo "active"; } ?>">Planning</a></li>
      <li class="nav-item"><a href="<?php echo $URLs['Informations']; ?>" class="nav-link <?php if($navPage === "Informations") { echo "active"; } ?>">Informations</a></li>
      <li class="nav-item"><a href="<?php echo $URLs['Leaderboard']; ?>" class="nav-link <?php if($navPage === "Leaderboard") { echo "active"; } ?>">Leaderboard</a></li>
      <li class="nav-item"><a href="<?php echo $URLs['Rediffusions'] ?>" class="nav-link">Rediffusions</a></li>
    </ul>
    <ul class="navbar-nav navbar-font-nav ml-auto mr-3">
      <li class="nav-item"><a href="http://discord.zelenjoy.fr/" class="nav-link nav-link-icons" target="_blank" id="discord"><i class="fab fa-discord"></i></a></li>
      <li class="nav-item"><a href="https://twitter.com/EnjoyZel" class="nav-link nav-link-icons" target="_blank" id="twitter"><i class="fab fa-twitter"></i></a></li>
      <li class="nav-item"><a href="https://www.twitch.tv/zelenjoy" class="nav-link nav-link-icons" target="_blank" id="twitch"><i class="fab fa-twitch"></i></a></li>
      <li class="nav-item"><a class="nav-link nav-link-icons snapchat" target="_blank" id="snapchat"><i class="fab fa-snapchat-ghost"></i></a></li><span id="toggle-snap-name" class="snapchat">Bientôt !</span>
    </ul>
    <ul class="navbar-nav navbar-font-nav ">
      <li class="nav-item nav-item-toggler-night-mode" id="">
        <span class="nav-link" id="night-btn">Mode nuit <i id="night-btn-toggle" class="fas "></i></span>
      </li>
    </ul>
  </div>
</nav>
