<?php
/**
 * Title: Comments
 * Slug: petal-and-form/comments
 * Categories: text
 * Description: Comment list and form used by blog posts.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:comments {"className":"pf-comments","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-comments pf-comments" style="margin-top:var(--wp--preset--spacing--60)">
	<!-- wp:comments-title {"level":2,"fontSize":"x-large"} /-->
	<!-- wp:comment-template -->
		<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"},"padding":{"bottom":"var:preset|spacing|40"}},"border":{"bottom":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border);border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group">
				<!-- wp:avatar {"size":40,"style":{"border":{"radius":"999px"}}} /-->
				<!-- wp:comment-author-name {"fontSize":"small"} /-->
				<!-- wp:comment-date {"fontSize":"x-small"} /-->
			</div>
			<!-- /wp:group -->
			<!-- wp:comment-content /-->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex"}} -->
			<div class="wp-block-group">
				<!-- wp:comment-reply-link {"fontSize":"x-small"} /-->
				<!-- wp:comment-edit-link {"fontSize":"x-small"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	<!-- /wp:comment-template -->
	<!-- wp:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:comments-pagination-previous /-->
		<!-- wp:comments-pagination-next /-->
	<!-- /wp:comments-pagination -->
	<!-- wp:post-comments-form /-->
</div>
<!-- /wp:comments -->
