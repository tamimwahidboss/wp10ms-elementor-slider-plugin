<?php

class WP10MS_Elementor_Contact_Widget_01 extends Elementor\Widget_Base {

    public function get_name() {
        return 'elementor-contact-widget';
    }

	public function get_title() {
        return esc_html__( 'Contact Widget', 'elementor-slider' );
    }

	public function get_icon() {
        return 'eicon-bullet-list';
    }

	public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

	public function get_keywords() {
        return ['contact', 'number', 'email', 'address'];
    }

	// public function get_script_depends() {}
	// public function get_style_depends() {}
	// protected function is_dynamic_content() {}

	protected function register_controls() {

        $this->start_controls_section(
			'contact_widget',
			[
				'label' => esc_html__( 'Contact Section', 'elementor-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new \Elementor\Repeater();

        // $repeater->add_control(
        //     'contact_icon',
        //     [
        //         'label' => esc_html__('Contact Icon', 'elementor-slider'),
        //         'type' => \Elementor\Controls_Manager::ICON,
        //         'default' => esc_html__( 'Fresh Fruit', 'elementor-slider' ),
        //     ]
        // );

        $repeater->add_control(
            'contact_title',
            [
                'label' => esc_html__('Contact Title', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Phone', 'elementor-slider' ),
                'default' => esc_html__( 'Phone', 'elementor-slider' ),
            ]
        );

        $repeater->add_control(
            'contact_value',
            [
                'label' => esc_html__('Contact Value', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( '+01-3-8888-6868', 'elementor-slider' ),
                'default' => esc_html__( '+01-3-8888-6868', 'elementor-slider' ),
            ]
        );

        $this->add_control(
            'contact_section',
            [
                'label' => esc_html__('Contact Elements', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'category_btn_text' => esc_html__('Fresh Fruit', 'elementor-slider'),
                    ],
                ],
            ]
        );

		$this->end_controls_section();
    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        // $contact_icon = $settings['contact_icon'];
        // $contact_title = $settings['contact_title'];
        // $contact_value = $settings['contact_value'];
		?>
            <!-- Contact Section Begin -->
            <section class="contact spad">
                <div class="container">
                    <div class="row">
                        <?php
                            foreach($settings['contact_section'] as $element) {
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                                    <div class="contact__widget">
                                        <span class="fa-solid fa-phone"></span>
                                        <h4><?php echo esc_html($element['contact_title']) ?></h4>
                                        <p><?php echo esc_html__($element['contact_value']) ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </section>
            <!-- Contact Section End -->
		<?php
	}

	// protected function content_template() {}

}