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
 * Hus elementor apartments section widget.
 *
 * @since 1.0
 */
class Hus_Apartments extends Widget_Base {

	public function get_name() {
		return 'hus-apartments';
	}

	public function get_title() {
		return __( 'Apartments Section', 'hus-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'hus-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  apartments content ------------------------------
		$this->start_controls_section(
			'apartments_content',
			[
				'label' => __( 'Apartments contents', 'hus-companion' ),
			]
        );
        
		$this->add_control(
            'apartments', [
                'label' => __( 'Create New Slider', 'hus-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name' => 'apartment_img',
                        'label' => __( 'Image', 'hus-companion' ),
                        'description' => __( 'Best size is 610x593', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'price',
                        'label' => __( 'Price', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '35.000', 'hus-companion' ),
                    ],
                    [
                        'name' => 'title',
                        'label' => __( 'Title', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Colorful little apartment', 'hus-companion' ),
                    ],
                    [
                        'name' => 'item_url',
                        'label' => __( 'Details URL', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'field1',
                        'label' => __( 'Field 1', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '2BD', 'hus-companion' ),
                    ],
                    [
                        'name' => 'field2',
                        'label' => __( 'Field 2', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '2BA', 'hus-companion' ),
                    ],
                    [
                        'name' => 'field3',
                        'label' => __( 'Field 3', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '920 SF', 'hus-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'price'     => __( '35.000', 'hus-companion' ),
                        'title'     => __( 'Colorful little apartment', 'hus-companion' ),
                        'field1'    => __( '2BD', 'hus-companion' ),
                        'field2'    => __( '2BA', 'hus-companion' ),
                        'field3'    => __( '920 SF', 'hus-companion' ),
                    ],
                    [      
                        'price'     => __( '35.000', 'hus-companion' ),
                        'title'     => __( 'Colorful little apartment', 'hus-companion' ),
                        'field1'    => __( '2BD', 'hus-companion' ),
                        'field2'    => __( '2BA', 'hus-companion' ),
                        'field3'    => __( '920 SF', 'hus-companion' ),
                    ],
                    [      
                        'price'     => __( '35.000', 'hus-companion' ),
                        'title'     => __( 'Colorful little apartment', 'hus-companion' ),
                        'field1'    => __( '2BD', 'hus-companion' ),
                        'field2'    => __( '2BA', 'hus-companion' ),
                        'field3'    => __( '920 SF', 'hus-companion' ),
                    ],
                    [      
                        'price'     => __( '35.000', 'hus-companion' ),
                        'title'     => __( 'Colorful little apartment', 'hus-companion' ),
                        'field1'    => __( '2BD', 'hus-companion' ),
                        'field2'    => __( '2BA', 'hus-companion' ),
                        'field3'    => __( '920 SF', 'hus-companion' ),
                    ],
                    [      
                        'price'     => __( '35.000', 'hus-companion' ),
                        'title'     => __( 'Colorful little apartment', 'hus-companion' ),
                        'field1'    => __( '2BD', 'hus-companion' ),
                        'field2'    => __( '2BA', 'hus-companion' ),
                        'field3'    => __( '920 SF', 'hus-companion' ),
                    ],
                    [      
                        'price'     => __( '35.000', 'hus-companion' ),
                        'title'     => __( 'Colorful little apartment', 'hus-companion' ),
                        'field1'    => __( '2BD', 'hus-companion' ),
                        'field2'    => __( '2BA', 'hus-companion' ),
                        'field3'    => __( '920 SF', 'hus-companion' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

	}
    
	protected function render() {
        $settings  = $this->get_settings();
        $apartments = !empty( $settings['apartments'] ) ? $settings['apartments'] : '';
        
        if ( is_front_page() ) {
            $this->load_widget_script();
            ?>
            <div class="appertment_area">
                <div class="appertment_active owl-carousel">
                    <?php $this->hus_get_all_apartments($apartments, 'yes')?>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="appertment_area appertment_area2">
                <div class="container">
                    <div class="row">
                        <?php $this->hus_get_all_apartments($apartments, 'no')?>
                    </div>
                </div>
            </div>
            <?php
        }
    } 

    public function hus_get_all_apartments($apartments, $is_frontpage) {
        if( is_array( $apartments ) && count( $apartments ) > 0 ) {
            foreach( $apartments as $item ) {
                $title = !empty( $item['title'] ) ? $item['title'] : '';
                $apartment_img   = !empty( $item['apartment_img']['id'] ) ? wp_get_attachment_image( $item['apartment_img']['id'], 'hus_apartment_img_610x593', '', array( 'alt' => $title ) ) : '';
                $price = !empty( $item['price'] ) ? $item['price'] : '';
                $item_url = !empty( $item['item_url']['url'] ) ? $item['item_url']['url'] : '';
                $field1 = !empty( $item['field1'] ) ? $item['field1'] : '';
                $field2 = !empty( $item['field2'] ) ? $item['field2'] : '';
                $field3 = !empty( $item['field3'] ) ? $item['field3'] : '';
                $dynamic_markup_start = ($is_frontpage == 'yes') ? '<div class="single_appertment">' : '<div class="col-lg-4 col-md-6"><div class="single_appertment mb-30">';
                $dynamic_markup_end = ($is_frontpage == 'yes') ? '</div>' : '</div></div>';
                
                echo $dynamic_markup_start;
                    if ( $apartment_img ) {
                        echo '
                        <div class="thumb">
                            '.$apartment_img.'
                        </div>
                        ';
                    }
                    
                    echo '
                        <div class="appertment_info">
                            <span>$'.esc_html($price).'</span>
                            <a herf="'.esc_url($item_url).'"><h5>'.esc_html($title).'</h5></a>
                        
                            <ul>
                                <li>'.esc_html($field1).'</li>
                                <li>'.esc_html($field2).'</li>
                                <li>'.esc_html($field3).'</li>
                            </ul>
                        </div>
                    ';
                echo $dynamic_markup_end;
            }
        }
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            //about-pro-active
            $('.appertment_active').owlCarousel({
            loop:true,
            margin:30,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                767:{
                    items:2,
                    nav:false
                },
                992:{
                    items:2,
                },
                1200:{
                    items:3
                }
            }
            });     
        })(jQuery);
        </script>
        <?php 
        }
    }	
}