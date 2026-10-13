<?php
/**
 * Title: Inspiration board
 * Slug: petal-and-form/inspiration-board
 * Categories: petal-and-form-home, petal-and-form-story, gallery
 * Keywords: pinterest, moodboard, masonry, gallery, inspiration, styling
 * Description: Pinterest-inspired masonry board of images and notes (pure CSS columns, no JavaScript). For editorial content — not for the product grid.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_img = static function ( $file ) {
	return esc_url( get_theme_file_uri( 'assets/images/' . $file ) );
};
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"36rem","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
		<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Inspiration board', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"className":"is-style-pf-italic-accent"} -->
		<h2 class="wp-block-heading is-style-pf-italic-accent"><?php echo wp_kses( __( 'Ideas for a <em>softer</em> home', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color"><?php esc_html_e( 'A seasonal moodboard of colour, texture and small styling ideas. Swap in your own photos to make it a room guide, a gift edit or a colour story.', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","className":"pf-board","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide pf-board">
		<!-- wp:image {"aspectRatio":"3/4","scale":"cover"} -->
		<figure class="wp-block-image"><img src="<?php echo $petal_and_form_img( 'bud-vase.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in closure. ?>" alt="<?php esc_attr_e( 'Dried stems in a small terracotta bud vase.', 'petal-and-form' ); ?>" style="aspect-ratio:3/4;object-fit:cover"/><figcaption class="wp-element-caption"><?php esc_html_e( 'One stem is enough on a windowsill.', 'petal-and-form' ); ?></figcaption></figure>
		<!-- /wp:image -->

		<!-- wp:group {"className":"pf-board__note","backgroundColor":"tint-1","layout":{"type":"default"}} -->
		<div class="wp-block-group pf-board__note has-tint-1-background-color has-background">
			<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
			<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Colour story', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","lineHeight":"1.3"}},"fontFamily":"heading","fontSize":"x-large"} -->
			<p class="has-heading-font-family has-x-large-font-size" style="font-style:italic;line-height:1.3"><?php esc_html_e( 'Blush, oat and a little sage — warm neutrals that feel calm all year.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:image {"aspectRatio":"1","scale":"cover"} -->
		<figure class="wp-block-image"><img src="<?php echo $petal_and_form_img( 'mug.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'A speckled sage stoneware mug.', 'petal-and-form' ); ?>" style="aspect-ratio:1;object-fit:cover"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Slow mornings, speckled glaze.', 'petal-and-form' ); ?></figcaption></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"4/5","scale":"cover"} -->
		<figure class="wp-block-image"><img src="<?php echo $petal_and_form_img( 'art-prints.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'Three framed abstract prints on a pale wall.', 'petal-and-form' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Hang prints in a loose, uneven trio.', 'petal-and-form' ); ?></figcaption></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"2/3","scale":"cover"} -->
		<figure class="wp-block-image"><img src="<?php echo $petal_and_form_img( 'candle.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'A lit candle in a frosted jar.', 'petal-and-form' ); ?>" style="aspect-ratio:2/3;object-fit:cover"/></figure>
		<!-- /wp:image -->

		<!-- wp:group {"className":"pf-board__note","backgroundColor":"tint-4","layout":{"type":"default"}} -->
		<div class="wp-block-group pf-board__note has-tint-4-background-color has-background">
			<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
			<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Styling tip', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Group objects in odds — three on a shelf, five on a table — and vary their heights.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:image {"aspectRatio":"4/5","scale":"cover"} -->
		<figure class="wp-block-image"><img src="<?php echo $petal_and_form_img( 'ceramic-vase.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'A cream speckled vase holding a green branch.', 'petal-and-form' ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"aspectRatio":"1","scale":"cover"} -->
		<figure class="wp-block-image"><img src="<?php echo $petal_and_form_img( 'ring-dish.svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>" alt="<?php esc_attr_e( 'A blush ring dish holding a gold ring.', 'petal-and-form' ); ?>" style="aspect-ratio:1;object-fit:cover"/><figcaption class="wp-element-caption"><?php esc_html_e( 'A home for the things you take off at night.', 'petal-and-form' ); ?></figcaption></figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
