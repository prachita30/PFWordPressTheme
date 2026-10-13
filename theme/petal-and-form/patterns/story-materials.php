<?php
/**
 * Title: Materials & craftsmanship
 * Slug: petal-and-form/story-materials
 * Categories: petal-and-form-story
 * Keywords: materials, craft, process, sustainable, ingredients
 * Description: Three cards explaining the materials you use and why.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_materials = array(
	array( 'tint-1', __( 'Stoneware clay', 'petal-and-form' ), __( 'A speckled, high-fired clay that is durable enough for daily use. Say where it comes from and why you chose it.', 'petal-and-form' ) ),
	array( 'tint-2', __( 'Plant-based wax', 'petal-and-form' ), __( 'Describe your wax blend, wicks and fragrance oils, and how long a candle burns.', 'petal-and-form' ) ),
	array( 'tint-4', __( 'Recycled paper', 'petal-and-form' ), __( 'Explain your paper weights, finishes and packaging choices in plain words.', 'petal-and-form' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"36rem","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
		<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Materials', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"className":"is-style-pf-italic-accent"} -->
		<h2 class="wp-block-heading is-style-pf-italic-accent"><?php echo wp_kses( __( 'Chosen with <em>care</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"15rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $petal_and_form_materials as $petal_and_form_m ) : ?>
		<!-- wp:group {"className":"pf-rounded","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"<?php echo esc_attr( $petal_and_form_m[0] ); ?>","layout":{"type":"default"}} -->
		<div class="wp-block-group pf-rounded has-<?php echo esc_attr( $petal_and_form_m[0] ); ?>-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $petal_and_form_m[1] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php echo esc_html( $petal_and_form_m[2] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
