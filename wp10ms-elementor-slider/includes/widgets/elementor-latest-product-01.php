<?php

class WP10MS_Elementor_Latest_Product_01 extends Elementor\Widget_Base {

    public function get_name() {
        return 'elementor-latest-product';
    }

	public function get_title() {
        return esc_html__( 'Latest Product Tab', 'elementor-slider' );
    }

	public function get_icon() {
        return 'eicon-bullet-list';
    }

	public function get_categories() {
        return [ 'wp10ms-elementor-widget-categories' ];
    }

	public function get_keywords() {
        return ['tab'];
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
			'latest-product-section',
			[
				'label' => esc_html__( 'Latest Product Tab', 'elementor-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'latest_product_1st_heading',
            [
                'label' => esc_html__('1st Tab Heading', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Section Heading', 'elementor-slider' ),
                'default' => esc_html__( 'Section Heading', 'elementor-slider' ),
            ]
        );

        $this->add_control(
            'latest_product_2nd_heading',
            [
                'label' => esc_html__('2nd Tab Heading', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Section Heading', 'elementor-slider' ),
                'default' => esc_html__( 'Section Heading', 'elementor-slider' ),
            ]
        );

        $this->add_control(
            'latest_product_3rd_heading',
            [
                'label' => esc_html__('3rd Tab Heading', 'elementor-slider'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Section Heading', 'elementor-slider' ),
                'default' => esc_html__( 'Section Heading', 'elementor-slider' ),
            ]
        );

		$this->end_controls_section();
    }

	protected function render() {
		$settings = $this->get_settings_for_display();
        $latest_product_1st_heading = $settings['latest_product_1st_heading'];
        $latest_product_2nd_heading = $settings['latest_product_2nd_heading'];
        $latest_product_3rd_heading = $settings['latest_product_3rd_heading'];
		?>
            <!-- Latest Product Section Begin -->
            <section class="latest-product spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="latest-product__text">
                                <h4><?php echo $latest_product_1st_heading ?></h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => 3,
                                            'orderby' => 'date',
                                            'order' => 'DESC'
                                        );
                                        $loop = new WP_Query( $args );
                                            if( $loop->have_posts() ) {
                                                while( $loop->have_posts() ) : $loop->the_post();
                                                    global $product;
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <?php if ( has_post_thumbnail() ) : ?>
                                                                <?php the_post_thumbnail( 'woocommerce_thumbnail' ); ?>
                                                            <?php else : ?>
                                                                <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title(); ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6><?php the_title(); ?></h6>
                                                            <span><?php echo $product->get_price_html(); ?></span>
                                                        </div>
                                                    </a>
                                                    <?php
                                                endwhile;
                                            } else {
                                                echo '<p>' . esc_html__( 'No products found', 'ogani' ) . '</p>';
                                            }
                                            wp_reset_postdata();
                                        ?>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                    <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => 3,
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'offset' => 3
                                        );
                                        $loop = new WP_Query( $args );
                                        if( $loop->have_posts() ) {
                                            while( $loop->have_posts() ) : $loop->the_post();
                                                ?>
                                                <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <?php if ( has_post_thumbnail() ) : ?>
                                                            <?php the_post_thumbnail( 'woocommerce_thumbnail' ); ?>
                                                        <?php else : ?>
                                                            <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title(); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6><?php the_title(); ?></h6>
                                                        <span><?php echo $product->get_price_html(); ?></span>
                                                    </div>
                                                </a>
                                                <?php
                                            endwhile;
                                        } else {
                                            echo '<p>' . esc_html__( 'No products found', 'ogani' ) . '</p>';
                                        }
                                        wp_reset_postdata();
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="latest-product__text">
                                <h4><?php echo $latest_product_2nd_heading ?></h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <?php
                                            $args = array(
                                                'post_type' => 'product',
                                                'posts_per_page' => 3,
                                                'orderby' => 'meta_value_num',
                                                'meta_key' => 'total_sales',
                                                'order' => 'DESC',
                                            );
                                            $loop = new WP_Query( $args );
                                            if( $loop->have_posts() ) {
                                                while( $loop->have_posts() ) : $loop->the_post();
                                                    ?>
                                                    <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <?php if ( has_post_thumbnail() ) : ?>
                                                                <?php the_post_thumbnail( 'woocommerce_thumbnail' ); ?>
                                                            <?php else : ?>
                                                                <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title(); ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6><?php the_title(); ?></h6>
                                                            <span><?php echo $product->get_price_html(); ?></span>
                                                        </div>
                                                    </a>
                                                    <?php
                                                endwhile;
                                            } else {
                                                echo '<p>' . esc_html__( 'No products found', 'ogani' ) . '</p>';
                                            }
                                            wp_reset_postdata();
                                        ?>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                    <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => 3,
                                            'orderby' => 'meta_value_num',
                                            'meta_key' => 'total_sales',
                                            'order' => 'DESC',
                                            'offset' => 3
                                        );
                                        $loop = new WP_Query( $args );
                                        if( $loop->have_posts() ) {
                                            while( $loop->have_posts() ) : $loop->the_post();
                                                ?>
                                                <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <?php if ( has_post_thumbnail() ) : ?>
                                                            <?php the_post_thumbnail( 'woocommerce_thumbnail' ); ?>
                                                        <?php else : ?>
                                                            <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title(); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6><?php the_title(); ?></h6>
                                                        <span><?php echo $product->get_price_html(); ?></span>
                                                    </div>
                                                </a>
                                                <?php
                                            endwhile;
                                        } else {
                                            echo '<p>' . esc_html__( 'No products found', 'ogani' ) . '</p>';
                                        }
                                        wp_reset_postdata();
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="latest-product__text">
                                <h4><?php echo $latest_product_3rd_heading ?></h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                    <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => 3,
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'offset' => 3
                                        );
                                        $loop = new WP_Query( $args );
                                        if( $loop->have_posts() ) {
                                            while( $loop->have_posts() ) : $loop->the_post();
                                                ?>
                                                <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <?php if ( has_post_thumbnail() ) : ?>
                                                            <?php the_post_thumbnail( 'woocommerce_thumbnail' ); ?>
                                                        <?php else : ?>
                                                            <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title(); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6><?php the_title(); ?></h6>
                                                        <span><?php echo $product->get_price_html(); ?></span>
                                                    </div>
                                                </a>
                                                <?php
                                            endwhile;
                                        } else {
                                            echo '<p>' . esc_html__( 'No products found', 'ogani' ) . '</p>';
                                        }
                                        wp_reset_postdata();
                                    ?>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                    <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'posts_per_page' => 3,
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'offset' => 3
                                        );
                                        $loop = new WP_Query( $args );
                                        if( $loop->have_posts() ) {
                                            while( $loop->have_posts() ) : $loop->the_post();
                                                ?>
                                                <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <?php if ( has_post_thumbnail() ) : ?>
                                                            <?php the_post_thumbnail( 'woocommerce_thumbnail' ); ?>
                                                        <?php else : ?>
                                                            <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" alt="<?php the_title(); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6><?php the_title(); ?></h6>
                                                        <span><?php echo $product->get_price_html(); ?></span>
                                                    </div>
                                                </a>
                                                <?php
                                            endwhile;
                                        } else {
                                            echo '<p>' . esc_html__( 'No products found', 'ogani' ) . '</p>';
                                        }
                                        wp_reset_postdata();
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest Product Section End -->
		<?php
	}

	// protected function content_template() {}

}