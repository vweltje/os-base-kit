<?php /**
* Theme for cookie_notice
*
* @package Component
*/

/**
* List of custom argruments
*
*/
$custom_args = array();

/**
* cookie_notice
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('cookie_notice')) {
  function cookie_notice(array $args)
  {
    ob_start();
    if (isset($_COOKIE['os-base-theme-cookie-statement']) && $_COOKIE['os-base-theme-cookie-statement'] === 'accepted') {
      return;
    }
    ?>

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
}?>
