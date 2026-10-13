<?php
/**
 * Title: Journal post grid
 * Slug: petal-and-form/posts-grid
 * Categories: query, posts
 * Description: Three-column editorial grid of posts with featured images, used by blog and archive templates.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":true},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"className":"pf-post-grid","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"18rem"}} -->
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/5","sizeSlug":"large","className":"pf-hover-lift"} /-->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10","margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
			<!-- wp:post-terms {"term":"category","className":"is-style-pf-eyebrow"} /-->
			<!-- wp:post-title {"level":2,"isLink":true,"fontSize":"large"} /-->
			<!-- wp:post-date {"fontSize":"x-small"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} -->
		<p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'Nothing here yet — new stories are on their way.', 'petal-and-form' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
