<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Register elementor slider widgets
function wp10ms_elementor_slider_register( $widgets_manager ) {

    require_once( __DIR__ . '/includes/widgets/elementor-slider-widget-01.php' );
    require_once( __DIR__ . '/includes/widgets/elementor-tab-widget-01.php' );
    require_once( __DIR__ . '/includes/widgets/elementor-two-banner-widget-01.php' );
    require_once( __DIR__ . '/includes/widgets/elementor-latest-product-01.php' );
    require_once( __DIR__ . '/includes/widgets/elementor-blog-widget_01.php' );
    require_once( __DIR__ . '/includes/widgets/elementor-contact-widget-01.php' );
    require_once( __DIR__ . '/includes/widgets/elementor-map-widget-01.php' );
    require_once( __DIR__ . '/includes/widgets/elementor-form-widget-01.php' );
    // require_once( __DIR__ . '/includes/widgets/test.php' );

    $widgets_manager->register( new \WP10MS_Elementor_Slider_Widget_1() );
    $widgets_manager->register( new \WP10MS_Elementor_Tab_Widget_1() );
    $widgets_manager->register( new \WP10MS_Elementor_Two_Banner_Widget_01() );
    $widgets_manager->register( new \WP10MS_Elementor_Latest_Product_01() );
    $widgets_manager->register( new \WP10MS_Elementor_blog_widget_01() );
    $widgets_manager->register( new \WP10MS_Elementor_Contact_Widget_01() );
    $widgets_manager->register( new \WP10MS_Elementor_Map_Widget_01() );
    $widgets_manager->register( new \WP10MS_Elementor_form_widget_01() );
    // $widgets_manager->register( new \Test() );

}
add_action( 'elementor/widgets/register', 'wp10ms_elementor_slider_register' );

// Make new elementor widget category for using plugin name.
function add_wp10ms_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'wp10ms-elementor-widget-categories',
		[
			'title' => esc_html__( 'Elementor Slider Plugin', 'elementor-slider' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_wp10ms_elementor_widget_categories' );