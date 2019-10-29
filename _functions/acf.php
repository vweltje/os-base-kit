<?php
// ACF Keyboard Shortcuts
function acf_keyboardshortcuts() { ?>
	<script type="text/javascript">
	console.log(`
		---

		ACF keyboard shortcuts:
		A   – new field
		ESC – close field

		---
		`)
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape') {
				document.querySelectorAll('.acf-field-object.open a[title="Close Field"]').forEach(btn => btn.click())
			}
			if ((e.target.nodeName === 'BODY' || e.target.nodeName === 'DIV') && e.key === 'a') {
				const addButton = Array.from(document.querySelectorAll('.acf-hl.acf-tfoot a.add-field')).pop()
				if (addButton) addButton.click()
			}
			if (e.key === 's' && e.metaKey === true) {
				e.preventDefault()
				document.querySelector('#publishing-action input[name="save"]').click()
			}
		})
		</script>
	<?php }
	add_action('acf/input/admin_footer', 'acf_keyboardshortcuts');

	// Add theme options page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'icon_url'    => 'dashicons-hammer'
		));
	}

	// Remove default editor to make more room for ACF editor
	add_action('init', 'my_remove_editor_from_post_type');
	function my_remove_editor_from_post_type() {
		remove_post_type_support( 'page', 'editor' );
	}

	add_filter('acf/settings/show_admin', 'my_acf_show_admin');
	function my_acf_show_admin($show) {
		$current_user = wp_get_current_user();
		return (in_array($current_user->ID, array(
			1 // oddessey
		)));
	}
	?>
