<?php
/**
* Accordion
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
            <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            	<path id="vertical" class="st0" d="M10 0v20"/>
            	<path id="horizontal" class="st0" d="M20 10H0"/>
            </svg>
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
