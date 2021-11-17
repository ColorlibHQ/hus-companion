<?php
namespace Huselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hus elementor testimonial section widget.
 *
 * @since 1.0
 */
class Hus_Testimonial extends Widget_Base {

	public function get_name() {
		return 'hus-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial Section', 'hus-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'hus-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  testimonial content ------------------------------
		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial contents', 'hus-companion' ),
			]
        );
        
		$this->add_control(
            'sliders', [
                'label' => __( 'Create New Slider', 'hus-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'client_img',
                        'label' => __( 'Client Image', 'hus-companion' ),
                        'description' => __( 'Best size is 130x130', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Margaret Lawson', 'hus-companion' ),
                    ],
                    [
                        'name' => 'client_designation',
                        'label' => __( 'Client Designation', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Creative Director', 'hus-companion' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Review', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( '“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”', 'hus-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'client_name'           => __( 'Margaret Lawson', 'hus-companion' ),
                        'client_designation'    => __( 'Creative Director', 'hus-companion' ),
                        'Review'                => __( '“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”', 'hus-companion' ),
                    ],
                    [      
                        'client_name'           => __( 'John Doe', 'hus-companion' ),
                        'client_designation'    => __( 'Creative Designer', 'hus-companion' ),
                        'Review'                => __( '“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”', 'hus-companion' ),
                    ],
                    [      
                        'client_name'           => __( 'Markus Sichler', 'hus-companion' ),
                        'client_designation'    => __( 'Web Developer', 'hus-companion' ),
                        'Review'                => __( '“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”', 'hus-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'hus-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'quotation_col', [
				'label' => __( 'Double Quotation Color', 'hus-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial_area .single_testmonial .author_thumb::before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
    
	protected function render() {
    $this->load_widget_script();
    $settings  = $this->get_settings();
    $sliders = !empty( $settings['sliders'] ) ? $settings['sliders'] : '';
    ?>
    
    <!-- testimonial_area  -->
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <?php 
                            if( is_array( $sliders ) && count( $sliders ) > 0 ) {
                                foreach( $sliders as $item ) {
                                    $client_name = !empty( $item['client_name'] ) ? $item['client_name'] : '';
                                    $client_img   = !empty( $item['client_img']['id'] ) ? wp_get_attachment_image( $item['client_img']['id'], 'hus_testimonial_thumb_130x130', '', array( 'alt' => $client_name ) ) : '';
                                    $client_designation = !empty( $item['client_designation'] ) ? $item['client_designation'] : '';
                                    $text = !empty( $item['text'] ) ? $item['text'] : '';
                                    ?>
                                    <div class="single_carousel">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-9">
                                                <div class="single_testmonial text-center">
                                                    <?php
                                                        if ( $client_img ) {
                                                            echo '
                                                            <div class="author_thumb">
                                                                '.$client_img.'
                                                            </div>
                                                            ';
                                                        }
                                                        if ( $client_name || $client_designation ) {
                                                            echo '
                                                            <div class="testmonial_author">
                                                                <h3>'.esc_html($client_name).'</h3>
                                                                <span>'.esc_html($client_designation).'</span>
                                                            </div>
                                                            ';
                                                        }
                                                        if ( $text ) {
                                                            echo '
                                                                <p>'.wp_kses_post($text).'</p>
                                                            ';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial_end -->
    <?php
    } 

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            $('.testmonial_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:false,
            dots:true,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                },
                767:{
                    items:1,
                },
                992:{
                    items:1,
                },
                1200:{
                    items:1,
                },
                1500:{
                    items:1
                }
            }
            });      
        })(jQuery);
        </script>
        <?php 
        }
    }	
}