<?php
function hus_page_metabox( $meta_boxes ) {

	$hus_prefix = '_hus_';
	$meta_boxes[] = array(
		'id'        => 'listing_metaboxes',
		'title'     => esc_html__( 'Other Options', 'hus-companion' ),
		'post_types'=> array( 'listing' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $hus_prefix . 'listing_address',
				'type'  => 'text',
				'required'  => true,
				'name'  => esc_html__( 'Address', 'hus-companion' ),
				'placeholder' => esc_html__( 'Detail Address for the Listing.', 'hus-companion' ),
			),
			// array(
			// 	'id'    => $hus_prefix . 'listing_country',
			// 	'type'  => 'text',
			// 	'required'  => true,
			// 	'name'  => esc_html__( 'Country', 'hus-companion' ),
			// 	'placeholder' => esc_html__( 'Country for the Listing.', 'hus-companion' ),
			// ),
			array(
				'id'            => $hus_prefix . 'listing_map',
				'type'          => 'osm',
				'required'  => true,
				'name'          => esc_html__( 'Location', 'hus-companion' ),
				'std'           => '-6.233406,-35.049906,15',
				'address_field' => $hus_prefix . 'listing_address',
			),
			array(
				'id'    => $hus_prefix . 'listing_price',
				'type'  => 'text',
				'required'  => true,
				'name'  => esc_html__( 'Price', 'hus-companion' ),
				'placeholder' => esc_html__( 'Ex: 1000000', 'hus-companion' ),
			),
			array(
				'id'    => $hus_prefix . 'phone_number',
				'type'  => 'text',
				'name'  => esc_html__( 'Phone', 'hus-companion' ),
				'placeholder' => esc_html__( 'Ex: 012 345 678', 'hus-companion' ),
			),
			array(
				'id'    => $hus_prefix . 'listing_email',
				'type'  => 'text',
				'name'  => esc_html__( 'Listing Email', 'hus-companion' ),
			),
			array(
				'id'    => $hus_prefix . 'listing_area',
				'type'  => 'text',
				'name'  => esc_html__( 'Area (Square Feet)', 'hus-companion' ),
				'placeholder' => esc_html__( 'Ex: 1500', 'hus-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'hus_page_metabox' );
