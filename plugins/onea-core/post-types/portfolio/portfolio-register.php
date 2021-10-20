<?php

namespace OneaCore\CPT\Portfolio;

use OneaCore\Lib\PostTypeInterface;

/**
 * Class PortfolioRegister
 * @package OneaCore\CPT\Portfolio
 */
class PortfolioRegister implements PostTypeInterface {
	private $base;
	private $taxBase;
	private $tagBase;
	
	public function __construct() {
		$this->base    = 'portfolio-item';
		$this->taxBase = 'portfolio-category';
		$this->tagBase = 'portfolio-tag';
		
		add_filter( 'archive_template', array( $this, 'registerArchiveTemplate' ) );
		add_filter( 'single_template', array( $this, 'registerSingleTemplate' ) );
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
		$this->registerTagTax();
	}
	
	/**
	 * Registers portfolio archive template if one does'nt exists in theme.
	 * Hooked to archive_template filter
	 *
	 * @param $archive string current template
	 *
	 * @return string string changed template
	 */
	public function registerArchiveTemplate( $archive ) {
		global $post;
		
		if ( ! empty( $post ) && $post->post_type == $this->base ) {
			if ( ! file_exists( get_template_directory() . '/archive-' . $this->base . '.php' ) ) {
				return ONEA_CORE_CPT_PATH . '/portfolio/templates/archive-' . $this->base . '.php';
			}
		}
		
		return $archive;
	}
	
	/**
	 * Registers portfolio single template if one does'nt exists in theme.
	 * Hooked to single_template filter
	 *
	 * @param $single string current template
	 *
	 * @return string string changed template
	 */
	public function registerSingleTemplate( $single ) {
		global $post;
		
		if ( ! empty( $post ) && $post->post_type == $this->base ) {
			if ( ! file_exists( get_template_directory() . '/single-portfolio-item.php' ) ) {
				return ONEA_CORE_CPT_PATH . '/portfolio/templates/single-' . $this->base . '.php';
			}
		}
		
		return $single;
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	private function registerPostType() {
		$menuPosition = 5;
		$menuIcon     = 'dashicons-screenoptions';
		$slug         = $this->base;
		
		if ( onea_core_theme_installed() ) {
			if ( onea_elated_options()->getOptionValue( 'portfolio_single_slug' ) ) {
				$slug = onea_elated_options()->getOptionValue( 'portfolio_single_slug' );
			}
		}
		
		register_post_type( $this->base,
			array(
				'labels'        => array(
					'name'          => esc_html__( 'Onea Portfolio', 'onea-core' ),
					'singular_name' => esc_html__( 'Portfolio Item', 'onea-core' ),
					'add_item'      => esc_html__( 'New Portfolio Item', 'onea-core' ),
					'add_new_item'  => esc_html__( 'Add New Portfolio Item', 'onea-core' ),
					'edit_item'     => esc_html__( 'Edit Portfolio Item', 'onea-core' )
				),
				'public'        => true,
				'has_archive'   => true,
				'rewrite'       => array( 'slug' => $slug ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'supports'      => array(
					'author',
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'page-attributes',
					'comments'
				),
				'menu_icon'     => $menuIcon
			)
		);
	}
	
	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Portfolio Categories', 'onea-core' ),
			'singular_name'     => esc_html__( 'Portfolio Category', 'onea-core' ),
			'search_items'      => esc_html__( 'Search Portfolio Categories', 'onea-core' ),
			'all_items'         => esc_html__( 'All Portfolio Categories', 'onea-core' ),
			'parent_item'       => esc_html__( 'Parent Portfolio Category', 'onea-core' ),
			'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'onea-core' ),
			'edit_item'         => esc_html__( 'Edit Portfolio Category', 'onea-core' ),
			'update_item'       => esc_html__( 'Update Portfolio Category', 'onea-core' ),
			'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'onea-core' ),
			'new_item_name'     => esc_html__( 'New Portfolio Category Name', 'onea-core' ),
			'menu_name'         => esc_html__( 'Portfolio Categories', 'onea-core' )
		);
		
		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'portfolio-category' )
		) );
	}
	
	/**
	 * Registers custom tag taxonomy with WordPress
	 */
	private function registerTagTax() {
		$labels = array(
			'name'              => esc_html__( 'Portfolio Tags', 'onea-core' ),
			'singular_name'     => esc_html__( 'Portfolio Tag', 'onea-core' ),
			'search_items'      => esc_html__( 'Search Portfolio Tags', 'onea-core' ),
			'all_items'         => esc_html__( 'All Portfolio Tags', 'onea-core' ),
			'parent_item'       => esc_html__( 'Parent Portfolio Tag', 'onea-core' ),
			'parent_item_colon' => esc_html__( 'Parent Portfolio Tags:', 'onea-core' ),
			'edit_item'         => esc_html__( 'Edit Portfolio Tag', 'onea-core' ),
			'update_item'       => esc_html__( 'Update Portfolio Tag', 'onea-core' ),
			'add_new_item'      => esc_html__( 'Add New Portfolio Tag', 'onea-core' ),
			'new_item_name'     => esc_html__( 'New Portfolio Tag Name', 'onea-core' ),
			'menu_name'         => esc_html__( 'Portfolio Tags', 'onea-core' )
		);
		
		register_taxonomy( $this->tagBase, array( $this->base ), array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'portfolio-tag' )
		) );
	}
}