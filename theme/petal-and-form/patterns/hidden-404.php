<?php
/**
 * Title: 404 — page not found
 * Slug: petal-and-form/hidden-404
 * Categories: text
 * Description: Friendly not-found message with search and links back to the shop and home.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"layout":{"type":"constrained","contentSize":"36rem"}} -->
<div class="wp-block-group">
	<!-- wp:image {"aspectRatio":"1","scale":"cover","align":"center","width":"220px","className":"is-style-pf-arch"} -->
	<figure class="wp-block-image aligncenter is-resized is-style-pf-arch"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/bud-vase.svg' ) ); ?>" alt="" style="aspect-ratio:1;object-fit:cover;width:220px;height:auto"/></figure>
	<!-- /wp:image -->
	<!-- wp:paragraph {"align":"center","className":"is-style-pf-eyebrow"} -->
	<p class="has-text-align-center is-style-pf-eyebrow"><?php esc_html_e( 'Error 404', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-pf-italic-accent","fontSize":"xx-large"} -->
	<h1 class="wp-block-heading has-text-align-center is-style-pf-italic-accent has-xx-large-font-size"><?php echo wp_kses( __( 'This page has <em>wandered</em> off', 'petal-and-form' ), array( 'em' => array() ) ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} -->
	<p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'The link may be old or the item may have sold out. Try a search, or head back to the shop.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:pattern {"slug":"petal-and-form/search-form"} /-->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( petal_and_form_shop_link() ); ?>"><?php esc_html_e( 'Visit the shop', 'petal-and-form' ); ?></a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'petal-and-form' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
