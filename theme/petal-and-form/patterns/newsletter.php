<?php
/**
 * Title: Newsletter invitation
 * Slug: petal-and-form/newsletter
 * Categories: petal-and-form-home, call-to-action
 * Keywords: newsletter, email, subscribe, signup
 * Description: Centered invitation to join a mailing list. The button links to your contact page by default — replace it with your newsletter plugin's signup block (the theme does not collect email addresses itself).
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tint-1","layout":{"type":"constrained","contentSize":"38rem"}} -->
<div class="wp-block-group alignfull has-tint-1-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:paragraph {"align":"center","className":"is-style-pf-eyebrow"} -->
	<p class="has-text-align-center is-style-pf-eyebrow"><?php esc_html_e( 'Letters from the studio', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent","fontSize":"xx-large"} -->
	<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent has-xx-large-font-size"><?php echo wp_kses( __( 'First to know, <em>never</em> too often', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'New collections, studio notes and the occasional restock alert — about once a month.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( petal_and_form_page_link( 'contact' ) ); ?>"><?php esc_html_e( 'Join the letter', 'petal-and-form' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
