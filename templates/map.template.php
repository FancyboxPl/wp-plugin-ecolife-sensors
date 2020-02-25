<?php
  $pluginUrl = str_replace('templates/', '', plugin_dir_url(__FILE__));
  $pluginDir = str_replace('templates/', '', plugin_dir_path(__FILE__));
?>
<div class="ecolife-sensors">
  <div class="ecolife-sensors__content">
    <h2 class="ecolife-sensors__header">Dostęp do platformy z wielu źródeł</h2>
    <p class="ecolife-sensors__p">Dane uzyskane z pomiarów są na bieżąco przesyłane, a następnie gromadzone w chmurze, skąd udostępniane są Tobie zawsze i wszędzie, kiedy tylko chcesz i niezależnie, gdzie jesteś. Możesz kontrolować stan powietrza w Twoim mieszkaniu i w pracy, w przedszkolu lub w szkole, gdzie przebywają Twoje dzieci, w swoim mieście oraz w okolicy </p>
    <div class="ecolife-sensors__btns">
      <a href="https://itunes.apple.com/pl/app/ecolife-healthy-breathing/id1238331106" class="ecolife-sensors__btn" target="blank" rel="nofollow noopener">
        <?php echo file_get_contents($pluginDir.'assets/svg/icon-app-store.svg') ?> <span>App Store</span>
      </a>
      <a href="https://play.google.com/store/apps/details?id=com.eu.ecolife.healthy_breathing" class="ecolife-sensors__btn" target="blank" rel="nofollow noopener">
        <?php echo file_get_contents($pluginDir.'assets/svg/icon-google-play.svg') ?> <span>Google Play</span>
      </a>
      <a href="http://app.ecolife.eu.com/" class="ecolife-sensors__btn" target="blank" rel="nofollow noopener">
        <span>Web App</span>
      </a>
    </div>
  </div>
  <div id="ecolife-sensors-map" class="ecolife-sensors__map"></div>
</div>
