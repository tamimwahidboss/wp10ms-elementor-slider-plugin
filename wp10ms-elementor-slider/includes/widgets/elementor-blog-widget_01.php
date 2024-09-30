<?php

class WP10MS_Elementor_blog_widget_01 extends Elementor\Widget_Base {

    public function get_name() {
        return 'wp10ms-blog-widget-01';
    }

	public function get_title() {
        return esc_html__( 'Blog Section', 'elementor-slider' );
    }

	public function get_icon() {
        return 'eicon-bullet-list';
    }

	public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

	public function get_keywords() {
        return ['tab', 'blog', 'content'];
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
			'blog_widget_01_section',
			[
				'label' => esc_html__( 'Latest Product Tab', 'elementor-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'blog_section_heading',
            [
                'label' => esc_html__('Section Heading', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Blog', 'elementor-slider' ),
                'default' => esc_html__( 'Blog', 'elementor-slider' ),
            ]
        );

		$this->end_controls_section();
    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        $blog_section_heading = $settings['blog_section_heading'];
		?>
            <!-- Blog Section Begin -->
            <section class="from-blog spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title from-blog__title">
                                <h2>From The Blog</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 1,
                            'orderby'        => 'date',
                            'order'          => 'DESC'
                        );
                        $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) {
                            while ( $loop->have_posts() ) : $loop->the_post();
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="blog__item">
                                        <div class="blog__item__pic">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?></a>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/blog/blog-default.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                                            <?php endif; ?>
                                        </div>
                                        <div class="blog__item__text">
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'M j, Y' ); ?></li>
                                                <li><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></li>
                                            </ul>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        } else {
                            echo '<div class="col-lg-12"><p>' . esc_html__( 'No posts found', 'ogani' ) . '</p></div>';
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!-- Blog Section End -->
		<?php
	}

	// protected function content_template() {}

}