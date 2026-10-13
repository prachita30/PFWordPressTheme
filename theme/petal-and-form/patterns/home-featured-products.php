<?php
/**
 * Title: Featured collection
 * Slug: petal-and-form/home-featured-products
 * Categories: petal-and-form-home, petal-and-form-shop
 * Keywords: products, featured, collection, woocommerce
 * Description: Four featured products (mark products as "featured" in WooCommerce). Renders nothing when WooCommerce is inactive.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

if ( ! petal_and_form_has_woocommerce() ) {
	return;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:paragraph {"align":"center","className":"is-style-pf-eyebrow"} -->
		<p class="has-text-align-center is-style-pf-eyebrow"><?php esc_html_e( 'The studio edit', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent"} -->
		<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent"><?php echo wp_kses( __( 'Pieces we are <em>loving</em> right now', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:woocommerce/product-collection {"queryId":11,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":true,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[]},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/featured","hideControls":["inherit","featured"],"queryContextIncludes":["collection"],"align":"wide"} -->
	<div class="wp-block-woocommerce-product-collection alignwide">
		<!-- wp:woocommerce/product-template -->
			<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
				<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"left"} /-->
			<!-- /wp:woocommerce/product-image -->
			<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"large","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
		<!-- /wp:woocommerce/product-template -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->
