<?php

class WP10MS_Elementor_Map_Widget_01 extends \Elementor\Widget_Base {

    public function get_name() {
        return 'map_widget';
    }

    public function get_title() {
        return esc_html__( 'Map', 'elementor-slider' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

    public function get_keywords() {
        return ['map'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'elementor_map_section',
            [
                'label' => esc_html__('Map Widget', 'elementor-slider'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'map_title',
            [
                'label' => esc_html__('City', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'New York', 'elementor-slider' ),
                'default' => esc_html__( 'New York', 'elementor-slider' ),
            ]
        );

        $this->add_control(
            'map_details',
            [
                'label' => esc_html__('Map Details', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Add: 16 Creek Ave. Farmingdale, NY', 'elementor-slider' ),
                'default' => esc_html__( 'Add: 16 Creek Ave. Farmingdale, NY', 'elementor-slider' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $map_title = $settings['map_title'];
        $map_details = $settings['map_details'];
        ?>
            <!-- Map Begin -->
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
                    height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="map-inside">
                    <i class="icon_pin"></i>
                    <div class="inside-widget">
                        <h4><?php echo $map_title; ?></h4>
                        <ul>
                            <li><?php echo $map_details; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Map End -->
        <?php
    }

    
}
