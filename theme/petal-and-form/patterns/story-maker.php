<?php
/**
 * Title: Meet the maker
 * Slug: petal-and-form/story-maker
 * Categories: petal-and-form-story, petal-and-form-home, about
 * Keywords: maker, founder, about, story, studio
 * Description: Image of the studio beside a short, personal maker's story with a signature line.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tint-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tint-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"aspectRatio":"4/5","scale":"cover","style":{"border":{"radius":"var(--wp--custom--radius--large)"}}} -->
			<figure class="wp-block-image has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/studio-shelves.svg' ) ); ?>" alt="<?php esc_attr_e( 'Studio shelves lined with handmade pots, bowls and a candle.', 'petal-and-form' ); ?>" style="border-radius:var(--wp--custom--radius--large);aspect-ratio:4/5;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
			<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Meet the maker', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"is-style-pf-italic-accent","fontSize":"xx-large"} -->
			<h2 class="wp-block-heading is-style-pf-italic-accent has-xx-large-font-size"><?php echo wp_kses( __( 'It started at a kitchen table, with <em>one</em> lump of clay.', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Tell your story here: who you are, why you make what you make, and what you hope people feel when they unwrap it. Two or three short paragraphs are plenty.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"contrast-2"} -->
			<p class="has-contrast-2-color has-text-color"><?php esc_html_e( 'Mention the details that make your work yours — the materials you choose, the town you work in, the small rituals of your studio day.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"500"},"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"fontFamily":"heading","fontSize":"x-large"} -->
			<p class="has-heading-font-family has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--40);font-style:italic;font-weight:500"><?php esc_html_e( '— Your name, founder', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( petal_and_form_page_link( 'about' ) ); ?>"><?php esc_html_e( 'Read our story', 'petal-and-form' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
