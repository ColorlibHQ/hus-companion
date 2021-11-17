<?php
namespace Huselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hus elementor facilities section widget.
 *
 * @since 1.0
 */
class Hus_Facilities extends Widget_Base {

	public function get_name() {
		return 'hus-facilities';
	}

	public function get_title() {
		return __( 'App Facilities', 'hus-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'hus-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Facilities content ------------------------------
		$this->start_controls_section(
			'facilities_content',
			[
				'label' => __( 'Facilities content', 'hus-companion' ),
			]
        );
        $this->add_control(
            'sec_bg',
            [
                'label' => esc_html__( 'Section BG', 'hus-companion' ),
                'description' => esc_html__( 'Best size is 1920x464', 'hus-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hus-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Facilities', 'hus-companion' ),
            ]
        );

        $this->add_control(
            'facilities_settings_seperator',
            [
                'label' => esc_html__( 'Facilities', 'hus-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'facilities', [
                'label' => __( 'Create New', 'hus-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'default'     => 'flaticon-sketch',
                        'options' => hus_themify_icon()
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Planning Stage', 'hus-companion' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.', 'hus-companion' ),
                    ],
                    [
                        'name' => 'anchor_title',
                        'label' => __( 'Anchor Title', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Learn more', 'hus-companion' ),
                    ],
                    [
                        'name' => 'anchor_url',
                        'label' => __( 'Anchor URL', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [      
                        'item_icon'    => 'flaticon-sketch',
                        'item_title'    => __( 'Planning Stage', 'hus-companion' ),
                        'text'          => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.', 'hus-companion' ),
                        'anchor_title'  => __( 'Learn more', 'hus-companion' ),
                    ],
                    [      
                        'item_icon'    => 'flaticon-hotel',
                        'item_title'    => __( 'Planing Stage', 'hus-companion' ),
                        'text'          => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.', 'hus-companion' ),
                        'anchor_title'  => __( 'Learn more', 'hus-companion' ),
                    ],
                    [      
                        'item_icon'    => 'flaticon-headset',
                        'item_title'    => __( 'Support Section', 'hus-companion' ),
                        'text'          => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.', 'hus-companion' ),
                        'anchor_title'  => __( 'Learn more', 'hus-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End facilities content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Facilities Section', 'hus-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_facilitics_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'hus-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'icon_col', [
                'label' => __( 'Icon Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_facilitics_area .single_feature .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_icon_col', [
                'label' => __( 'On Hover Item Icon Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_facilitics_area .single_feature:hover .icon i' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'title_col', [
                'label' => __( 'Title Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_facilitics_area .single_feature h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'text_col', [
                'label' => __( 'Text Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_facilitics_area .single_feature p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'anchor_txt_color', [
                'label' => __( 'Anchor Text Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_facilitics_area .single_feature a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings   = $this->get_settings();
    $sec_bg  = !empty( $settings['sec_bg']['url'] ) ? $settings['sec_bg']['url'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $facilities = !empty( $settings['facilities'] ) ? $settings['facilities'] : '';
    $dynamic_class = ! is_front_page() ? ' facilites_page' : '';
    $dynamic_title_class = is_front_page() ? ' white_title' : '';
    ?>

    <style>
        .our_facilitics_area::before {
            background-image: url(<?php echo esc_url($sec_bg)?>);
        }
    </style>

    <!-- our_facilitics_area_start  -->
    <div class="our_facilitics_area<?php echo esc_attr($dynamic_class)?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80<?php echo esc_attr($dynamic_title_class)?>">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
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
                <?php 
                if( is_array( $facilities ) && count( $facilities ) > 0 ) {
                    foreach( $facilities as $item ) {
                        $item_icon = $item['item_icon'] ? $item['item_icon'] : '';
                        $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                        $text = ( !empty( $item['text'] ) ) ? $item['text'] : '';
                        $anchor_title = ( !empty( $item['anchor_title'] ) ) ? $item['anchor_title'] : '';
                        $anchor_url = ( !empty( $item['anchor_url']['url'] ) ) ? $item['anchor_url']['url'] : '';
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single_feature text-center">
                                <div class="icon">
                                    <i class="<?php echo esc_attr($item_icon)?>"></i>
                                </div>
                                <?php 
                                    if ( $item_title ) { 
                                        echo '<h3>'.esc_html( $item_title ).'</h3>';
                                    }
                                    if ( $text ) { 
                                        echo '<p>'.wp_kses_post( $text ).'</p>';
                                    }
                                    if ( $anchor_title ) { 
                                        echo '<a href="'.esc_url( $anchor_url ).'">'.esc_html( $anchor_title ).'</a>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- our_facilitics_area_end  -->
    <?php
    }
}