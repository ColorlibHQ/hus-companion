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
 * Hus elementor Certificates section widget.
 *
 * @since 1.0
 */
class Hus_Certificates extends Widget_Base {

	public function get_name() {
		return 'hus-certificates';
	}

	public function get_title() {
		return __( 'Certificates Section', 'hus-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'hus-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Certificates content ------------------------------
		$this->start_controls_section(
			'certificates_content',
			[
				'label' => __( 'Certificates contents', 'hus-companion' ),
			]
        );
        
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'hus-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 'Property <span>Certificates</span>'
            ]
        );
		$this->add_control(
            'certificates', [
                'label' => __( 'Create New Slider', 'hus-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name' => 'certificate_img',
                        'label' => __( 'Certificate Image', 'hus-companion' ),
                        'description' => __( 'Best size is 195x257', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'title',
                        'label' => __( 'Certificate Title', 'hus-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Certificate of Appreciation', 'hus-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'title'    => __( 'Certificate of Appreciation', 'hus-companion' ),
                    ],
                    [      
                        'title'    => __( 'Certificate of Architecture', 'hus-companion' ),
                    ],
                    [      
                        'title'    => __( 'Certificate of Engineer', 'hus-companion' ),
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
				'label' => __( 'Style Certificate Section', 'hus-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
            'title_col', [
                'label' => __( 'Title Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .property_certificates .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'highlighted_col', [
                'label' => __( 'Highlighted Color', 'hus-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .property_certificates .section_title h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_section();
	}
    
	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $certificates = !empty( $settings['certificates'] ) ? $settings['certificates'] : '';
    ?>

    <!-- property_certificates_start  -->
    <div class="property_certificates">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="section_title">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.wp_kses_post( nl2br($sec_title) ).'</h3>';
                            }
                        ?>
                        <div class="devider">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="certificate_listing d-flex justify-content-between align-items-center">
                        <?php 
                        if( is_array( $certificates ) && count( $certificates ) > 0 ) {
                            foreach( $certificates as $item ) {
                                $title = !empty( $item['title'] ) ? $item['title'] : '';
                                $certificate_img   = !empty( $item['certificate_img']['id'] ) ? wp_get_attachment_image( $item['certificate_img']['id'], 'hus_certificate_img_195x257', '', array( 'alt' => $title ) ) : '';
                                ?>
                                <div class="single_list">
                                    <?php
                                        if ( $certificate_img ) {
                                            echo '
                                            <div class="thumb">
                                                '.$certificate_img.'
                                            </div>
                                            ';
                                        }
                                    ?>
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
    <!-- property_certificates_end  -->
    <?php
    } 
}