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
              <div id="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="29.415" height="29.414">
                  <g data-name="Group 72" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" transform="translate(-1 -1)">
                    <path data-name="Line 1" d="M29 29l-8.223-8.223"/>
                    <circle data-name="Ellipse 3" cx="11" cy="11" r="11" transform="translate(2 2)"/>
                  </g>
                </svg>
              </div>
              <div id="search-box">
                <div class="search-box-form-wrap">
                  <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="29.415" height="29.414">
                    <g data-name="Group 72" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" transform="translate(-1 -1)">
                      <path data-name="Line 1" d="M29 29l-8.223-8.223"/>
                      <circle data-name="Ellipse 3" cx="11" cy="11" r="11" transform="translate(2 2)"/>
                    </g>
                  </svg>
                </div>
                <svg id="close-search-box" xmlns="http://www.w3.org/2000/svg" width="24.828" height="24.829">
                  <g data-name="Group 115" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                    <path data-name="Line 19" d="M23.414 1.414l-22 22"/>
                    <path data-name="Line 20" d="M23.414 23.414l-22-22"/>
                  </g>
                </svg>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <div id="menu-actions">
        <a href="tel:<?= str_replace(array(' ', '-', '(', ')'), '', $contact['phone_number']) ?>" title="<?= $contact['phone_number'] ?>"><?= $contact['phone_number'] ?></a>
        <a href="mail:<?= $contact['email'] ?>" title="<?= $contact['email'] ?>"><?= $contact['email'] ?></a>
      </div>
    </header>

    <?php return ob_get_clean();
  }
}
