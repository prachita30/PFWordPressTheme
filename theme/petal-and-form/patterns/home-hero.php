<?php
/**
 * Title: Editorial hero
 * Slug: petal-and-form/home-hero
 * Categories: petal-and-form-home, banner, featured
 * Keywords: hero, banner, intro, headline
 * Description: Large serif headline with an italic accent, two calls to action and an arched still-life image.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"full","className":"pf-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull pf-hero has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"pf-stack-mobile-reverse","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|70"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center pf-stack-mobile-reverse">
		<!-- wp:column {"verticalAlignment":"center","width":"52%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52%">
			<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
			<p class="is-style-pf-eyebrow"><?php esc_html_e( 'New season · Small-batch studio goods', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"is-style-pf-italic-accent","style":{"typography":{"lineHeight":"1.02","letterSpacing":"-0.02em"}},"fontSize":"xxx-large"} -->
			<h1 class="wp-block-heading is-style-pf-italic-accent has-xxx-large-font-size" style="letter-spacing:-0.02em;line-height:1.02"><?php echo wp_kses( __( 'Objects made slowly, for homes that feel like <em>you</em>.', 'petal-and-form' ), array( 'em' => array() ) ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"medium","style":{"typography":{"lineHeight":"1.7"}}} -->
			<p class="has-contrast-2-color has-text-color has-medium-font-size" style="line-height:1.7"><?php esc_html_e( 'Hand-thrown ceramics, poured candles, paper goods and little gifts — each one made in a small studio and wrapped with care.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( petal_and_form_shop_link() ); ?>"><?php esc_html_e( 'Shop the collection', 'petal-and-form' ); ?></a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( petal_and_form_page_link( 'gift-finder' ) ); ?>"><?php esc_html_e( 'Find a gift', 'petal-and-form' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"48%","className":"pf-blob"} -->
		<div class="wp-block-column is-vertically-aligned-center pf-blob" style="flex-basis:48%">
			<!-- wp:image {"aspectRatio":"6/7","scale":"cover","className":"is-style-pf-arch"} -->
			<figure class="wp-block-image is-style-pf-arch"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-still-life.svg' ) ); ?>" alt="<?php esc_attr_e( 'A speckled stoneware vase with a leafy branch, a small bowl and a lit candle in front of a pink arch.', 'petal-and-form' ); ?>" style="aspect-ratio:6/7;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
