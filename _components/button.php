<?php
/**
* Button
*/

class Button {

  private $data = array(
    'classes' => ''
  );

  public function __construct(array $args) {
    $this->data = $args;
    echo $this->get_html();
  }

  private function get_html() {
    ob_start();
    $classes = !empty($this->data['classes']) ? ' ' . $this->data['classes'] : '';
    ?>
    <a class="button<?= $classes ?>" href="<?= $this->data['link']['url'] ?>" title="<?= $this->data['link']['title'] ?>" target="<?= $this->data['link']['target'] ?>">
      <?php if (isset($this->data['icon']) && is_array($this->data['icon'])) : ?>
        <div class="button-icon">
          <img src="<?= $this->data['icon']['sizes']['400w'] ?>" alt="<?= $this->data['icon']['alt'] ?>" title="<?= $this->data['icon']['title'] ?>"/>
        </div>
      <?php endif ?>
      <?= $this->data['text'] ?>
    </a>
    <?php return ob_get_clean();
  }
}
