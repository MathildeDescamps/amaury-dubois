<?php
namespace OneaCore\CPT\Shortcodes\LinkedImage;

use OneaCore\Lib;

class LinkedImage implements Lib\ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'eltdf_linked_image';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' 						=> esc_html__('Linked Image', 'onea-core'),
					'base' 						=> $this->base,
					'as_child'					=> array('only' 	=> 'eltdf_linked_images'),
					'category' 					=> esc_html__('by ONEA', 'onea-core'),
					'icon' 						=> 'icon-wpb-linked-image-item extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'					=> array(
						array(
							'type' 		    => 'attach_image',
							'heading' 	    => esc_html__('Background Image', 'onea-core'),
							'param_name'    => 'image',
							'value' 	    => '',
						),
                        array(
                            'type' 		    => 'attach_image',
                            'heading' 	    => esc_html__('Foreground Image', 'onea-core'),
                            'param_name'    => 'foreground_image',
                            'value' 	    => '',
                        ),
                        array(
                            'type'          => 'textfield',
                            'heading'       => esc_html__('Foreground Image Bottom Padding', 'onea-core'),
                            'description'   => esc_html__('Eg 10px or 5%', 'onea-core'),
                            'param_name'    => 'foreground_image_padding',
                            'admin_label'   => true
                        ),
						array(
	                        'type'          => 'textfield',
	                        'heading'       => esc_html__('Link', 'onea-core'),
	                        'param_name'    => 'link',
	                        'admin_label'   => true
	                    ),
	                    array(
	                        'type'          => 'dropdown',
	                        'heading'       => esc_html__('Link Target', 'onea-core'),
	                        'param_name'    => 'link_target',
	                        'value'         => array(
							    esc_html__('Self', 'onea-core') => '_self',
							    esc_html__('Blank', 'onea-core') => '_blank'
	                        ),
	                        'admin_label'   => true,
	                        "dependency"    => array('element' => 'link', 'not_empty' => true),
	                    ),
						array(
	                        'type'        	=> 'textfield',
	                        'heading'     	=> esc_html__('Button Text', 'onea-core'),
	                        'param_name'  	=> 'button_text',
	                        'admin_label' 	=> true,
	                    ),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_link',
							'heading'    => esc_html__( 'Button Link', 'onea-core' ),
							'group'      => esc_html__( 'Button Style', 'onea-core' ),
							'dependency'	=> array('element' => 'button_text', 'not_empty' => true),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_target',
							'heading'    => esc_html__( 'Button Link Target', 'onea-core' ),
							'value'      => array_flip( onea_elated_get_link_target_array() ),
							'group'      => esc_html__( 'Button Style', 'onea-core' ),
							'dependency'	=> array('element' => 'button_text', 'not_empty' => true),
						),
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image' 		            => '',
            'foreground_image' 		    => '',
            'foreground_image_padding' 	=> '5px',
			'link' 			            => '',
			'link_target'	            => '_self',
			'button_text' 	            => 'View more',
			'button_link' 	            => '',
			'button_target'             => '',
		);
		
		$params = shortcode_atts($args, $atts);

        $params['fg_image_styles'] = $this->getFGImgStyles($params);
		extract($params);

		if(is_numeric($params['image'])) {
			$params['image'] = wp_get_attachment_url($params['image']);
			$params['image_alt'] = esc_attr(get_post_meta($params['image'], '_wp_attachment_image_alt', true));
		}

        if(is_numeric($params['foreground_image'])) {
            $params['foreground_image'] = wp_get_attachment_url($params['foreground_image']);
        }

		$params['button_params'] = $this->getButtonParameters($params);

		$html = onea_core_get_shortcode_module_template_part('templates/linked-image-template', 'linked-images', '', $params);

		return $html;
	}

	private function getButtonParameters( $params ) {
		$button_params_array = array();

		if ( ! empty( $params['button_text'] ) ) {
			$button_params_array['text'] = $params['button_text'];
		}

		if ( ! empty( $params['button_link'] ) ) {
			$button_params_array['link'] = $params['button_link'];
		}

		$button_params_array['target'] = ! empty( $params['button_target'] ) ? $params['button_target'] : '_self';


		return $button_params_array;
	}

    private function getFGImgStyles($params) {
        $styles = array();

        if (!empty($params['foreground_image_padding'])) {
            $styles[] = 'padding-bottom: ' . $params['foreground_image_padding'];
        }

        return implode(';', $styles);
    }
}