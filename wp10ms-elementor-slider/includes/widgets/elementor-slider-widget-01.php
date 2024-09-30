<?php

class WP10MS_Elementor_Slider_Widget_1 extends \Elementor\Widget_Base {

    public function get_name() {
        return 'elementor_slider_categories';
    }

    public function get_title() {
        return esc_html__( 'Categories Slider', 'elementor-slider' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

    public function get_keywords() {
        return ['slider'];
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
            'elementor_slider_categories',
            [
                'label' => esc_html__('Categories Slider', 'elementor-slider'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'category_banner_image',
            [
                'label' => esc_html__('Category Banner Image', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'category_btn_text',
            [
                'label' => esc_html__('Category Button Text', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Category Name', 'elementor-slider' ),
                'default' => esc_html__( 'Fresh Fruit', 'elementor-slider' ),
            ]
        );

        $repeater->add_control(
            'category_btn_link',
            [
                'label' => esc_html__('Category Button Link', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( '#', 'elementor-slider' ),
            ]
        );

        $this->add_control(
            'categories_banner',
            [
                'label' => esc_html__('Category Banners', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'category_btn_text' => esc_html__('Fresh Fruit', 'elementor-slider'),
                    ],
                ],
                'title_field' => '{{{ category_btn_text }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- Categories Section Begin -->
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        <?php foreach ($settings['categories_banner'] as $banner) { ?>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" style="background-image: url('<?php echo esc_url($banner['category_banner_image']['url']); ?>');">
                                    
                                    <h5><a href="<?php echo esc_url($banner['category_btn_link']['url']); ?>"><?php echo esc_html($banner['category_btn_text']); ?></a></h5>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->
        <?php
    }

    protected function content_template() {
        ?>
        <!-- Categories Section Begin -->
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        <# _.each( settings.categories_banner, function( banner ) { #>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="{{ banner.category_banner_image.url }}">
                                    <h5><a href="{{ banner.category_btn_link.url }}">{{{ banner.category_btn_text }}}</a></h5>
                                </div>
                            </div>
                        <# }); #>
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->
        <?php
    }
}
