<?php
/**
* Simple_header
*/

class Simple_header {

  public function __construct(array $args) {
    echo $this->get_html();
  }

  private function get_html() {
    ob_start();?>
    <header id="menu">
      <div class="nav-wrap">
        <div class="container">
          <div class="flex flex-row">
            <?php
            echo $this->get_logo_html();
            echo $this->get_burger_button_html();
            echo $this->get_nav_html();
            ?>
          </div>
        </div>
      </div>
    </header>
    <?php return ob_get_clean();
  }

  private function get_logo_html() {
    $logo = get_field('logo', 'option');
    ob_start();?>
    <a href="<?= get_home_url() ?>" class="logo">
      <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
    </a>
    <?php return ob_get_clean();
  }

  private function get_burger_button_html() {
    ob_start();?>
    <div class="burger">
      <div class="burger-wrap">
        <div class="burger-part"></div>
        <div class="burger-part"></div>
        <div class="burger-part"></div>
      </div>
    </div>
    <?php return ob_get_clean();
  }

  private function get_nav_html() {
    ob_start();?>
    <nav>
      <?php wp_nav_menu(array(
        'menu' => 'Main navigation'
      )); ?>
    </nav>
    <?php return ob_get_clean();
  }
}
