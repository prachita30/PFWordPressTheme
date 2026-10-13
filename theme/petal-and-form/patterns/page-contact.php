<?php
/**
 * Title: Contact page
 * Slug: petal-and-form/page-contact
 * Categories: petal-and-form-pages
 * Keywords: contact, email, address, hours, form
 * Description: Contact details, studio hours and a placeholder for a form plugin's block (WordPress core has no form block; the theme does not process form submissions).
 * Post Types: page
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"45%"} -->
	<div class="wp-block-column" style="flex-basis:45%">
		<!-- wp:paragraph {"fontSize":"medium"} -->
		<p class="has-medium-font-size"><?php esc_html_e( 'Questions about an order, a custom piece or a wholesale enquiry? We read every message and usually reply within two working days.', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"level":3,"fontSize":"large"} -->
		<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Email', 'petal-and-form' ); ?></h3>
		<!-- /wp:heading -->
		<!-- wp:paragraph -->
		<p><a href="mailto:hello@example.com">hello@example.com</a></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"level":3,"fontSize":"large"} -->
		<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Studio', 'petal-and-form' ); ?></h3>
		<!-- /wp:heading -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Your street address, town and postcode. Remove this if you do not welcome visitors.', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"level":3,"fontSize":"large"} -->
		<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Hours', 'petal-and-form' ); ?></h3>
		<!-- /wp:heading -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Tuesday to Saturday, 10:00–17:00', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"55%"} -->
	<div class="wp-block-column" style="flex-basis:55%">
		<!-- wp:group {"className":"is-style-pf-card","backgroundColor":"tint-1","layout":{"type":"default"}} -->
		<div class="wp-block-group is-style-pf-card has-tint-1-background-color has-background">
			<!-- wp:heading {"level":2,"fontSize":"x-large"} -->
			<h2 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Send a message', 'petal-and-form' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Replace this card with the block from a free form plugin (for example Contact Form 7, WPForms Lite or Jetpack Forms). The theme styles standard form fields automatically.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
