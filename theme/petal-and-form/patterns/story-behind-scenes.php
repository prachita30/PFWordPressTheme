<?php
/**
 * Title: Behind the scenes (process steps)
 * Slug: petal-and-form/story-behind-scenes
 * Categories: petal-and-form-story
 * Keywords: process, how it's made, behind the scenes, steps
 * Description: Large image with a numbered, four-step "how it's made" sequence.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_steps = array(
	array( __( 'Sketch', 'petal-and-form' ), __( 'Every collection starts as a page of drawings and colour swatches.', 'petal-and-form' ) ),
	array( __( 'Shape', 'petal-and-form' ), __( 'Pieces are thrown, poured or cut by hand, a few at a time.', 'petal-and-form' ) ),
	array( __( 'Finish', 'petal-and-form' ), __( 'Glazing, curing or polishing — the slow part that makes each piece unique.', 'petal-and-form' ) ),
	array( __( 'Wrap', 'petal-and-form' ), __( 'Checked, wrapped and sent out with a note from the studio.', 'petal-and-form' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
			<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Behind the scenes', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"is-style-pf-italic-accent","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
			<h2 class="wp-block-heading is-style-pf-italic-accent" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo wp_kses( __( 'How a piece is <em>made</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
			<!-- /wp:heading -->
			<?php foreach ( $petal_and_form_steps as $petal_and_form_index => $petal_and_form_step ) : ?>
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"top":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--border);border-top-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","lineHeight":"1"}},"textColor":"primary","fontFamily":"heading","fontSize":"x-large"} -->
				<p class="has-primary-color has-text-color has-heading-font-family has-x-large-font-size" style="font-style:italic;line-height:1"><?php echo esc_html( sprintf( '%02d', $petal_and_form_index + 1 ) ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":3,"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $petal_and_form_step[0] ); ?></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"small"} -->
					<p class="has-contrast-2-color has-text-color has-small-font-size"><?php echo esc_html( $petal_and_form_step[1] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:image {"aspectRatio":"4/5","scale":"cover","style":{"border":{"radius":"var(--wp--custom--radius--large)"}}} -->
			<figure class="wp-block-image has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/studio-shelves.svg' ) ); ?>" alt="<?php esc_attr_e( 'Finished pieces drying on studio shelves.', 'petal-and-form' ); ?>" style="border-radius:var(--wp--custom--radius--large);aspect-ratio:4/5;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
