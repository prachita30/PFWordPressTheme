<?php
/**
 * Title: Header with announcement bar
 * Slug: petal-and-form/header-announcement
 * Categories: header
 * Block Types: core/template-part/header
 * Keywords: announcement, banner, notice, header
 * Description: A slim pastel announcement line above the standard header. Choose it via Site Editor → Patterns → Header → Replace.
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"align":"full","className":"pf-announcement","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"backgroundColor":"tint-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull pf-announcement has-tint-1-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
	<!-- wp:paragraph {"align":"center","fontSize":"x-small","style":{"typography":{"letterSpacing":"0.04em"}}} -->
	<p class="has-text-align-center has-x-small-font-size" style="letter-spacing:0.04em"><?php esc_html_e( 'Write a short announcement here — a new collection, studio closing dates or a gifting deadline.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"petal-and-form/header"} /-->
