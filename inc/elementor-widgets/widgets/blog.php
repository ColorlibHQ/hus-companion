<?php
namespace Huselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hus elementor blog section widget.
 *
 * @since 1.0
 */

class Hus_Blog extends Widget_Base {

	public function get_name() {
		return 'hus-blog';
	}

	public function get_title() {
		return __( 'Blog', 'hus-companion' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'hus-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Setting', 'hus-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'hus-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Our Latest News', 'hus-companion' )
            ]
        );
		$this->add_control(
			'post_num',
			[
				'label'         => esc_html__( 'Post Item', 'hus-companion' ),
				'type'          => Controls_Manager::NUMBER,
				'label_block'   => false,
                'default'       => absint(3),
                'min'           => 1,
                'max'           => 6,
			]
		);
		$this->add_control(
			'post_order',
			[
				'label'         => esc_html__( 'Post Order', 'hus-companion' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_block'   => false,
				'label_on'      => 'ASC',
				'label_off'     => 'DESC',
                'default'       => 'yes',
                'options'       => [
                    'no'        => 'ASC',
                    'yes'       => 'DESC'
                ]
			]
		);

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'hus-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'section_title_color', [
                'label'     => __( 'Section Title Color', 'hus-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_latest_news_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'highlighted_color', [
                'label'     => __( 'Highlighted Color', 'hus-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_latest_news_area .single_news .news_info .date' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .our_latest_news_area .single_news .news_info .news_meta h3 a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .our_latest_news_area .single_news .news_info .news_meta h3:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .our_latest_news_area .single_news .news_info .news_meta a.read_more:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
    $this->load_widget_script();
    $settings   = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $post_num   = !empty( $settings['post_num'] ) ? $settings['post_num'] : '';
    $post_order = !empty( $settings['post_order'] ) ? $settings['post_order'] : '';
    $post_order = $post_order == 'yes' ? 'DESC' : 'ASC';
    ?>

    <!-- our_latest_news_area_Start  -->
    <div class="our_latest_news_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <?php 
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                        ?>
                        <div class="devider">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="news_active owl-carousel">
                        <?php
                            if( function_exists( 'hus_latest_blog' ) ) {
                                hus_latest_blog( $post_num, $post_order );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest_news_area_end -->
    <?php
	}

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            //project-active
            $('.news_active').owlCarousel({
            loop:true,
            margin:30,
            nav:false,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    nav:false

                },
                767:{
                    items:1,
                    nav:false
                },
                992:{
                    items:2,
                    nav:false
                },
                1200:{
                    items:2,
                },
                1501:{
                    items:2,
                }
            }
            });        
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
