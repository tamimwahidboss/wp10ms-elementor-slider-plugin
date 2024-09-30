<?php

class WP10MS_Elementor_Two_Banner_Widget_01 extends Elementor\Widget_Base {

    public function get_name() {
        return 'elementor-two-banner-widget';
    }

	public function get_title() {
        return esc_html__( 'Two Banner Widget', 'elementor-slider' );
    }

	public function get_icon() {
        return 'eicon-bullet-list';
    }

	public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

	public function get_keywords() {
        return ['banner'];
    }

	public function get_custom_help_url() {
        return 'https://developers.elementor.com/docs/widgets/';
    }

	protected function get_upsale_data() {
        return [
			'condition' => true,
			'image' => esc_url( ELEMENTOR_ASSETS_URL . 'images/go-pro.svg' ),
			'image_alt' => esc_attr__( 'Upgrade', 'elementor-slider' ),
			'title' => esc_html__( 'Promotion heading', 'elementor-slider' ),
			'description' => esc_html__( 'Get the premium version of the widget with additional styling capabilities.', 'elementor-slider' ),
			'upgrade_url' => esc_url( 'https://example.com/upgrade-to-pro/' ),
			'upgrade_text' => esc_html__( 'Upgrade Now', 'elementor-slider' ),
		];
    }

	// public function get_script_depends() {}
	// public function get_style_depends() {}
	// protected function is_dynamic_content() {}

	protected function register_controls() {

        $this->start_controls_section(
			'two_banner_widget_section',
			[
				'label' => esc_html__( 'Two Banner Widget', 'elementor-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'two_banner_1st_img',
			[
				'label' => esc_html__( 'Choose 1st Image', 'elementor-slider' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'two_banner_2nd_img',
			[
				'label' => esc_html__( 'Choose 2nd Image', 'elementor-slider' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();
    }

	protected function render() {
		$settings = $this->get_settings_for_display();
		$two_banner_1st_img = $settings['two_banner_1st_img']['url'];
		$two_banner_2nd_img = $settings['two_banner_2nd_img']['url'];
		?>
		    <!-- Banner Begin -->
			<div class="banner">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="banner__pic">
								<img src="<?php echo $two_banner_1st_img; ?>" alt="">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="banner__pic">
								<img src="<?php echo $two_banner_2nd_img; ?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Banner End -->
		<?php
	}

	// protected function content_template() {}

}