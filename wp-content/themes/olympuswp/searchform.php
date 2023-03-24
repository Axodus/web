<?php
/**
 * Search Form
 *
 * @package Olympus
 */

$olympus_data_attrs = isset( $args['data_attributes'] ) ? $args['data_attributes'] : '';
$olympus_input_placeholder = isset( $args['input_placeholder'] ) ? $args['input_placeholder'] : esc_attr__( 'Research for&hellip;', 'olympuswp' );
$olympus_input_value = isset( $args['input_value'] ) ? $args['input_value'] : '';
$olympus_show_submit = isset( $args['show_input_submit'] ) ? $args['show_input_submit'] : true;
$olympus_search_source = isset( $args['search_source'] ) ? $args['search_source'] : false;
?>
<form role="search" method="get" class="search-form olympus-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html__( 'Search for:', 'olympuswp' ); ?></span>
		<input type="search" class="search-field" <?php echo esc_html( $olympus_data_attrs ); ?> placeholder="<?php echo esc_html( $olympus_input_placeholder ); ?>" value="<?php echo esc_attr( $olympus_input_value ); ?>" name="s" tabindex="-1">
		<?php 
		if ( $olympus_search_source && 'any' !== $olympus_search_source ) { ?>
			<input type="hidden" name="post_type" value="<?php echo esc_attr( $olympus_search_source ); ?>">
		<?php }
		if ( $olympus_show_submit ) { ?>
			<button class="search-submit" aria-label="<?php echo esc_attr__( 'Search Submit', 'olympuswp' ); ?>">
				<?php echo olympus_get_svg_icon( 'search-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function. ?>
			</button>
		<?php } ?>
	</label>
</form>
<?php
