<?php
/**
 * Title: Product assurance (shipping, returns, care)
 * Slug: petal-and-form/product-assurance
 * Categories: petal-and-form-shop
 * Description: Collapsible shipping, returns and care notes shown under the add-to-cart button. Edit the text once in the single-product template.
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"className":"pf-assurance","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"0"},"border":{"top":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group pf-assurance" style="border-top-color:var(--wp--preset--color--border);border-top-width:1px;margin-top:var(--wp--preset--spacing--40)">
	<!-- wp:details {"fontSize":"small"} -->
	<details class="wp-block-details has-small-font-size"><summary><?php esc_html_e( 'Shipping & delivery', 'petal-and-form' ); ?></summary>
		<!-- wp:paragraph {"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color"><?php esc_html_e( 'Describe how and when you ship, where you deliver, and how long it usually takes. Rates are calculated at checkout.', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->

	<!-- wp:details {"fontSize":"small"} -->
	<details class="wp-block-details has-small-font-size"><summary><?php esc_html_e( 'Returns & exchanges', 'petal-and-form' ); ?></summary>
		<!-- wp:paragraph {"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color"><?php esc_html_e( 'Summarise your returns policy in one or two sentences and link to the full policy page.', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->

	<!-- wp:details {"fontSize":"small"} -->
	<details class="wp-block-details has-small-font-size"><summary><?php esc_html_e( 'Made by hand', 'petal-and-form' ); ?></summary>
		<!-- wp:paragraph {"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color"><?php esc_html_e( 'Each piece is made individually, so small variations in colour and shape are part of its character.', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->
</div>
<!-- /wp:group -->
