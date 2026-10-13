<?php
/**
 * Title: FAQ page
 * Slug: petal-and-form/page-faq
 * Categories: petal-and-form-pages
 * Keywords: faq, questions, help, accordion
 * Description: Frequently asked questions as accessible, native disclosure (details) blocks — no JavaScript.
 * Post Types: page
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_faq = array(
	array( __( 'How long will my order take?', 'petal-and-form' ), __( 'State your usual processing time and delivery estimates. Link to your shipping page for details.', 'petal-and-form' ) ),
	array( __( 'Is every piece really handmade?', 'petal-and-form' ), __( 'Explain what “handmade” means in your studio and which steps (if any) use outside makers.', 'petal-and-form' ) ),
	array( __( 'Can I order something custom?', 'petal-and-form' ), __( 'Describe how to request a custom order, typical lead times and whether a deposit is needed.', 'petal-and-form' ) ),
	array( __( 'Do you offer gift wrapping?', 'petal-and-form' ), __( 'Say whether wrapping is included or optional, and how to add a gift note.', 'petal-and-form' ) ),
	array( __( 'What if something arrives damaged?', 'petal-and-form' ), __( 'Tell customers who to contact, what photos you need and how quickly you will help.', 'petal-and-form' ) ),
	array( __( 'Do you ship internationally?', 'petal-and-form' ), __( 'List the countries you ship to and mention that duties or taxes may apply on arrival.', 'petal-and-form' ) ),
);
?>
<!-- wp:group {"className":"pf-faq","layout":{"type":"constrained"}} -->
<div class="wp-block-group pf-faq">
	<?php foreach ( $petal_and_form_faq as $petal_and_form_q ) : ?>
	<!-- wp:details -->
	<details class="wp-block-details"><summary><?php echo esc_html( $petal_and_form_q[0] ); ?></summary>
		<!-- wp:paragraph {"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color"><?php echo esc_html( $petal_and_form_q[1] ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
