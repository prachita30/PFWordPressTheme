<?php
/**
 * Petal & Form functions.
 *
 * The theme is presentation-only: design lives in theme.json, templates and patterns.
 * This file only loads the stylesheet and registers pattern categories and block styles.
 *
 * @package Petal_And_Form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup: editor stylesheet so the editor matches the front end.
 */
function petal_and_form_setup() {
	add_editor_style( 'assets/css/theme.css' );
}
add_action( 'after_setup_theme', 'petal_and_form_setup' );

/**
 * Enqueue the small front-end stylesheet (things theme.json cannot express).
 */
function petal_and_form_enqueue_styles() {
	$theme = wp_get_theme();

	wp_enqueue_style(
		'petal-and-form',
		get_theme_file_uri( 'assets/css/theme.css' ),
		array(),
		$theme->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'petal_and_form_enqueue_styles' );

/**
 * Register pattern categories so the theme's patterns are easy to find in the inserter.
 */
function petal_and_form_register_pattern_categories() {
	$categories = array(
		'petal-and-form-home'     => array(
			'label'       => __( 'Petal & Form: Homepage', 'petal-and-form' ),
			'description' => __( 'Hero, collection and storefront sections.', 'petal-and-form' ),
		),
		'petal-and-form-story'    => array(
			'label'       => __( 'Petal & Form: Storytelling', 'petal-and-form' ),
			'description' => __( 'Maker story, materials, care, values and custom orders.', 'petal-and-form' ),
		),
		'petal-and-form-shop'     => array(
			'label'       => __( 'Petal & Form: Shop', 'petal-and-form' ),
			'description' => __( 'Product collections, gift guides and shop helpers.', 'petal-and-form' ),
		),
		'petal-and-form-pages'    => array(
			'label'       => __( 'Petal & Form: Full pages', 'petal-and-form' ),
			'description' => __( 'Ready-made page layouts: about, contact, FAQ, gift finder, policies.', 'petal-and-form' ),
		),
	);

	foreach ( $categories as $slug => $args ) {
		register_block_pattern_category( $slug, $args );
	}
}
add_action( 'init', 'petal_and_form_register_pattern_categories' );

/**
 * Link to a product category if it exists, otherwise to the shop (or the home page without WooCommerce).
 *
 * Used by patterns so starter links point somewhere useful on any site. The URL is resolved when the
 * pattern is inserted; editing the link in the editor replaces it.
 *
 * @param string $category_slug Product category slug.
 * @return string URL.
 */
function petal_and_form_shop_link( $category_slug = '' ) {
	if ( $category_slug && taxonomy_exists( 'product_cat' ) ) {
		$term = get_term_by( 'slug', $category_slug, 'product_cat' );
		if ( $term ) {
			$link = get_term_link( $term );
			if ( ! is_wp_error( $link ) ) {
				return $link;
			}
		}
	}

	if ( function_exists( 'wc_get_page_permalink' ) ) {
		return wc_get_page_permalink( 'shop' );
	}

	return home_url( '/' );
}

/**
 * Link to a page by its path (slug) if it exists, otherwise to the home page.
 *
 * @param string $path Page path, e.g. 'contact'.
 * @return string URL.
 */
function petal_and_form_page_link( $path ) {
	$page = get_page_by_path( $path );

	return $page ? get_permalink( $page ) : home_url( '/' );
}

/**
 * Whether WooCommerce is active. Product patterns render nothing without it.
 *
 * @return bool
 */
function petal_and_form_has_woocommerce() {
	return class_exists( 'WooCommerce' );
}

/**
 * Register block styles. Their CSS lives in assets/css/theme.css.
 */
function petal_and_form_register_block_styles() {
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'pf-eyebrow',
			'label' => __( 'Eyebrow', 'petal-and-form' ),
		)
	);
	register_block_style(
		'core/heading',
		array(
			'name'  => 'pf-italic-accent',
			'label' => __( 'Italic accent', 'petal-and-form' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'pf-card',
			'label' => __( 'Card', 'petal-and-form' ),
		)
	);
	register_block_style(
		'core/image',
		array(
			'name'  => 'pf-arch',
			'label' => __( 'Arch', 'petal-and-form' ),
		)
	);
	register_block_style(
		'core/list',
		array(
			'name'  => 'pf-checklist',
			'label' => __( 'Checklist', 'petal-and-form' ),
		)
	);
	register_block_style(
		'core/navigation',
		array(
			'name'  => 'pf-underline',
			'label' => __( 'Underline on hover', 'petal-and-form' ),
		)
	);
}
add_action( 'init', 'petal_and_form_register_block_styles' );
