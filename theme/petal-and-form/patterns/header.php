<?php
/**
 * Title: Header
 * Slug: petal-and-form/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Logo or site title, navigation, search, account and cart.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"className":"pf-header","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"constrained","contentSize":"80rem"}} -->
<div class="wp-block-group pf-header" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":44,"shouldSyncIcon":false} /-->
			<!-- wp:site-title {"level":0} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"pf-header__actions","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
		<div class="wp-block-group pf-header__actions">
			<!-- wp:navigation {"className":"is-style-pf-underline","overlayBackgroundColor":"base","overlayTextColor":"contrast","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} /-->

			<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'petal-and-form' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search the shop…', 'search placeholder', 'petal-and-form' ); ?>","buttonText":"<?php echo esc_attr_x( 'Search', 'search button text', 'petal-and-form' ); ?>","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"className":"pf-header__search"} /-->

			<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon"} /-->

			<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
