<?php
/**
 * Title: Care instructions
 * Slug: petal-and-form/story-care
 * Categories: petal-and-form-story
 * Keywords: care, instructions, how to, washing, maintenance
 * Description: Image beside a checklist of care instructions in a card.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_care = array(
	__( 'Hand-wash in warm, soapy water; dishwasher-safe pieces are marked on the base.', 'petal-and-form' ),
	__( 'Avoid sudden temperature changes — let pieces warm up before pouring in boiling water.', 'petal-and-form' ),
	__( 'Trim candle wicks to 5 mm before each burn and never leave a flame unattended.', 'petal-and-form' ),
	__( 'Store jewelry dry and separately to keep finishes bright.', 'petal-and-form' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:image {"aspectRatio":"4/5","scale":"cover","className":"is-style-pf-arch"} -->
			<figure class="wp-block-image is-style-pf-arch"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/mug.svg' ) ); ?>" alt="<?php esc_attr_e( 'A speckled stoneware mug.', 'petal-and-form' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- wp:group {"className":"is-style-pf-card","layout":{"type":"default"}} -->
			<div class="wp-block-group is-style-pf-card">
				<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
				<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Care guide', 'petal-and-form' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"className":"is-style-pf-italic-accent"} -->
				<h2 class="wp-block-heading is-style-pf-italic-accent"><?php echo wp_kses( __( 'Made to be <em>used</em>, made to last', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
				<!-- /wp:heading -->
				<!-- wp:list {"className":"is-style-pf-checklist"} -->
				<ul class="wp-block-list is-style-pf-checklist">
					<?php foreach ( $petal_and_form_care as $petal_and_form_item ) : ?>
					<!-- wp:list-item -->
					<li><?php echo esc_html( $petal_and_form_item ); ?></li>
					<!-- /wp:list-item -->
					<?php endforeach; ?>
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
