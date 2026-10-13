<?php
/**
 * Title: Custom order banner
 * Slug: petal-and-form/custom-order-banner
 * Categories: petal-and-form-home, petal-and-form-story, call-to-action
 * Keywords: custom, commission, personalised, bespoke, cta
 * Description: Rounded lavender banner inviting custom or personalised orders, with an illustration.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","className":"pf-rounded","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"backgroundColor":"tint-3","layout":{"type":"constrained","contentSize":"72rem"}} -->
	<div class="wp-block-group alignwide pf-rounded has-tint-3-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"62%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:62%">
				<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
				<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Custom orders', 'petal-and-form' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"className":"is-style-pf-italic-accent","fontSize":"xx-large"} -->
				<h2 class="wp-block-heading is-style-pf-italic-accent has-xx-large-font-size"><?php echo wp_kses( __( 'Something made <em>just</em> for you', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Wedding favours, a name on a mug, a colour that matches your kitchen. Tell us what you have in mind and we will reply with ideas, timing and a quote.', 'petal-and-form' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( petal_and_form_page_link( 'contact' ) ); ?>"><?php esc_html_e( 'Start a custom order', 'petal-and-form' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%">
				<!-- wp:image {"aspectRatio":"1","scale":"cover","className":"is-style-pf-arch"} -->
				<figure class="wp-block-image is-style-pf-arch"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/gift-box.svg' ) ); ?>" alt="<?php esc_attr_e( 'A wrapped gift box with a yellow ribbon.', 'petal-and-form' ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
