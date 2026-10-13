<?php
/**
 * Title: Bestsellers
 * Slug: petal-and-form/home-bestsellers
 * Categories: petal-and-form-home, petal-and-form-shop
 * Keywords: products, bestsellers, popular, woocommerce
 * Description: Your four best-selling products (by WooCommerce sales count). Renders nothing when WooCommerce is inactive.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

if ( ! petal_and_form_has_woocommerce() ) {
	return;
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:heading {"className":"is-style-pf-italic-accent"} -->
		<h2 class="wp-block-heading is-style-pf-italic-accent"><?php echo wp_kses( __( 'Most <em>loved</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><a href="<?php echo esc_url( petal_and_form_shop_link() ); ?>"><?php esc_html_e( 'Shop all →', 'petal-and-form' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:woocommerce/product-collection {"queryId":12,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"desc","orderBy":"popularity","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[]},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/best-sellers","hideControls":["inherit","order"],"queryContextIncludes":["collection"],"align":"wide"} -->
	<div class="wp-block-woocommerce-product-collection alignwide">
		<!-- wp:woocommerce/product-template -->
			<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
				<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"left"} /-->
			<!-- /wp:woocommerce/product-image -->
			<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"large","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
			<!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
		<!-- /wp:woocommerce/product-template -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->
