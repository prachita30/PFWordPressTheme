<?php
/**
 * Title: Shipping & delivery page
 * Slug: petal-and-form/page-shipping
 * Categories: petal-and-form-pages
 * Keywords: shipping, delivery, postage, policy
 * Description: Structure for a shipping policy with placeholder guidance. Not legal advice — rates and rules are set in WooCommerce and depend on your country.
 * Post Types: page
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_sections = array(
	array( __( 'Processing time', 'petal-and-form' ), __( 'How many working days you need to make or pack an order before it ships.', 'petal-and-form' ) ),
	array( __( 'Where we ship', 'petal-and-form' ), __( 'The countries or regions you deliver to. Shipping zones and rates are configured in WooCommerce → Settings → Shipping.', 'petal-and-form' ) ),
	array( __( 'Delivery times', 'petal-and-form' ), __( 'Typical carrier delivery estimates for each region, and that they are estimates rather than guarantees.', 'petal-and-form' ) ),
	array( __( 'Duties and taxes', 'petal-and-form' ), __( 'Whether international customers may pay import duties or taxes on arrival.', 'petal-and-form' ) ),
	array( __( 'Tracking and lost parcels', 'petal-and-form' ), __( 'How customers receive tracking details and what to do if a parcel does not arrive.', 'petal-and-form' ) ),
);
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"className":"pf-demo-label"} -->
	<p class="pf-demo-label"><?php esc_html_e( 'Template — replace with your own policy', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<?php foreach ( $petal_and_form_sections as $petal_and_form_s ) : ?>
	<!-- wp:heading {"fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-x-large-font-size"><?php echo esc_html( $petal_and_form_s[0] ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p><?php echo esc_html( $petal_and_form_s[1] ); ?></p>
	<!-- /wp:paragraph -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
