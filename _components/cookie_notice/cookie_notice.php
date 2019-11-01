<?php
/**
* Cookie notice
*/

class Cookie_notice {
  public function __construct() {
    if (isset($_COOKIE['os-base-theme-cookie-statement']) && $_COOKIE['os-base-theme-cookie-statement'] === 'accepted') {
      return;
    }
    echo $this->get_html();
  }

  private function get_html() {
    ob_start();?>

    <div id="cookie-notice">
      <div class="container">
        <p>
          See our <a href="<?= get_the_permalink(3) ?>" title="privacyverklaring">privacy policy</a> en <a href="<?= get_the_permalink(662) ?>" title="cookie statement">cookie statement</a>.
        </p>
      </div>
      <a id="cookie-notice-agree" href="#" title="X"></a>
    </div>

    <?php return ob_get_clean();
  }
}

?>
