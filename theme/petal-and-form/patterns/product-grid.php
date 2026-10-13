<?php
/**
 * Title: Product grid (catalog)
 * Slug: petal-and-form/product-grid
 * Categories: petal-and-form-shop
 * Description: Uniform four-column product grid that inherits the current catalog query. Used by the shop, category and product-search templates.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"taxQuery":{},"isProductCollectionBlock":true,"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true},"tagName":"div","dimensions":{"widthType":"fill","fixedWidth":""},"displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"convertedFromProducts":false,"queryContextIncludes":["collection"],"align":"wide","className":"pf-product-grid"} -->
<div class="wp-block-woocommerce-product-collection alignwide pf-product-grid">
	<!-- wp:woocommerce/product-template -->
		<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
			<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"left"} /-->
		<!-- /wp:woocommerce/product-image -->
		<!-- wp:post-title {"level":2,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"fontSize":"large","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
		<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"fontSize":"small","style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} /-->
		<!-- wp:woocommerce/product-stock-indicator {"isDescendentOfQueryLoop":true,"fontSize":"x-small"} /-->
		<!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"fontSize":"small","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} /-->
	<!-- /wp:woocommerce/product-template -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:woocommerce/product-collection-no-results -->
		<!-- wp:group {"className":"pf-empty-state","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group pf-empty-state" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
			<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"x-large"} -->
			<h2 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php esc_html_e( 'Nothing matches just yet', 'petal-and-form' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} -->
			<p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'Try a different word, or browse everything in the shop.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:woocommerce/product-search /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:woocommerce/product-collection-no-results -->
</div>
<!-- /wp:woocommerce/product-collection -->
