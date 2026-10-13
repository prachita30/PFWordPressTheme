<?php
/**
 * Petal & Form demo store seed.
 *
 * Creates sample categories, products (simple, variable, on sale, out of stock), clearly-labelled demo
 * reviews, pages, journal posts and a navigation menu so the showcase store can be reproduced.
 *
 * FOR FRESH, LOCAL OR STAGING SITES ONLY. It refuses to run when products already exist, unless the
 * constant PETAL_AND_FORM_DEMO_FORCE is defined as true. It never deletes or edits existing content.
 *
 * Run with one of:
 *   wp eval-file demo/seed.php                     (WP-CLI, from the WordPress root)
 *   WordPress Playground: tests/blueprint.json runs it automatically.
 *
 * Requires WooCommerce to be active.
 *
 * @package Petal_And_Form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Load WordPress first (wp eval-file demo/seed.php).\n" );
}

if ( ! class_exists( 'WooCommerce' ) ) {
	exit( "WooCommerce must be active to seed the demo store.\n" );
}

$petal_and_form_existing = wc_get_products( array( 'limit' => 1, 'return' => 'ids', 'status' => 'any' ) );
if ( $petal_and_form_existing && ! ( defined( 'PETAL_AND_FORM_DEMO_FORCE' ) && PETAL_AND_FORM_DEMO_FORCE ) ) {
	exit( "Products already exist on this site. The demo seed only runs on a store with no products.\n" );
}

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

$petal_and_form_images_dir = __DIR__ . '/images/';

/**
 * Copy a demo image into the uploads folder and register it as an attachment.
 *
 * @param string $file Filename inside demo/images.
 * @param string $alt  Alternative text.
 * @return int Attachment ID or 0.
 */
function petal_and_form_demo_image( $file, $alt ) {
	global $petal_and_form_images_dir;
	static $cache = array();

	if ( isset( $cache[ $file ] ) ) {
		return $cache[ $file ];
	}

	$path = $petal_and_form_images_dir . $file;
	if ( ! file_exists( $path ) ) {
		return 0;
	}

	$upload = wp_upload_bits( 'petal-demo-' . $file, null, file_get_contents( $path ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	if ( ! empty( $upload['error'] ) ) {
		return 0;
	}

	$id = wp_insert_attachment(
		array(
			'post_mime_type' => 'image/jpeg',
			'post_title'     => $alt,
			'post_status'    => 'inherit',
		),
		$upload['file']
	);
	wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $upload['file'] ) );
	update_post_meta( $id, '_wp_attachment_image_alt', $alt );
	update_post_meta( $id, '_petal_and_form_demo', 1 );

	$cache[ $file ] = $id;
	return $id;
}

// 1. Categories ------------------------------------------------------------------------------
$petal_and_form_categories = array(
	'ceramics'   => array( 'Ceramics', 'Hand-thrown stoneware for everyday rituals.' ),
	'candles'    => array( 'Candles', 'Hand-poured in small batches with soft, natural scents.' ),
	'stationery' => array( 'Stationery', 'Paper goods, sketchbooks and prints.' ),
	'jewelry'    => array( 'Jewelry', 'Everyday pieces, gently made.' ),
	'gifts'      => array( 'Gifts', 'Ready-wrapped sets and thoughtful little things.' ),
);
$petal_and_form_cat_ids    = array();
foreach ( $petal_and_form_categories as $slug => $data ) {
	$term = term_exists( $slug, 'product_cat' );
	if ( ! $term ) {
		$term = wp_insert_term( $data[0], 'product_cat', array( 'slug' => $slug, 'description' => $data[1] ) );
	}
	$petal_and_form_cat_ids[ $slug ] = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
}

// 2. Simple products ---------------------------------------------------------------------------
$petal_and_form_products = array(
	array( 'speckled-stoneware-mug', 'Speckled Stoneware Mug', 'ceramics', '28', '', 'mug.jpg', true, 42, 'instock', 'A generous mug in sage glaze with iron speckles that show through the surface. Holds a big morning coffee.' ),
	array( 'cream-speckle-vase', 'Cream Speckle Vase', 'ceramics', '64', '', 'ceramic-vase.jpg', true, 18, 'instock', 'A softly rounded vase thrown in speckled cream clay, glazed inside so it holds water for fresh stems.' ),
	array( 'terracotta-bud-vase', 'Terracotta Bud Vase', 'ceramics', '22', '18', 'bud-vase.jpg', false, 25, 'instock', 'A small bud vase in warm terracotta for a single dried stem or a sprig from the garden.' ),
	array( 'linen-bound-sketchbook', 'Linen-bound Sketchbook', 'stationery', '24', '', 'stationery.jpg', false, 30, 'outofstock', 'A lay-flat sketchbook with a dusty rose linen cover, elastic closure and 120 pages of heavyweight paper.' ),
	array( 'pearl-drop-hoops', 'Pearl Drop Hoops', 'jewelry', '48', '', 'jewelry.jpg', true, 21, 'instock', 'Light gold-tone hoops with a freshwater pearl drop. Comfortable enough to wear every day.' ),
	array( 'blush-ring-dish', 'Blush Ring Dish', 'ceramics', '16', '', 'ring-dish.jpg', false, 12, 'instock', 'A shallow dish in blush glaze — a home for rings and earrings on a bedside table.' ),
	array( 'slow-morning-gift-box', 'The Slow Morning Gift Box', 'gifts', '85', '72', 'gift-box.jpg', true, 15, 'instock', 'Our mug, a small candle and a ring dish, wrapped and ready to give. Add a handwritten note at checkout.' ),
	array( 'abstract-print-trio', 'Abstract Print Trio', 'stationery', '40', '', 'art-prints.jpg', false, 9, 'instock', 'Three A4 giclée prints of soft arches and circles, printed on textured cotton paper. Frames not included.' ),
	array( 'wrapped-gift-set', 'Wrapped Gift Set', 'gifts', '55', '', 'gift-wrap.jpg', false, 7, 'instock', 'Two little parcels chosen by the studio, wrapped in brown paper and ribbon with a sprig of greenery.' ),
);

$petal_and_form_product_ids = array();
foreach ( $petal_and_form_products as $p ) {
	list( $slug, $name, $cat, $regular, $sale, $image, $featured, $sales, $stock, $desc ) = $p;

	$product = new WC_Product_Simple();
	$product->set_name( $name );
	$product->set_slug( $slug );
	$product->set_status( 'publish' );
	$product->set_regular_price( $regular );
	if ( $sale ) {
		$product->set_sale_price( $sale );
	}
	$product->set_short_description( $desc );
	$product->set_description( $desc . "\n\nDemo product created by the Petal & Form demo seed. Replace with your own product details." );
	$product->set_category_ids( array( $petal_and_form_cat_ids[ $cat ] ) );
	$product->set_featured( $featured );
	$product->set_stock_status( $stock );
	$product->set_sku( 'PF-' . strtoupper( substr( md5( $slug ), 0, 6 ) ) );
	$product->set_image_id( petal_and_form_demo_image( $image, $name ) );
	$id = $product->save();
	update_post_meta( $id, 'total_sales', $sales );
	update_post_meta( $id, '_petal_and_form_demo', 1 );
	$petal_and_form_product_ids[ $slug ] = $id;
}

// 3. Variable product ----------------------------------------------------------------------------
$petal_and_form_scent = new WC_Product_Attribute();
$petal_and_form_scent->set_name( 'Scent' );
$petal_and_form_scent->set_options( array( 'Fig & Cedar', 'Rose & Oat', 'Fresh Linen' ) );
$petal_and_form_scent->set_visible( true );
$petal_and_form_scent->set_variation( true );

$petal_and_form_size = new WC_Product_Attribute();
$petal_and_form_size->set_name( 'Size' );
$petal_and_form_size->set_options( array( 'Small', 'Large' ) );
$petal_and_form_size->set_visible( true );
$petal_and_form_size->set_variation( true );

$petal_and_form_candle = new WC_Product_Variable();
$petal_and_form_candle->set_name( 'Hand-poured Candle' );
$petal_and_form_candle->set_slug( 'hand-poured-candle' );
$petal_and_form_candle->set_status( 'publish' );
$petal_and_form_candle->set_short_description( 'Soy-blend wax in a frosted glass jar with a cotton wick. Choose a scent and a size.' );
$petal_and_form_candle->set_description( "Soy-blend wax in a frosted glass jar with a cotton wick.\n\nDemo product created by the Petal & Form demo seed." );
$petal_and_form_candle->set_category_ids( array( $petal_and_form_cat_ids['candles'] ) );
$petal_and_form_candle->set_attributes( array( $petal_and_form_scent, $petal_and_form_size ) );
$petal_and_form_candle->set_featured( true );
$petal_and_form_candle->set_image_id( petal_and_form_demo_image( 'candle.jpg', 'Hand-poured Candle' ) );
$petal_and_form_candle_id = $petal_and_form_candle->save();
update_post_meta( $petal_and_form_candle_id, 'total_sales', 38 );
update_post_meta( $petal_and_form_candle_id, '_petal_and_form_demo', 1 );

foreach ( array( 'Fig & Cedar', 'Rose & Oat', 'Fresh Linen' ) as $petal_and_form_s ) {
	foreach ( array( 'Small' => '22', 'Large' => '36' ) as $petal_and_form_z => $petal_and_form_price ) {
		$variation = new WC_Product_Variation();
		$variation->set_parent_id( $petal_and_form_candle_id );
		$variation->set_attributes( array( 'scent' => $petal_and_form_s, 'size' => $petal_and_form_z ) );
		$variation->set_regular_price( $petal_and_form_price );
		$variation->set_stock_status( 'Fresh Linen' === $petal_and_form_s && 'Large' === $petal_and_form_z ? 'outofstock' : 'instock' );
		$variation->save();
	}
}
WC_Product_Variable::sync( $petal_and_form_candle_id );
$petal_and_form_product_ids['hand-poured-candle'] = $petal_and_form_candle_id;

// 4. Demo reviews — clearly labelled, never presented as real customers -----------------------------------
foreach ( array(
	array( 'speckled-stoneware-mug', 5, '[Demo review] Example review text to show how ratings look. Replace with genuine customer reviews.' ),
	array( 'speckled-stoneware-mug', 4, '[Demo review] A second example review. Delete demo reviews before launching your store.' ),
	array( 'hand-poured-candle', 5, '[Demo review] Example review on a variable product.' ),
) as $petal_and_form_r ) {
	$comment_id = wp_insert_comment(
		array(
			'comment_post_ID'      => $petal_and_form_product_ids[ $petal_and_form_r[0] ],
			'comment_author'       => 'Demo reviewer',
			'comment_author_email' => 'demo@example.com',
			'comment_content'      => $petal_and_form_r[2],
			'comment_type'         => 'review',
			'comment_approved'     => 1,
		)
	);
	update_comment_meta( $comment_id, 'rating', $petal_and_form_r[1] );
	update_comment_meta( $comment_id, 'verified', 0 );
}
foreach ( $petal_and_form_product_ids as $petal_and_form_pid ) {
	WC_Comments::clear_transients( $petal_and_form_pid );
}

// 5. Pages ------------------------------------------------------------------------------------------
/**
 * Create a page if no page with that path exists.
 *
 * @param string $slug     Slug.
 * @param string $title    Title.
 * @param string $content  Block content.
 * @param string $template Optional page template slug.
 * @return int Page ID.
 */
function petal_and_form_demo_page( $slug, $title, $content, $template = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return $existing->ID;
	}
	$id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $content,
		)
	);
	if ( $template ) {
		update_post_meta( $id, '_wp_page_template', $template );
	}
	update_post_meta( $id, '_petal_and_form_demo', 1 );
	return $id;
}

$petal_and_form_pattern = static function ( $slug ) {
	return '<!-- wp:pattern {"slug":"petal-and-form/' . $slug . '"} /-->';
};

$petal_and_form_home_id    = petal_and_form_demo_page( 'home', 'Home', '' );
$petal_and_form_journal_id = petal_and_form_demo_page( 'journal', 'Journal', '' );
petal_and_form_demo_page( 'about', 'Our story', $petal_and_form_pattern( 'page-about' ), 'page-wide' );
petal_and_form_demo_page( 'gift-finder', 'Gift finder', $petal_and_form_pattern( 'page-gift-finder' ), 'page-wide' );
petal_and_form_demo_page( 'contact', 'Contact', $petal_and_form_pattern( 'page-contact' ) );
petal_and_form_demo_page( 'faq', 'Frequently asked questions', $petal_and_form_pattern( 'page-faq' ) );
petal_and_form_demo_page( 'shipping', 'Shipping & delivery', $petal_and_form_pattern( 'page-shipping' ) );
petal_and_form_demo_page( 'returns', 'Returns & refunds', $petal_and_form_pattern( 'page-returns' ) );
petal_and_form_demo_page( 'care', 'Care guide', $petal_and_form_pattern( 'story-care' ) . $petal_and_form_pattern( 'story-materials' ) );

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $petal_and_form_home_id );
update_option( 'page_for_posts', $petal_and_form_journal_id );

// 6. Journal posts ----------------------------------------------------------------------------------
$petal_and_form_journal_cat = wp_create_category( 'Studio notes' );
foreach ( array(
	array( 'How to care for handmade ceramics', 'ceramic-vase.jpg', 'Handmade stoneware is sturdy, but a little care keeps the glaze looking its best. Here is how we look after ours.' ),
	array( 'A gift guide for slow mornings', 'gift-box.jpg', 'Five small things that make the first hour of the day feel softer — and make lovely presents.' ),
	array( 'Inside the studio: pouring a candle batch', 'candle.jpg', 'From melting wax to trimming wicks, a look at how one small batch of candles comes together.' ),
	array( 'Styling a shelf with odd numbers', 'studio-shelves.jpg', 'Why three objects look better than two, and other gentle rules for styling a shelf.' ),
) as $petal_and_form_post ) {
	$post_id = wp_insert_post(
		array(
			'post_status'   => 'publish',
			'post_title'    => $petal_and_form_post[0],
			'post_excerpt'  => $petal_and_form_post[2],
			'post_content'  => "<!-- wp:paragraph -->\n<p>" . esc_html( $petal_and_form_post[2] ) . "</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Demo post created by the Petal &amp; Form demo seed. Replace it with your own journal entries.</p>\n<!-- /wp:paragraph -->",
			'post_category' => array( $petal_and_form_journal_cat ),
		)
	);
	set_post_thumbnail( $post_id, petal_and_form_demo_image( $petal_and_form_post[1], $petal_and_form_post[0] ) );
	update_post_meta( $post_id, '_petal_and_form_demo', 1 );
}

// 7. Header navigation ----------------------------------------------------------------------------------
$petal_and_form_links = array(
	array( 'Shop', function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' ) ),
	array( 'Gift finder', get_permalink( get_page_by_path( 'gift-finder' ) ) ),
	array( 'Our story', get_permalink( get_page_by_path( 'about' ) ) ),
	array( 'Journal', get_permalink( $petal_and_form_journal_id ) ),
	array( 'Contact', get_permalink( get_page_by_path( 'contact' ) ) ),
);
$petal_and_form_nav = '';
foreach ( $petal_and_form_links as $petal_and_form_link ) {
	$petal_and_form_nav .= '<!-- wp:navigation-link ' . wp_json_encode( array( 'label' => $petal_and_form_link[0], 'url' => $petal_and_form_link[1], 'kind' => 'custom' ) ) . ' /-->';
}
wp_insert_post(
	array(
		'post_type'    => 'wp_navigation',
		'post_status'  => 'publish',
		'post_title'   => 'Main menu (demo)',
		'post_content' => $petal_and_form_nav,
	)
);

// 8. Store settings that only affect presentation on a fresh demo ----------------------------------------
update_option( 'woocommerce_coming_soon', 'no' );
update_option( 'woocommerce_enable_reviews', 'yes' );
update_option( 'blogname', 'Petal & Form Studio' );
update_option( 'blogdescription', 'Small-batch objects for slow, beautiful days' );

echo "Petal & Form demo store seeded.\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
