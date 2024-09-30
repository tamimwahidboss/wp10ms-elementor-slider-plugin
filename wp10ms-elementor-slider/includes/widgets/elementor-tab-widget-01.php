<?php

class WP10MS_Elementor_Tab_Widget_1 extends \Elementor\Widget_Base {

    public function get_name() {
        return 'elementor_slider_product_tab';
    }

    public function get_title() {
        return esc_html__( 'Product Tab', 'elementor-slider' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

    public function get_keywords() {
        return ['tab'];
    }

    public function get_custom_help_url() {
        return 'https://tamimwahid.com';
    }

    protected function get_upsale_data() {
        return [
            'condition' => true,
            'image' => esc_url( ELEMENTOR_ASSETS_URL . 'images/go-pro.svg' ),
            'image_alt' => esc_attr__( 'Upgrade', 'elementor-slider' ),
            'title' => esc_html__( 'Promotion heading', 'elementor-slider' ),
            'description' => esc_html__( 'Get the premium version of the widget with additional styling capabilities.', 'elementor-slider' ),
            'upgrade_url' => esc_url( 'https://tamimwahid.com' ),
            'upgrade_text' => esc_html__( 'Upgrade Now', 'elementor-slider' ),
        ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'elementor_slider_tab_section',
            [
                'label' => esc_html__('Product Tab', 'elementor-slider'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'elementor_slider_featured_h2',
            [
                'label' => esc_html__('Featured Section Heading', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Featured Product', 'elementor-slider' ),
                'default' => esc_html__( 'Featured Product', 'elementor-slider' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <!-- Featured Section Begin -->
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?php echo $settings['elementor_slider_featured_h2']; ?></h2>
                        </div>
                        <div class="featured__controls">
                            <ul>
                                <li class="active" data-filter="*">All</li>
                                <?php
                                $categories = get_terms( 'product_cat', array(
                                    'hide_empty' => 0,
                                    'orderby' => 'ASC'
                                ) );
                                if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
                                    foreach( $categories as $category ) {
                                        ?>
                                        <li data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                    );
                    $loop = new WP_Query( $args );
                    if( $loop->have_posts() ) {
                        while( $loop->have_posts() ) : $loop->the_post();
                        $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
                        $cat_classes = '';
                        if ( ! is_wp_error( $product_cats ) && ! empty( $product_cats ) ) {
                            foreach ( $product_cats as $product_cat ) {
                                $cat_classes .= ' ' . esc_attr( $product_cat->slug );
                            }
                        }
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix<?php echo $cat_classes; ?>">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>
                        <?php
                        endwhile;
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
        <!-- Featured Section End -->

        <?php
    }
    protected function content_template() {
		?>
		<?php
	}
}