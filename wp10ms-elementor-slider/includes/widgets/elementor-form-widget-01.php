<?php

class WP10MS_Elementor_Form_Widget_01 extends Elementor\Widget_Base {

    public function get_name() {
        return 'elementor-form-widget';
    }

	public function get_title() {
        return esc_html__( 'Contact Form', 'elementor-slider' );
    }

	public function get_icon() {
        return 'eicon-bullet-list';
    }

	public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

	public function get_keywords() {
        return ['contact', 'form', 'email',];
    }

	// public function get_script_depends() {}
	// public function get_style_depends() {}
	// protected function is_dynamic_content() {}

	protected function register_controls() {

        $this->start_controls_section(
			'contact_form_section',
			[
				'label' => esc_html__( 'Contact Form', 'elementor-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'form_heading',
            [
                'label' => esc_html__('Form Heading', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Leave Message', 'elementor-slider'),
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
            <!-- Contact Form Begin -->
            <div class="contact-form spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact__form__title">
                                <h2><?php echo $settings['form_heading'] ?></h2>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <input type="text" placeholder="Your name">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" placeholder="Your Email">
                            </div>
                            <div class="col-lg-12 text-center">
                                <textarea placeholder="Your message"></textarea>
                                <button type="submit" class="site-btn">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Contact Form End -->
		<?php
	}

	// protected function content_template() {}

}