<?php
/**
 * Title: Related products
 * Slug: petal-and-form/related-products
 * Categories: petal-and-form-shop
 * Description: "You may also love" — four related products by category and tag.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:woocommerce/product-collection {"align":"wide","queryId":0,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"section","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/related","hideControls":["inherit"],"queryContextIncludes":["collection"],"className":"pf-related","style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
<section class="wp-block-woocommerce-product-collection alignwide pf-related" style="margin-top:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-x-large-font-size"><?php echo wp_kses( __( 'You may also <em>love</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:woocommerce/product-template -->
		<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
			<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"left"} /-->
		<!-- /wp:woocommerce/product-image -->
		<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"large","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
		<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
	<!-- /wp:woocommerce/product-template -->
</section>
<!-- /wp:woocommerce/product-collection -->
