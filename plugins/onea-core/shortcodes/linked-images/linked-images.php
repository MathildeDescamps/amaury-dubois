<?php
namespace OneaCore\CPT\Shortcodes\LinkedImage;

use OneaCore\Lib;

class LinkedImages implements Lib\ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'eltdf_linked_images';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'		=> esc_html__('Linked Images', 'one-core'),
			'base'		=> $this->base,
			'icon'		=> 'icon-wpb-linked-image extended-custom-icon',
			'category'	=> esc_html__('by ONEA', 'one-core'),
			'as_parent'	=> array('only' => 'eltdf_linked_image'),
			'js_view'	=> 'VcColumnView',
			'params'	=> array(
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Number of Linked Images', 'one-core'),
					'admin_label'	=> true,
					'param_name'	=> 'number_of_linked_images',
					'value'			=> array(
                        esc_html__('1 Image', 'one-core')  => 'one-image',
                        esc_html__('2 Images', 'one-core') => 'two-images',
						esc_html__('3 Images', 'one-core') => 'three-images',
						esc_html__('4 Images', 'one-core') => 'four-images',
						esc_html__('5 Images', 'one-core') => 'five-images',
					),
					'save_always'   => true,
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'space_between_items',
					'heading'     => esc_html__( 'Space Between Items', 'onea-core' ),
					'value'       => array_flip( onea_elated_get_space_between_items_array() ),
					'save_always' => true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Full Height Images', 'one-core'),
					'admin_label'	=> true,
					'param_name'	=> 'fullheight',
					'value'			=> array(
						esc_html__('Yes', 'one-core')	=> 'yes',
						esc_html__('No', 'one-core')	=> 'no',
					),
					'save_always'	=> true,
				),
                array(
                    'type'        	=> 'dropdown',
                    'heading'     	=> esc_html__('Content Vertical Position', 'onea-core'),
                    'param_name'  	=> 'content_position',
                    'value'         => array(
                        esc_html__('Default', 'onea-core') => '',
                        esc_html__('Predefined', 'onea-core') => 'predefined'
                    ),
                    'admin_label' 	=> true,
                    'dependency'	=> array('element' => 'fullheight', 'value' => array( 'yes' ) ),
                ),
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_linked_images' => '',
			'space_between_items' 	  => '',
			'fullheight' 			  => 'yes',
            'content_position' => ''
		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$linked_images_data = $this->getLinkedImagesData($params);
		$linked_images_class = $this->getLinkedImagesClasses($params);

		$html						= '';

		$html .= '<div class="' . $linked_images_class . '" '. onea_elated_get_inline_attrs($linked_images_data) .'>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getLinkedImagesData($params) {

		$linked_images_data = array();

		$linked_images_data['data-full-height'] = ($params['fullheight'] !== '') ? $params['fullheight'] : 'yes';

		return $linked_images_data;

	}

	/**
     * Returns array of HTML classes for Linked Images
     *
     * @param $params
     *
     * @return array
     */
    private function getLinkedImagesClasses($params) {
        $linked_images_classes = array();
		$linked_images_classes[] = 'eltdf-linked-images';

		if($params['number_of_linked_images'] != ''){
			$linked_images_classes[] = 'eltdf-linked-images-'.$params['number_of_linked_images'] ;
		}

	    if($params['space_between_items'] != ''){
		    $linked_images_classes[] = 'eltdf-linked-images-'.$params['space_between_items'] . '-space' ;
	    }

		if($params['fullheight'] == 'yes') {
            $linked_images_classes[] ='eltdf-linked-images-full-height';
        }

        if($params['content_position'] == 'predefined') {
            $linked_images_classes[] ='eltdf-predefined-content-position';
        }

        $linked_images_classes = implode(' ', $linked_images_classes);

        return $linked_images_classes;
    }

}