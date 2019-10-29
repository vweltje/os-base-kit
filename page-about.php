<?php
/*
Template Name: About page
*/

function get_director_content($director) {
  ob_start(); ?>
  <?= $director['content'] ?>
  <div class="links">
    <a class="link" style="margin-right: 40px;" href="<?= $director['phone']['url'] ?>" title="<?= $director['phone']['title'] ?>" target="<?= $director['phone']['target'] ?>">
      <?= $director['phone']['title'] ?>
    </a>
    <a class="link" href="<?= $director['email']['url'] ?>" title="<?= $director['email']['title'] ?>" target="<?= $director['email']['target'] ?>">
      <?= $director['email']['title'] ?>
    </a>
  </div>
  <?php return ob_get_clean();
}

function get_director_media($director) {
  ob_start(); ?>
  <div class="image-grid image-grid-type-1">
    <div class="image-grid-wrap background-image" style="background-image: url('<?= $director['image']['sizes']['800w'] ?>')">
      <img src="<?= $director['image']['sizes']['800w'] ?>" alt="<?= $director['image']['alt'] ?>" title="<?= $director['image']['title'] ?>" />
      <div class="post-card-caption">
        <small><?= $director['function'] ?></small>
        <?= $director['name'] ?>
      </div>
    </div>
  </div>
  <?php return ob_get_clean();
}

get_header();

$banner = get_field('_banner');
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'heading_type' => 'h1',
  'classes' => 'spacing-bottom'
));

$directors = get_field('directors');
foreach ($directors as $num => $director) {
  $content = get_director_content($director);
  $media = get_director_media($director);
  new Component('text_section', array(
    'custom_content' => $content,
    'custom_media' => $media,
    'content_alignment' => ($num % 2 === 0 ? 'media_text' : 'text_media'),
    'classes' => 'about-director'
  ));
}
?>

<?php
$inline_video = get_field('_inline_video');
new Component('inline_video', array(
  'acf_content' => $inline_video['inline_video'],
  'classes' => 'spacing-top'
));

$employee_section = get_field('employee_section'); ?>
<section class="container">
  <h2 class="indent"><?= $employee_section['title'] ?></h2>
  <div class="grid employee-grid<?= count($employee_section['employees']) === 4 ? ' grid-type-4' : '' ?>">
    <?php foreach ($employee_section['employees'] as $employee) : ?>
      <div class="post-card">
        <div class="background-image" style="background-image: url('<?= $employee['image']['sizes']['600w'] ?>')">
          <img src="<?= $employee['image']['sizes']['600w'] ?>" alt="<?= $employee['image']['alt'] ?>" title="<?= $employee['image']['title'] ?>" />
        </div>
        <div class="post-card-caption">
          <small><?= $employee['function'] ?></small>
          <?= $employee['name'] ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php $suppliers_section = get_field('suppliers_section');
if (isset($suppliers_section['items'][0]['item']) && $suppliers_section['items'][0]['item']) : ?>
  <section class="container">
    <h2 class="indent"><?= $suppliers_section['title'] ?></h2>
    <?php new Component('posts_slider', array('acf_content' => $suppliers_section['items'])); ?>
  </section>
<?php endif;

get_footer(); ?>
