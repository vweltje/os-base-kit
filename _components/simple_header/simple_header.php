<?php

/**
* Theme for simple_header
*
* @package Component
*/

/**
* List of custom argruments
*
* @var    array
*/
$custom_args = array();

/**
* simple_header
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('simple_header')) {
  function simple_header(array $args)
  {
    $logo = get_field('logo', 'option');
    $contact = get_field('contact_information', 'option');
    ob_start();?>

    <header id="menu">
      <div class="nav-wrap">
        <div class="container">
          <div class="flex flex-row">
            <a href="<?= get_home_url() ?>" class="logo">
              <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
            </a>
            <div class="burger">
              <div class="burger-wrap">
                <div class="burger-part"></div>
                <div class="burger-part"></div>
                <div class="burger-part"></div>
              </div>
            </div>
            <nav>
              <?php wp_nav_menu(array(
                'menu' => 'Main navigation'
              )); ?>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <?php return ob_get_clean();
  }
}
