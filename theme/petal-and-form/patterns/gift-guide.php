<?php
/**
 * Title: Gifts by budget
 * Slug: petal-and-form/gift-guide
 * Categories: petal-and-form-shop
 * Keywords: gift guide, budget, price, gifts
 * Description: Three budget tiers that link to the shop filtered by maximum price (WooCommerce's built-in max_price parameter). Edit the amounts in each link to suit your currency and prices.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_tiers = array(
	array( 'tint-1', __( 'Little gifts', 'petal-and-form' ), __( 'Stocking fillers, thank-yous and tuck-into-a-card treats.', 'petal-and-form' ), 30 ),
	array( 'tint-2', __( 'Something special', 'petal-and-form' ), __( 'Birthdays, housewarmings and “just because”.', 'petal-and-form' ), 60 ),
	array( 'tint-3', __( 'The big gesture', 'petal-and-form' ), __( 'Weddings, milestones and gift boxes for the people who matter most.', 'petal-and-form' ), 0 ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent","anchor":"by-budget","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent" id="by-budget" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo wp_kses( __( 'Gifts by <em>budget</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"15rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $petal_and_form_tiers as $petal_and_form_tier ) : ?>
			<?php
			$petal_and_form_url = petal_and_form_shop_link();
			if ( $petal_and_form_tier[3] ) {
				$petal_and_form_url = add_query_arg( 'max_price', $petal_and_form_tier[3], $petal_and_form_url );
			}
			?>
		<!-- wp:group {"className":"pf-rounded","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"}},"backgroundColor":"<?php echo esc_attr( $petal_and_form_tier[0] ); ?>","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group pf-rounded has-<?php echo esc_attr( $petal_and_form_tier[0] ); ?>-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
			<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"x-large"} -->
			<h3 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php echo esc_html( $petal_and_form_tier[1] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><?php echo esc_html( $petal_and_form_tier[2] ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $petal_and_form_url ); ?>"><?php esc_html_e( 'Browse gifts', 'petal-and-form' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
