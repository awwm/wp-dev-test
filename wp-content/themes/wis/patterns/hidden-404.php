<?php
/**
 * Title: 404
 * Slug: wis/404
 * Inserter: no
 *
 * @package wis
 * @since 1.0.0
 */
?>
<!-- wp:heading {"textAlign":"center", "level": 1} -->
<h1 class="wp-block-heading has-text-align-cente prose">
	<?php esc_html_e( 'Page not found', 'wis' ); ?>
</h1>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p class="prose"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'wis' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'Search form label', 'wis' ); ?>","showLabel":false,"buttonText":"<?php echo esc_html_x( 'Search', 'Search form submit button text', 'wis' ); ?>"} /-->
