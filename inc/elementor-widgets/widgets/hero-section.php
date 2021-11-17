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
 * Hus elementor hero section widget.
 *
 * @since 1.0
 */
class Hus_Hero extends Widget_Base {

	public function get_name() {
		return 'hus-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'hus-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'hus-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero section content', 'hus-companion' ),
			]
        );
        
		$this->add_control(
            'sliders', [
                'label' => __( 'Create New Slider', 'hus-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ sec_title }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => __( 'Item Image', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'sec_title',
                        'label' => __( 'Title', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'We Create your deam appartment', 'hus-companion' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipilit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis.', 'hus-companion' ),
                    ],
                    [
                        'name' => 'btn_title',
                        'label' => __( 'Button Title', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'View Project', 'hus-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [      
                        'sec_title'    => __( 'We Create your deam appartment', 'hus-companion' ),
                        'text'    => __( 'Lorem ipsum dolor sit amet, consectetur adipilit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis.', 'hus-companion' ),
                        'btn_title'    => __( 'View Project', 'hus-companion' ),
                    ],
                    [      
                        'sec_title'    => __( 'We Create your deam appartment', 'hus-companion' ),
                        'text'    => __( 'Lorem ipsum dolor sit amet, consectetur adipilit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis.', 'hus-companion' ),
                        'btn_title'    => __( 'View Project', 'hus-companion' ),
                    ],
                    [      
                        'sec_title'    => __( 'We Create your deam appartment', 'hus-companion' ),
                        'text'    => __( 'Lorem ipsum dolor sit amet, consectetur adipilit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Quis.', 'hus-companion' ),
                        'btn_title'    => __( 'View Project', 'hus-companion' ),
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
			'title_col', [
				'label' => __( 'Title Color', 'hus-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'hus-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_border_col', [
				'label' => __( 'Button Border Color', 'hus-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .slider_area .single_slider .slider_text span' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_text_col', [
				'label' => __( 'Button Text Color', 'hus-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_bg_col', [
				'label' => __( 'Button Hover BG Color', 'hus-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn3:hover' => 'background: {{VALUE}};',
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

    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <?php 
            if( is_array( $sliders ) && count( $sliders ) > 0 ) {
                foreach( $sliders as $item ) {
                    $sec_img   = !empty( $item['item_img']['url'] ) ? $item['item_img']['url'] : '';
                    $sec_title = !empty( $item['sec_title'] ) ? $item['sec_title'] : '';
                    $text = !empty( $item['text'] ) ? $item['text'] : '';
                    $btn_title = !empty( $item['btn_title'] ) ? $item['btn_title'] : '';
                    $btn_url = !empty( $item['btn_url']['url'] ) ? $item['btn_url']['url'] : '';
                    ?>
                    <div class="single_slider d-flex align-items-center overlay" <?php echo hus_inline_bg_img( esc_url( $sec_img ) ); ?>>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-md-8">
                                    <div class="slider_text">
                                        <span></span>
                                        <?php 
                                            if ( $sec_title ) { 
                                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                                            }
                                            if ( $text ) { 
                                                echo '<p>'.wp_kses_post( $text ).'</p>';
                                            }
                                            if ( $btn_title ) { 
                                                echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn3">'.esc_html( $btn_title ).'</a>';
                                            }
                                        ?>
                                    </div>
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
    <!-- slider_area_end -->
    <?php
    } 

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // slider-active
            $('.slider_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:false,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            responsive:{
                0:{
                    items:1,
                    nav:false,
                },
                767:{
                    items:1
                },
                992:{
                    items:1
                },
                1200:{
                    items:1
                },
                1600:{
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