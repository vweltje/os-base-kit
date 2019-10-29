<?php
/*
Template Name: Nieuws page
*/

get_header();

$banner = get_field('_banner_1', 16);
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'heading_type' => 'h1',
  'category' => is_date() ? get_query_var('year') : ''
));

$subscription_banner = get_field('subscription_banner', 16); ?>
<section class="container">
  <div class="usps-banner subscription-banner">
    <div class="container smaller">
      <div class="flex flex-row">
        <div class="usp">
          <svg xmlns="http://www.w3.org/2000/svg" width="31.001" height="30.001">
            <g data-name="Group 189" fill="none" stroke="#8a2528" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
              <path data-name="Path 82" d="M3.001 17h-2v9a2.946 2.946 0 003 3"/>
              <path data-name="Path 83" d="M7.001 1v25a2.946 2.946 0 01-3 3h23a2.946 2.946 0 003-3V1z"/>
              <path data-name="Rectangle 252" d="M12.001 6h13v7h-13z"/>
              <path data-name="Line 21" d="M25.001 23h-13"/>
              <path data-name="Line 22" d="M25.001 18h-13"/>
            </g>
          </svg>
          <strong><?= $subscription_banner['title'] ?></strong>
          <div><?= $subscription_banner['text'] ?></div>
        </div>
        <div class="usp">
          <?php new Component('mailchimp_form') ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$args = array(
  'post_type'      => 'post',
  'posts_per_page' => -1,
  'order'          => 'DESC',
  'orderby'        => 'date'
);
if (is_date()) {
  $args['date_query'] = array(
    array(
      'after'     => 'January 1st, ' . get_query_var('year'),
      'before'    => 'December 31st, ' . get_query_var('year'),
      'inclusive' => true,
    ),
  );
} ?>

<section class="container">
  <?php $result = new WP_Query($args);
  new Component('grid', array('acf_content' => array('items' => $result->posts)));
  ?>
</section>

<?php new Component('usps_banner');

$banner = get_field('_banner_2', 16);
new Component('banner', array(
  'acf_content' => $banner['banner'],
));

get_footer();
?>
