<?php
/**
* Inline_media
*/

class Inline_media {

  public function __construct(array $args) {
    if (!is_array($args)) return;
    $this->media = $args;
    echo $this->get_html();
  }

  private function get_html() {
    ob_start(); ?>
    <section>
      <div class="inline-media">
        <?php foreach ($this->media as $item) :
          $image = $item['image'];
          if ($item['type'] === 'video') {
            $image = $item['poster'];
          }
          ?>
          <div class="media background-image" data-type="<?= $item['type'] ?>" style="background-image: url('<?= $image['sizes']['400w'] ?>')" <?= $item['type'] === 'video' ? 'data-video="' . $this.get_video_uri($item['video_embed_code']) . '"' : '' ?>>
            <?php if ($item['type'] === 'video') : ?>
              <img src="<?= $image['sizes']['400w'] ?>" title="<?= $image['title'] ?>" alt="<?= $image['title'] ?>" />
              <div class="play-button"></div>
            <?php else : ?>
              <img src="<?= $image['sizes']['400w'] ?>" data-image-original="<?= $image['url'] ?>" title="<?= $image['title'] ?>" alt="<?= $image['title'] ?>" />
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
    <?php return ob_get_clean();
  }

  private function get_video_uri($iframe) {
    preg_match('/src\s*=\s*"(.+?)"/', $iframe, $matches);
    return str_replace(array('src="', '"'), '', $matches[0]);
  }
}
