<?php

/**
 * Plugin Name: WCUS Block Styles
 * Plugin URI: https://github.com/kjellr/wcus-block-styles/
 * Description: A simple plugin featuring some artful block styles.
 * Version: 1.0
 * Author: kjellr
 */

/**
 * Register Custom Block Styles
 */
if ( function_exists( 'register_block_style' ) ) {
	function wcus_block_styles_register_wcus_block_styles() {
		/**
		 * Register stylesheet
		 */
		wp_register_style(
			'block-styles-stylesheet',
			plugins_url( 'style.css', __FILE__ ),
			array(),
			'1.1'
		);

		/**
		 * Register block style: Rotate
		 */
		register_block_style(
			'core/image',
			array(
				'name'         => 'rotate',
				'label'        => 'Rotate',
				'style_handle' => 'block-styles-stylesheet',
			)
		);

		/**
		 * Register block style: Jazz Cover
		 */
		register_block_style(
			'core/image',
			array(
				'name'         => 'jazz-cover',
				'label'        => 'Jazz Cover',
				'style_handle' => 'block-styles-stylesheet',
			)
		);

		/**
		 * Register block style: Photocopy
		 */
		register_block_style(
			'core/image',
			array(
				'name'         => 'photocopy',
				'label'        => 'Photocopy',
				'style_handle' => 'block-styles-stylesheet',
			)
		);

		/**
		 * Register block style: Warped
		 */
		register_block_style(
			'core/heading',
			array(
				'name'         => 'warped',
				'label'        => 'Warped',
				'style_handle' => 'block-styles-stylesheet',
			)
		);

		/**
		 * Register block style: Collage
		 */
		register_block_style(
			'core/gallery',
			array(
				'name'         => 'collage-stacked',
				'label'        => 'Photocopy Collage',
				'style_handle' => 'block-styles-stylesheet',
			)
		);

		/**
		 * Register block style: Baseline Shift
		 */
		register_block_style(
			'core/heading',
			array(
				'name'         => 'baseline-shift',
				'label'        => 'Baseline Shift',
				'style_handle' => 'block-styles-stylesheet',
			)
		);
	}

	add_action( 'init', 'wcus_block_styles_register_wcus_block_styles' );
}

/**
 * Enqueue scripts in the frontend and editor.
 */
function wcus_block_styles_enqueue_scripts() {   
	wp_enqueue_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js' );
	wp_enqueue_script( 'LetteringJS', 'https://cdn.rawgit.com/davatron5000/Lettering.js/5a4897f9/jquery.lettering.js' );
}
add_action('wp_enqueue_scripts', 'wcus_block_styles_enqueue_scripts');
add_action('enqueue_block_editor_assets',  'wcus_block_styles_enqueue_scripts');

/**
 * Enqueue scripts in the frontend only.
 */
function wcus_block_styles_enqueue_frontend_scripts() {   
	wp_enqueue_script( 'WCUS Block Styles Script', plugin_dir_url( __FILE__ ) . 'assets/plugin.js' );
}
add_action('wp_enqueue_scripts', 'wcus_block_styles_enqueue_frontend_scripts');

/**
 * Enqueue scripts in the editor only.
 */
function wcus_block_styles_enqueue_editor_scripts() {   
	wp_enqueue_script( 'WCUS Block Styles Editor Script', plugin_dir_url( __FILE__ ) . 'assets/editor.js', filemtime( plugin_dir_url( __FILE__ ) . 'assets/editor.js' ), array( 'wp-blocks', 'wp-dom' ), true );
}
add_action('enqueue_block_editor_assets', 'wcus_block_styles_enqueue_editor_scripts');

/**
 * Load the distortion SVG into the footer in the front end and editor.
 */
function wcus_block_styles_load_svg_filter() { 
    echo "<svg class='photocopier-svg-filter'><filter id='photocopy-filter-warp' filterUnits='userSpaceOnUse' x='0' y='0'><feTurbulence baseFrequency='0 0.021' seed='1' result='photocopy-turbulance'></feTurbulence><feDisplacementMap in='SourceGraphic' in2='photocopy-turbulance' scale='38' result='photocopy-displacement'></feDisplacementMap><feOffset dx='-14' dy='-9' result='photocopy-offset' in='photocopy-displacement'></feOffset><feComposite in='photocopy-offset' in2='SourceGraphic' result='photocopy-composite'></feComposite></filter></svg><svg class='photocopier-svg-filter'><filter id='photocopy-filter-warp-text' filterUnits='userSpaceOnUse' x='0' y='0'><feTurbulence baseFrequency='0 0.01512' seed='1' result='photocopy-turbulance'></feTurbulence><feDisplacementMap in='SourceGraphic' in2='photocopy-turbulance' scale='100' result='photocopy-displacement'></feDisplacementMap><feOffset dx='-20' dy='-20' result='photocopy-offset' in='photocopy-displacement'></feOffset></filter></svg>";
}
add_action('wp_footer', 'wcus_block_styles_load_svg_filter');
add_action('admin_footer', 'wcus_block_styles_load_svg_filter');