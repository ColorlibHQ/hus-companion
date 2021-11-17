<?php
namespace Huselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hus elementor about section widget.
 *
 * @since 1.0
 */
class Hus_About_Section extends Widget_Base {

	public function get_name() {
		return 'hus-about-us';
	}

	public function get_title() {
		return __( 'About Section', 'hus-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'hus-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About Us content ------------------------------
        $this->start_controls_section(
            'left_content',
            [
                'label' => __( 'Left Section Settings', 'hus-companion' ),
            ]
        );

        $this->add_control(
            'sec_img',
            [
                'label' => esc_html__( 'Left Image', 'hus-companion' ),
                'description' => esc_html__( 'Best size is 458x542', 'hus-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'exp_val',
            [
                'label' => esc_html__( 'Experience Value', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 10,
            ]
        );
        $this->add_control(
            'exp_label',
            [
                'label' => esc_html__( 'Experience Label', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Years of Exprince', 'hus-companion' ),
            ]
        );
        $this->end_controls_section(); // End left content

        // Right section
        $this->start_controls_section(
            'right_content',
            [
                'label' => __( 'Right Section Settings', 'hus-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'We are Hus <br> <span>Realestate Company</span>',
            ]
        );
        $this->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'hus-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.<ul><li>Lorem ipsum dolor sit amet</li><li>Consectetur adipisicing elit, sed do</li><li>Eiusmod tempor incididunt ut labore</li><li>Ad minim veniam, quis nostrud.</li></ul>',
            ]
        );

        
        $this->add_control(
            'statistics_seperator',
            [
                'label' => esc_html__( 'Statistics', 'hus-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item1_counter',
            [
                'label' => esc_html__( 'Counter Value 1', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 120,
            ]
        );
        $this->add_control(
            'item1_text',
            [
                'label' => esc_html__( 'Title 1', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Buildings', 'hus-companion' ),
            ]
        );
        $this->add_control(
            'item2_counter',
            [
                'label' => esc_html__( 'Counter Value 2', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 500,
            ]
        );
        $this->add_control(
            'item2_text',
            [
                'label' => esc_html__( 'Title 2', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Clients', 'hus-companion' ),
            ]
        );
        $this->end_controls_section(); // End left content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'hus-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_col', [
                'label' => __( 'Title Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'highlighted_col', [
                'label' => __( 'Highlighted Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title h3 span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area .about_info .info_inner ul li::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area .about_info .info_inner .customer_info .single_info > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {
    $settings   = $this->get_settings();  
    $sec_img    = !empty( $settings['sec_img']['url'] ) ? $settings['sec_img']['url'] : '';
    $exp_val  = !empty( $settings['exp_val'] ) ? $settings['exp_val'] : '';
    $exp_label  = !empty( $settings['exp_label'] ) ? $settings['exp_label'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $text   = !empty( $settings['text'] ) ? $settings['text'] : '';
    $item1_counter  = !empty( $settings['item1_counter'] ) ? $settings['item1_counter'] : '';
    $item1_text  = !empty( $settings['item1_text'] ) ? $settings['item1_text'] : '';
    $item2_counter  = !empty( $settings['item2_counter'] ) ? $settings['item2_counter'] : '';
    $item2_text  = !empty( $settings['item2_text'] ) ? $settings['item2_text'] : '';
    ?>

    <!-- about_area_start  -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about_exp d-flex align-items-center justify-content-center" <?php echo hus_inline_bg_img( esc_url( $sec_img ) ); ?>>
                        <div class="about_exp_inner_upper d-flex align-items-center justify-content-center">
                            <div class="about_exp_inner text-center">
                                <?php 
                                    if ( $exp_val ) { 
                                        echo '<span>'.esc_html($exp_val).'</span>';
                                    }
                                    if ( $exp_label ) { 
                                        echo '<p>'.esc_html($exp_label).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_info pl-70">
                        <div class="section_title mb-55">
                            <?php 
                                if ( $sec_title ) { 
                                    echo '<h3>'.wp_kses_post(nl2br($sec_title)).'</h3>';
                                }
                            ?>
                            <div class="devider">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="info_inner">
                            <?php 
                                if ( $text ) { 
                                    echo '<p>'.wp_kses_post(nl2br($text)).'</p>';
                                }
                            ?>
                            <div class="customer_info d-flex">
                                <div class="single_info d-flex align-items-baseline">
                                    <?php 
                                        if ( $item1_counter ) { 
                                            echo '<span class="counter">'.esc_html($item1_counter).'</span>';
                                        }
                                        if ( $item1_text ) { 
                                            echo '<p>'.esc_html($item1_text).'</p>';
                                        }
                                    ?>
                                </div>
                                <div class="single_info d-flex align-items-baseline">
                                    <?php 
                                        if ( $item2_counter ) { 
                                            echo '<span><span class="counter">'.esc_html($item2_counter).'</span>+</span>';
                                        }
                                        if ( $item2_text ) { 
                                            echo '<p>'.esc_html($item2_text).'</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end  -->
    <?php
    }
}