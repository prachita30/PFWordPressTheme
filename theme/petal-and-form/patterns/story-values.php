<?php
/**
 * Title: Brand values
 * Slug: petal-and-form/story-values
 * Categories: petal-and-form-story, petal-and-form-home, about
 * Keywords: values, promise, why us, benefits
 * Description: Four short promises in numbered columns — what customers can expect from your studio.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_values = array(
	array( __( 'Made by hand', 'petal-and-form' ), __( 'Every piece is shaped, poured or stitched in our studio — no two are exactly alike.', 'petal-and-form' ) ),
	array( __( 'Small batches', 'petal-and-form' ), __( 'We make a little at a time, so nothing sits in a warehouse and less goes to waste.', 'petal-and-form' ) ),
	array( __( 'Thoughtful wrapping', 'petal-and-form' ), __( 'Describe how you pack orders — paper, ribbon, a handwritten note.', 'petal-and-form' ) ),
	array( __( 'Real people', 'petal-and-form' ), __( 'Questions go to the maker, not a call centre. Tell customers how to reach you.', 'petal-and-form' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}}} -->
	<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo wp_kses( __( 'What we <em>promise</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"12rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $petal_and_form_values as $petal_and_form_index => $petal_and_form_value ) : ?>
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30"}},"border":{"top":{"color":"var:preset|color|accent","width":"1px"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--accent);border-top-width:1px;padding-top:var(--wp--preset--spacing--30)">
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"textColor":"primary","fontFamily":"heading","fontSize":"x-large"} -->
			<p class="has-primary-color has-text-color has-heading-font-family has-x-large-font-size" style="font-style:italic"><?php echo esc_html( sprintf( '%02d', $petal_and_form_index + 1 ) ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $petal_and_form_value[0] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"small"} -->
			<p class="has-contrast-2-color has-text-color has-small-font-size"><?php echo esc_html( $petal_and_form_value[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
