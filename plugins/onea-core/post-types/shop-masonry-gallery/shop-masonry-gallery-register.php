<?php

namespace OneaCore\CPT\ShopMasonryGallery;

use OneaCore\Lib;

/**
 * Class ShopMasonryGalleryRegister
 * @package ElatedCore\CPT\ShopMasonryGallery
 */
class ShopMasonryGalleryRegister implements Lib\PostTypeInterface {
	private $base;
	
	public function __construct() {
		$this->base    = 'shop-masonry-gallery';
		$this->taxBase = 'shop-masonry-gallery-category';
	}
	
	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	private function registerPostType() {
		$menuPosition = 5;
		$menuIcon     = 'dashicons-schedule';
		
		register_post_type( $this->base,
			array(
				'labels'        => array(
					'name'          => esc_html__( 'Onea Shop Masonry Gallery', 'onea-core' ),
					'all_items'     => esc_html__( 'Onea Shop Masonry Gallery Items', 'onea-core' ),
					'singular_name' => esc_html__( 'Shop Masonry Gallery Item', 'onea-core' ),
					'add_item'      => esc_html__( 'New Shop Masonry Gallery Item', 'onea-core' ),
					'add_new_item'  => esc_html__( 'Add New Shop Masonry Gallery Item', 'onea-core' ),
					'edit_item'     => esc_html__( 'Edit Shop Masonry Gallery Item', 'onea-core' )
				),
				'public'        => false,
				'show_in_menu'  => true,
				'rewrite'       => array( 'slug' => 'shop-masonry-gallery' ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array( 'title' ),
				'menu_icon'     => $menuIcon,
			)
		);
	}
	
	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Shop Masonry Gallery Categories', 'onea-core' ),
			'singular_name'     => esc_html__( 'Shop Masonry Gallery Category', 'onea-core' ),
			'search_items'      => esc_html__( 'Search Shop Masonry Gallery Categories', 'onea-core' ),
			'all_items'         => esc_html__( 'All Shop Masonry Gallery Categories', 'onea-core' ),
			'parent_item'       => esc_html__( 'Parent Shop Masonry Gallery Category', 'onea-core' ),
			'parent_item_colon' => esc_html__( 'Parent Shop Masonry Gallery Category:', 'onea-core' ),
			'edit_item'         => esc_html__( 'Edit Shop Masonry Gallery Category', 'onea-core' ),
			'update_item'       => esc_html__( 'Update Shop Masonry Gallery Category', 'onea-core' ),
			'add_new_item'      => esc_html__( 'Add New Shop Masonry Gallery Category', 'onea-core' ),
			'new_item_name'     => esc_html__( 'New Shop Masonry Gallery Category Name', 'onea-core' ),
			'menu_name'         => esc_html__( 'Shop Masonry Gallery Categories', 'onea-core' )
		);
		
		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'shop-masonry-gallery-category' )
		) );
	}
}