<?php
/**
 * Title: How custom orders work
 * Slug: petal-and-form/story-custom-orders
 * Categories: petal-and-form-story
 * Keywords: custom, personalised, commission, process, steps
 * Description: Three steps explaining your custom/personalised order process, with a call to action.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_steps = array(
	array( __( 'Tell us your idea', 'petal-and-form' ), __( 'Share what you would like, the occasion and your timing. Photos and colour references help.', 'petal-and-form' ) ),
	array( __( 'Approve a sketch', 'petal-and-form' ), __( 'We reply with a sketch or mock-up, a price and a delivery estimate before anything is made.', 'petal-and-form' ) ),
	array( __( 'We make it by hand', 'petal-and-form' ), __( 'Your piece is made, finished and wrapped. Explain your lead times and deposit policy here.', 'petal-and-form' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tint-4","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tint-4-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:paragraph {"align":"center","className":"is-style-pf-eyebrow"} -->
		<p class="has-text-align-center is-style-pf-eyebrow"><?php esc_html_e( 'Personalised & custom', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent","anchor":"personalised"} -->
		<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent" id="personalised"><?php echo wp_kses( __( 'How custom orders <em>work</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"15rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $petal_and_form_steps as $petal_and_form_index => $petal_and_form_step ) : ?>
		<!-- wp:group {"className":"is-style-pf-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group is-style-pf-card">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","lineHeight":"1"}},"textColor":"primary","fontFamily":"heading","fontSize":"xx-large"} -->
			<p class="has-primary-color has-text-color has-heading-font-family has-xx-large-font-size" style="font-style:italic;line-height:1"><?php echo esc_html( (string) ( $petal_and_form_index + 1 ) ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $petal_and_form_step[0] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"small"} -->
			<p class="has-contrast-2-color has-text-color has-small-font-size"><?php echo esc_html( $petal_and_form_step[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( petal_and_form_page_link( 'contact' ) ); ?>"><?php esc_html_e( 'Request a custom piece', 'petal-and-form' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
