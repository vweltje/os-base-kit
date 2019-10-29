<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage Oddessey Solutions
* @since 1.0
* @version 1.0
*/

$footer = get_field('footer', 'option');
$contact = get_field('contact_information', 'option');
?>

</main>
<footer>
	<div class="container smaller">
		<div class="footer-wrap flex flex-row">
			<div class="flex flex-column">
				<?php if (!empty($footer['column_heading_1'])) : ?>
					<h4><?= $footer['column_heading_1'] ?></h4>
				<?php endif ?>
				<?php if (!empty($contact['email'])) : ?>
					<a href="mail:<?= $contact['email'] ?>" title="<?= $contact['email'] ?>"><?= $contact['email'] ?></a>
				<?php endif ?>
				<div class="flex flex-row social-icons">
					<?php if (($twitter = get_field('twitter', 'option')) && $twitter) : ?>
						<a class="social-icon" href="<?= get_field('twitter', 'option') ?>" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="25.68" height="20.8" viewBox="0 0 32.1 26">
								<path fill="#fff" transform="translate(0.1 -3)" d="M32,6.1a11.836,11.836,0,0,1-3.8,1,6.462,6.462,0,0,0,2.9-3.6,12.606,12.606,0,0,1-4.2,1.6A6.438,6.438,0,0,0,22.2,3a6.594,6.594,0,0,0-6.6,6.6,7.719,7.719,0,0,0,.2,1.5A18.852,18.852,0,0,1,2.2,4.2a6.294,6.294,0,0,0-.9,3.3A6.765,6.765,0,0,0,4.2,13a6.109,6.109,0,0,1-3-.8v.1a6.543,6.543,0,0,0,5.3,6.4,9.852,9.852,0,0,1-1.7.2,4.869,4.869,0,0,1-1.2-.1,6.679,6.679,0,0,0,6.1,4.6,12.917,12.917,0,0,1-8.2,2.8,8.6,8.6,0,0,1-1.6-.1A19.851,19.851,0,0,0,10.1,29c12.1,0,18.7-10,18.7-18.7V9.5A17.215,17.215,0,0,0,32,6.1Z"/>
							</svg>
						</a>
					<?php endif; ?>
					<?php if (($facebook = get_field('facebook', 'option')) && $facebook) : ?>
						<a class="social-icon" href="<?= get_field('facebook', 'option') ?>" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="25.5288" height="25.6" viewBox="0 0 31.911 32">
								<path fill="#fff" d="M30.7,0H1.3A1.324,1.324,0,0,0,0,1.3V30.6A1.347,1.347,0,0,0,1.3,32H17V20H13V15h4V11c0-4.1,2.6-6.2,6.3-6.2,1.8,0,3.3.2,3.7.2V9.3H24.4c-2,0-2.5,1-2.5,2.4V15h5l-1,5h-4L22,32h8.6a1.324,1.324,0,0,0,1.3-1.3V1.3A1.181,1.181,0,0,0,30.7,0Z"/>
							</svg>
						</a>
					<?php endif; ?>
					<?php if (($linkedin = get_field('linkedin', 'option')) && $linkedin) : ?>
						<a class="social-icon" href="<?= get_field('linkedin', 'option') ?>" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="25.5288" height="25.6" viewBox="0 0 31.911 32">
								<path fill="#fff" d="M30.7,0H1.3A1.324,1.324,0,0,0,0,1.3V30.6A1.347,1.347,0,0,0,1.3,32H30.6a1.324,1.324,0,0,0,1.3-1.3V1.3A1.181,1.181,0,0,0,30.7,0ZM9.5,27.3H4.7V12H9.5ZM7.1,9.9A2.8,2.8,0,1,1,9.9,7.1,2.8,2.8,0,0,1,7.1,9.9ZM27.3,27.3H22.6V19.9c0-1.8,0-4-2.5-4s-2.8,1.9-2.8,3.9v7.6H12.6V12H17v2.1h.1a4.994,4.994,0,0,1,4.5-2.5c4.8,0,5.7,3.2,5.7,7.3Z"/>
							</svg>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="flex flex-column">
				<?php if (!empty($footer['column_heading_2'])) : ?>
					<h4><?= $footer['column_heading_2'] ?></h4>
				<?php endif ?>
				<?php if (!empty($contact['address'])) : ?>
					<a href="https://maps.google.com/maps?q=<?= urlencode($contact['address']) ?> " title="<?= $contact['address'] ?>" target="_blank"><?= $contact['address'] ?></a>
				<?php endif ?>
				<?php if (!empty($contact['phone_number'])) : ?>
					<a class="phone" href="tel:<?= str_replace(array(' ', '-', '(', ')'), '', $contact['phone_number']) ?>" title="<?= $contact['phone_number'] ?>"><?= $contact['phone_number'] ?></a>
				<?php endif ?>
			</div>
			<div class="flex flex-column">
				<?php if (!empty($footer['column_heading_3'])) : ?>
					<h4><?= $footer['column_heading_3'] ?></h4>
					<ul class="news-list">
						<?php
						$result = new WP_Query(array(
							'post_type' => 'post',
							'limit' => 4,
							'order' => 'ASC'
						));
						foreach ($result->posts as $post) : ?>
						<li>
							<a href="<?= get_the_permalink($post->ID) ?>" title="<?= $post->post_title ?>"><?= $post->post_title ?></a>
						</li>
						<?php endforeach; ?>
					<?php endif ?>
				</ul>
			</div>
			<div class="flex flex-column">
				<?php if (!empty($footer['column_heading_4'])) : ?>
					<h4><?= $footer['column_heading_4'] ?></h4>
				<?php endif ?>
				<?php wp_nav_menu(array(
					'menu' => 'Footer navigation',
					'container' => 'div',
					'menu_class' => 'footer-nav'
				)); ?>
			</div>
		</div>
	</div>
</footer>
</div>
<?php
new Component('cookie_notice');
wp_footer(); //Wordpress task bar
Component::load_check();
?>
</body>
</html>
