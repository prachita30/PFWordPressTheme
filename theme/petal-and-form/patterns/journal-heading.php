<?php
/**
 * Title: Journal heading
 * Slug: petal-and-form/journal-heading
 * Categories: text
 * Description: Heading and intro for the blog index.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"40rem","justifyContent":"left"}} -->
<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
	<p class="is-style-pf-eyebrow"><?php esc_html_e( 'The journal', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"level":1,"className":"is-style-pf-italic-accent","fontSize":"xx-large"} -->
	<h1 class="wp-block-heading is-style-pf-italic-accent has-xx-large-font-size"><?php echo wp_kses( __( 'Notes from the <em>studio</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"textColor":"contrast-2"} -->
	<p class="has-contrast-2-color has-text-color"><?php esc_html_e( 'Process, care guides, gift ideas and the small stories behind each collection.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
