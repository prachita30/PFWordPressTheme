<?php
/**
 * Title: Customer words (testimonials)
 * Slug: petal-and-form/testimonials
 * Categories: petal-and-form-story, testimonials
 * Keywords: reviews, testimonials, quotes, customers
 * Description: Three quote cards. Contains placeholder text only — replace with genuine customer words you have permission to publish.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo wp_kses( __( 'Kind <em>words</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"15rem"}} -->
	<div class="wp-block-group alignwide">
		<?php for ( $petal_and_form_i = 1; $petal_and_form_i <= 3; $petal_and_form_i++ ) : ?>
		<!-- wp:group {"className":"is-style-pf-card","layout":{"type":"default"}} -->
		<div class="wp-block-group is-style-pf-card">
			<!-- wp:quote {"className":"is-style-plain"} -->
			<blockquote class="wp-block-quote is-style-plain">
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Paste a genuine review here — a sentence or two in your customer’s own words.', 'petal-and-form' ); ?></p>
				<!-- /wp:paragraph -->
				<cite><?php esc_html_e( 'Customer name, city', 'petal-and-form' ); ?></cite>
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:group -->
		<?php endfor; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
