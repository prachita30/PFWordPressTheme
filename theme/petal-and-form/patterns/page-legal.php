<?php
/**
 * Title: Legal page (terms or privacy) placeholder
 * Slug: petal-and-form/page-legal
 * Categories: petal-and-form-pages
 * Keywords: terms, conditions, privacy, legal, policy
 * Description: A readable layout for terms or privacy text. It contains no legal wording — use WordPress's Privacy Policy guide (Settings → Privacy) and professional advice for your country.
 * Post Types: page
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"className":"pf-demo-label"} -->
	<p class="pf-demo-label"><?php esc_html_e( 'Placeholder — not legal advice', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"small"} -->
	<p class="has-contrast-2-color has-text-color has-small-font-size"><?php esc_html_e( 'Last updated: add a date', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Paste your policy here. WordPress includes a privacy policy guide under Settings → Privacy, and WooCommerce adds suggested text about the data your store collects. Requirements differ between countries, so have your final wording checked by someone qualified.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Section heading', 'petal-and-form' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Use short headings and plain language so customers can find what they need.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
