<?php
/**
 * Title: Footer
 * Slug: wis/hidden-footer
 * Inserter: no
 *
 * @package wis
 * @since 1.0.0
 */
?>
<!-- wp:group {"backgroundColor":"primary","layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-group has-primary-background-color has-background flex justify-left xl:py-8 py-4 xl:px-8 py-4">
    <!-- wp:paragraph {"fontSize":"small","className":"prose"} -->
    <p class="text-sm prose"><?php echo esc_html__( 'Copyright', 'wis' ) . ' ' . date_i18n( _x( 'Y', 'copyright date format', 'wis' ) ); ?></p>
    <!-- /wp:paragraph -->
    <!-- wp:site-title {"level":0,"isLink":false,"fontSize":"small"} /-->
    <!-- wp:social-links {"iconColor":"contrast","iconColorValue":"var(--wp--preset--color--contrast)","className":"has-icon-color is-style-logos-only"} -->
    <ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /--></ul>
    <!-- /wp:social-links -->
</div>
<!-- /wp:group -->

