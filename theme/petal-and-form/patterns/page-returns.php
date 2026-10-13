<?php
/**
 * Title: Returns & refunds page
 * Slug: petal-and-form/page-returns
 * Categories: petal-and-form-pages
 * Keywords: returns, refunds, exchanges, policy
 * Description: Structure for a returns policy with placeholder guidance. Consumer law differs by country — check the rules that apply to you. Not legal advice.
 * Post Types: page
 * Viewport Width: 1400
 *
 * @package Petal_And_Form
 */

$petal_and_form_sections = array(
	array( __( 'Return window', 'petal-and-form' ), __( 'How many days customers have to start a return, and from when (delivery date or order date).', 'petal-and-form' ) ),
	array( __( 'Condition of items', 'petal-and-form' ), __( 'What condition items must be in, and any exceptions such as personalised or custom pieces.', 'petal-and-form' ) ),
	array( __( 'How to start a return', 'petal-and-form' ), __( 'The steps: who to contact, what to include and where to send the parcel.', 'petal-and-form' ) ),
	array( __( 'Refunds', 'petal-and-form' ), __( 'How and when refunds are issued, and who pays return postage.', 'petal-and-form' ) ),
	array( __( 'Damaged or faulty items', 'petal-and-form' ), __( 'What happens if an item arrives broken or develops a fault.', 'petal-and-form' ) ),
);
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"className":"pf-demo-label"} -->
	<p class="pf-demo-label"><?php esc_html_e( 'Template — replace with your own policy', 'petal-and-form' ); ?></p>
	<!-- /wp:paragraph -->
	<?php foreach ( $petal_and_form_sections as $petal_and_form_s ) : ?>
	<!-- wp:heading {"fontSize":"x-large"} -->
	<h2 class="wp-block-heading has-x-large-font-size"><?php echo esc_html( $petal_and_form_s[0] ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p><?php echo esc_html( $petal_and_form_s[1] ); ?></p>
	<!-- /wp:paragraph -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
