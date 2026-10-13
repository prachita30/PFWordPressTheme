<?php
/**
 * Title: About page
 * Slug: petal-and-form/page-about
 * Categories: petal-and-form-pages, about
 * Keywords: about, story, founder, studio
 * Description: Full "Our story" page: intro, maker story, process, materials and values. Use with the "Landing page" template.
 * Post Types: page
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"46rem"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:paragraph {"align":"center","className":"is-style-pf-eyebrow"} -->
	<p class="has-text-align-center is-style-pf-eyebrow"><?php esc_html_e( 'Our story', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-pf-italic-accent","fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-text-align-center is-style-pf-italic-accent has-xxx-large-font-size"><?php echo wp_kses( __( 'A small studio with a <em>slow</em> heart', 'petal-and-form' ), array( 'em' => array() ) ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","textColor":"contrast-2","fontSize":"medium"} -->
	<p class="has-text-align-center has-contrast-2-color has-text-color has-medium-font-size"><?php esc_html_e( 'Write one or two sentences that sum up what you make and why. This is the first thing visitors read on this page.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"petal-and-form/story-maker"} /-->
<!-- wp:pattern {"slug":"petal-and-form/story-behind-scenes"} /-->
<!-- wp:pattern {"slug":"petal-and-form/story-materials"} /-->
<!-- wp:pattern {"slug":"petal-and-form/story-values"} /-->
