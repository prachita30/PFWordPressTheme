<?php
/**
 * Title: Shop by category
 * Slug: petal-and-form/home-categories
 * Categories: petal-and-form-home, petal-and-form-shop
 * Keywords: categories, collections, tiles, shop
 * Description: Four tall image tiles linking to product categories. Links fall back to the shop if a category does not exist.
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_tiles = array(
	array(
		'slug'  => 'ceramics',
		'label' => __( 'Ceramics', 'petal-and-form' ),
		'note'  => __( 'Vases, mugs & bowls', 'petal-and-form' ),
		'image' => 'ceramic-vase.svg',
		'alt'   => __( 'A cream speckled stoneware vase on a sage background.', 'petal-and-form' ),
	),
	array(
		'slug'  => 'candles',
		'label' => __( 'Candles', 'petal-and-form' ),
		'note'  => __( 'Hand-poured in small batches', 'petal-and-form' ),
		'image' => 'candle.svg',
		'alt'   => __( 'A hand-poured candle in a frosted jar on powder pink.', 'petal-and-form' ),
	),
	array(
		'slug'  => 'stationery',
		'label' => __( 'Stationery', 'petal-and-form' ),
		'note'  => __( 'Sketchbooks, cards & paper', 'petal-and-form' ),
		'image' => 'stationery.svg',
		'alt'   => __( 'A linen-bound sketchbook and a pencil on butter yellow.', 'petal-and-form' ),
	),
	array(
		'slug'  => 'jewelry',
		'label' => __( 'Jewelry', 'petal-and-form' ),
		'note'  => __( 'Everyday pieces, gently made', 'petal-and-form' ),
		'image' => 'jewelry.svg',
		'alt'   => __( 'Gold hoop earrings with pearl drops in a small dish on lavender.', 'petal-and-form' ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-2-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"is-style-pf-eyebrow"} -->
			<p class="is-style-pf-eyebrow"><?php esc_html_e( 'Browse the studio', 'petal-and-form' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"className":"is-style-pf-italic-accent"} -->
			<h2 class="wp-block-heading is-style-pf-italic-accent"><?php echo wp_kses( __( 'Shop by <em>category</em>', 'petal-and-form' ), array( 'em' => array() ) ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->
		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><a href="<?php echo esc_url( petal_and_form_shop_link() ); ?>"><?php esc_html_e( 'View everything →', 'petal-and-form' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"8.5rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $petal_and_form_tiles as $petal_and_form_tile ) : ?>
		<!-- wp:group {"className":"pf-tile pf-hover-lift","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group pf-tile pf-hover-lift">
			<!-- wp:image {"aspectRatio":"4/5","scale":"cover"} -->
			<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $petal_and_form_tile['image'] ) ); ?>" alt="<?php echo esc_attr( $petal_and_form_tile['alt'] ); ?>" style="aspect-ratio:4/5;object-fit:cover"/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3,"className":"pf-tile__title","fontSize":"large"} -->
			<h3 class="wp-block-heading pf-tile__title has-large-font-size"><a href="<?php echo esc_url( petal_and_form_shop_link( $petal_and_form_tile['slug'] ) ); ?>"><?php echo esc_html( $petal_and_form_tile['label'] ); ?></a></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"contrast-2","fontSize":"small"} -->
			<p class="has-contrast-2-color has-text-color has-small-font-size"><?php echo esc_html( $petal_and_form_tile['note'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
