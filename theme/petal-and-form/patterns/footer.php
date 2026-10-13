<?php
/**
 * Title: Footer
 * Slug: petal-and-form/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Brand note, three link columns, policy links and credit line.
 * Inserter: no
 *
 * @package Petal_And_Form
 */

?>
<!-- wp:group {"className":"pf-footer","backgroundColor":"base-2","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|50"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"80rem"}} -->
<div class="wp-block-group pf-footer has-base-2-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60","top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"38%"} -->
		<div class="wp-block-column" style="flex-basis:38%">
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"2rem"}}} /-->
			<!-- wp:paragraph {"textColor":"contrast-2","style":{"typography":{"lineHeight":"1.6"}},"fontSize":"small"} -->
			<p class="has-contrast-2-color has-text-color has-small-font-size" style="line-height:1.6"><?php esc_html_e( 'Small-batch objects for slow, beautiful days. Replace this note with a sentence about your studio.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"className":"pf-footer__heading","fontSize":"x-small","style":{"typography":{"fontFamily":"var:preset|font-family|body","fontWeight":"600","letterSpacing":"0.12em","textTransform":"uppercase"}}} -->
			<h2 class="wp-block-heading pf-footer__heading has-x-small-font-size" style="font-family:var(--wp--preset--font-family--body);font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Shop', 'petal-and-form' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","ariaLabel":"<?php echo esc_attr__( 'Shop links', 'petal-and-form' ); ?>"} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'All products', 'petal-and-form' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'New arrivals', 'petal-and-form' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Gift finder', 'petal-and-form' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Custom orders', 'petal-and-form' ); ?>","url":"#"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"className":"pf-footer__heading","fontSize":"x-small","style":{"typography":{"fontFamily":"var:preset|font-family|body","fontWeight":"600","letterSpacing":"0.12em","textTransform":"uppercase"}}} -->
			<h2 class="wp-block-heading pf-footer__heading has-x-small-font-size" style="font-family:var(--wp--preset--font-family--body);font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Studio', 'petal-and-form' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","ariaLabel":"<?php echo esc_attr__( 'Studio links', 'petal-and-form' ); ?>"} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Our story', 'petal-and-form' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Journal', 'petal-and-form' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Contact', 'petal-and-form' ); ?>","url":"#"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"className":"pf-footer__heading","fontSize":"x-small","style":{"typography":{"fontFamily":"var:preset|font-family|body","fontWeight":"600","letterSpacing":"0.12em","textTransform":"uppercase"}}} -->
			<h2 class="wp-block-heading pf-footer__heading has-x-small-font-size" style="font-family:var(--wp--preset--font-family--body);font-weight:600;letter-spacing:0.12em;text-transform:uppercase"><?php esc_html_e( 'Help', 'petal-and-form' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","ariaLabel":"<?php echo esc_attr__( 'Help links', 'petal-and-form' ); ?>"} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Shipping & delivery', 'petal-and-form' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Returns & refunds', 'petal-and-form' ); ?>","url":"#"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'FAQ', 'petal-and-form' ); ?>","url":"#"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"}}}} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--40)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:navigation {"overlayMenu":"never","fontSize":"x-small","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"ariaLabel":"<?php echo esc_attr__( 'Policies', 'petal-and-form' ); ?>"} -->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Privacy policy', 'petal-and-form' ); ?>","url":"#"} /-->
			<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Terms & conditions', 'petal-and-form' ); ?>","url":"#"} /-->
		<!-- /wp:navigation -->

		<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"x-small"} -->
		<p class="has-contrast-2-color has-text-color has-x-small-font-size"><?php /* translators: %s: WordPress link. */ printf( esc_html__( 'Designed with Petal & Form · Powered by %s', 'petal-and-form' ), '<a href="' . esc_url( __( 'https://wordpress.org', 'petal-and-form' ) ) . '" rel="nofollow">WordPress</a>' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
