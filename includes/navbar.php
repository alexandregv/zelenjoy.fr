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
      <li class="nav-item <?php if($navPage === "Accueil") { echo "active"; } ?>"><a href="/" class="nav-link">Stream <?php if (isset($statusLive)) { echo $statusLive;}?></a></li>
      <li class="nav-item <?php if($navPage === "Planning") { echo "active"; } ?>"><a href="<?php echo $URLs['Planning']; ?>" class="nav-link">Planning</a></li>
      <li class="nav-item <?php if($navPage === "Informations") { echo "active"; } ?>"><a href="<?php echo $URLs['Informations']; ?>" class="nav-link">Informations</a></li>
      <li class="nav-item"><a href="<?php echo $URLs['Rediffusions'] ?>" class="nav-link">Rediffusions</a></li>
    </ul>
    <ul class="navbar-nav navbar-font-nav ml-auto mr-3">
      <li class="nav-item"><a href="" class="nav-link nav-link-icons" id="discord"><i class="fab fa-discord"></i></a></li>
      <li class="nav-item"><a href="" class="nav-link nav-link-icons" id="twitter"><i class="fab fa-twitter"></i></a></li>
      <li class="nav-item"><a href="" class="nav-link nav-link-icons" id="twitch"><i class="fab fa-twitch"></i></a></li>
      <li class="nav-item"><a href="" class="nav-link nav-link-icons" id="instagram"><i class="fab fa-instagram"></i></a></li>
    </ul>
    <ul class="navbar-nav navbar-font-nav ">
      <li class="nav-item nav-item-toggler-night-mode" id="">
        <span class="nav-link">mode nuit <i id="toggle-class-style-btn" class="fas "></i></span>
      </li>
    </ul>
  </div>
</nav>