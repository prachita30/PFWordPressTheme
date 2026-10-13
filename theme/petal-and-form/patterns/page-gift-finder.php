<?php
/**
 * Title: Gift finder page
 * Slug: petal-and-form/page-gift-finder
 * Categories: petal-and-form-pages, petal-and-form-shop
 * Keywords: gift, finder, guide, landing page, recipient, occasion, budget
 * Description: A complete gift-discovery landing page: by recipient, by occasion, by budget, personalised gifts, bestsellers, gift wrapping and a custom-order banner. Use with the "Landing page" template.
 * Post Types: page
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_recipients = array(
	array( 'gifts', __( 'For the host', 'petal-and-form' ), 'gift-box.svg', __( 'A wrapped gift box with a yellow ribbon.', 'petal-and-form' ) ),
	array( 'ceramics', __( 'For a new home', 'petal-and-form' ), 'ceramic-vase.svg', __( 'A speckled stoneware vase with a branch.', 'petal-and-form' ) ),
	array( 'stationery', __( 'For the creative', 'petal-and-form' ), 'stationery.svg', __( 'A linen sketchbook and pencil.', 'petal-and-form' ) ),
	array( 'jewelry', __( 'For yourself', 'petal-and-form' ), 'jewelry.svg', __( 'Pearl drop earrings in a small dish.', 'petal-and-form' ) ),
);
$petal_and_form_occasions  = array(
	__( 'Birthday', 'petal-and-form' ),
	__( 'Wedding', 'petal-and-form' ),
	__( 'Housewarming', 'petal-and-form' ),
	__( 'Thank you', 'petal-and-form' ),
	__( 'New baby', 'petal-and-form' ),
	__( 'Just because', 'petal-and-form' ),
);
$petal_and_form_search     = static function ( $term ) {
	$args = array( 's' => $term );
	if ( petal_and_form_has_woocommerce() ) {
		$args['post_type'] = 'product';
	}
	return add_query_arg( $args, home_url( '/' ) );
};
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"gradient":"blush-wash","layout":{"type":"constrained","contentSize":"42rem"}} -->
<div class="wp-block-group alignfull has-blush-wash-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"align":"center","className":"is-style-pf-eyebrow"} -->
	<p class="has-text-align-center is-style-pf-eyebrow"><?php esc_html_e( 'Gift finder', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-pf-italic-accent","fontSize":"xxx-large"} -->
	<h1 class="wp-block-heading has-text-align-center is-style-pf-italic-accent has-xxx-large-font-size"><?php echo wp_kses( __( 'The <em>perfect</em> little something', 'petal-and-form' ), array( 'em' => array() ) ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","textColor":"contrast-2"} -->
	<p class="has-text-align-center has-contrast-2-color has-text-color"><?php esc_html_e( 'Start with who it is for, the occasion or your budget. Every gift can be wrapped with a handwritten note.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#by-recipient"><?php esc_html_e( 'By recipient', 'petal-and-form' ); ?></a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#by-occasion"><?php esc_html_e( 'By occasion', 'petal-and-form' ); ?></a></div>
		<!-- /wp:button -->
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#by-budget"><?php esc_html_e( 'By budget', 'petal-and-form' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent","anchor":"by-recipient","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent" id="by-recipient" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo wp_kses( __( 'Gifts by <em>recipient</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"8.5rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $petal_and_form_recipients as $petal_and_form_r ) : ?>
		<!-- wp:group {"className":"pf-tile pf-hover-lift","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group pf-tile pf-hover-lift">
			<!-- wp:image {"aspectRatio":"1","scale":"cover"} -->
			<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $petal_and_form_r[2] ) ); ?>" alt="<?php echo esc_attr( $petal_and_form_r[3] ); ?>" style="aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"textAlign":"center","level":3,"className":"pf-tile__title","fontSize":"large"} -->
			<h3 class="wp-block-heading has-text-align-center pf-tile__title has-large-font-size"><a href="<?php echo esc_url( petal_and_form_shop_link( $petal_and_form_r[0] ) ); ?>"><?php echo esc_html( $petal_and_form_r[1] ); ?></a></h3>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base-2","layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","className":"is-style-pf-italic-accent","anchor":"by-occasion"} -->
	<h2 class="wp-block-heading has-text-align-center is-style-pf-italic-accent" id="by-occasion"><?php echo wp_kses( __( 'Gifts by <em>occasion</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","textColor":"contrast-2","fontSize":"small"} -->
	<p class="has-text-align-center has-contrast-2-color has-text-color has-small-font-size"><?php esc_html_e( 'Each button runs a shop search. Add the occasion words to your product descriptions or tags so they show up here.', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-buttons">
		<?php foreach ( $petal_and_form_occasions as $petal_and_form_o ) : ?>
		<!-- wp:button {"className":"is-style-outline","fontSize":"small"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $petal_and_form_search( $petal_and_form_o ) ); ?>"><?php echo esc_html( $petal_and_form_o ); ?></a></div>
		<!-- /wp:button -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"petal-and-form/gift-guide"} /-->
<!-- wp:pattern {"slug":"petal-and-form/story-custom-orders"} /-->
<!-- wp:pattern {"slug":"petal-and-form/home-bestsellers"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tint-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tint-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"aspectRatio":"4/3","scale":"cover"} -->
			<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/gift-wrap.svg' ) ); ?>" alt="<?php esc_attr_e( 'Gift parcels wrapped in brown paper and ribbon with greenery.', 'petal-and-form' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
			<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Gift wrapping', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"is-style-pf-italic-accent"} -->
			<h2 class="wp-block-heading is-style-pf-italic-accent"><?php echo wp_kses( __( 'Wrapped, <em>ribboned</em>, ready to give', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Explain your wrapping options here: paper, ribbon, a handwritten note, whether prices are hidden on the packing slip, and how to request it at checkout.', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"petal-and-form/custom-order-banner"} /-->
