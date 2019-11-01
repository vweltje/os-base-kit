<?php
/**
* Cookie notice
*/

class Accordion {

  /**
  * Items to add
  *
  * @var	array
  */
  private $items = array();

  /**
  * Item to show at first load
  *
  * @var	int
  */
  private $show_item = 1;

  public function __construct(array $args) {
    $this->items = $args['items'];
    if (isset($args['show_item']) && is_numeric($args['show_item'])) {
      $this->show_item = $args['show_item'];
    }
    if (isset($_COOKIE['os-base-theme-cookie-statement']) && $_COOKIE['os-base-theme-cookie-statement'] === 'accepted') {
      return;
    }
    echo $this->get_html();
  }

  private function get_html() {
    ob_start();?>
    <div class="accordion wrap">
      <?php $i = 1;
      foreach ($this->items as $item) :
        $aditional_show_item = $i === $this->show_item ? 'visible-first-load' : ''; ?>
        <div class="accordion-item <?= $aditional_show_item ?>">
          <p class="wrap accordion-item-head">
            <?= $item['title'] ?>
            <?php include('plus-icon.svg') ?>
          </p>
          <div class="wrap accordion-item-content">
            <?= $item['content'] ?>
          </div>
        </div>
        <?php $i++;
      endforeach; ?>
    </div>
    <?php return ob_get_clean();
  }
}
