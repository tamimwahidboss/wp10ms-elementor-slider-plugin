<?php
class Test extends \Elementor\Widget_Base {

    public function get_name() {
        return 'test';
    }

    public function get_title() {
        return esc_html__( 'Test', 'elementor-slider' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'basic' ];
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
			'test_section',
			[
				'label' => esc_html__( 'Content', 'elementor-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'font_size',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Size', 'elementor-slider' ),
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
			]
		);

		$this->end_controls_section();

	}


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <?php
    }
}