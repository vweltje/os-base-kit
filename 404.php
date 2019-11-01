<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Oddessey Solutions
 * @since 1.0.0
 */

get_header() ?>
<div class="four04-wrap container">
	<div class="four04">
		<h1>De opgevraagde pagina is niet gevonden</h1>
		<h3>Ben je iets kwijt?</h3>
		<p>Gebruik de zoek functie bovenaan de pagina of neem contact met ons op.
			<a class="button" title="Contact" href="<?= the_permalink(31) ?>">
				Contact
			</a>
		</p>
	</div>
</div>
<?php get_footer() ?>
