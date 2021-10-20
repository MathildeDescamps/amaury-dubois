<?php
namespace OneaCore\CPT\Shortcodes\ElementsHolder;

use OneaCore\Lib;

class ElementsHolderItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_elements_holder_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Elements Holder Item', 'onea-core' ),
					'base'                    => $this->base,
					'as_child'                => array( 'only' => 'eltdf_elements_holder' ),
					'as_parent'               => array( 'except' => 'vc_row, vc_accordion' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by ONEA', 'onea-core' ),
					'icon'                    => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'onea-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'onea-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'onea-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'background_image',
							'heading'    => esc_html__( 'Background Image', 'onea-core' )
						),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'background_surface_color',
                            'heading'    => esc_html__( 'Background Surface Color', 'onea-core' )
                        ),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding',
							'heading'     => esc_html__( 'Padding', 'onea-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' )
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'background_surface_padding',
                            'heading'     => esc_html__( 'Background Surface Padding', 'onea-core' ),
                            'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' )
                        ),
						array(
							'type'       => 'dropdown',
							'param_name' => 'horizontal_alignment',
							'heading'    => esc_html__( 'Horizontal Alignment', 'onea-core' ),
							'value'      => array(
								esc_html__( 'Left', 'onea-core' )   => 'left',
								esc_html__( 'Right', 'onea-core' )  => 'right',
								esc_html__( 'Center', 'onea-core' ) => 'center'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'vertical_alignment',
							'heading'    => esc_html__( 'Vertical Alignment', 'onea-core' ),
							'value'      => array(
								esc_html__( 'Middle', 'onea-core' ) => 'middle',
								esc_html__( 'Top', 'onea-core' )    => 'top',
								esc_html__( 'Bottom', 'onea-core' ) => 'bottom'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'animation',
							'heading'    => esc_html__( 'Animation Type', 'onea-core' ),
							'value'      => array(
								esc_html__( 'Default (No Animation)', 'onea-core' )   => '',
								esc_html__( 'Element Grow In', 'onea-core' )          => 'eltdf-grow-in',
								esc_html__( 'Element Fade In Down', 'onea-core' )     => 'eltdf-fade-in-down',
								esc_html__( 'Element From Fade', 'onea-core' )        => 'eltdf-element-from-fade',
								esc_html__( 'Element From Left', 'onea-core' )        => 'eltdf-element-from-left',
								esc_html__( 'Element From Right', 'onea-core' )       => 'eltdf-element-from-right',
								esc_html__( 'Expand Element From Left', 'onea-core' )        => 'eltdf-eh-expander eltdf-eh-expander-from-left',
								esc_html__( 'Expand Element From Right', 'onea-core' )       => 'eltdf-eh-expander eltdf-eh-expander-from-right',
								esc_html__( 'Element From Top', 'onea-core' )         => 'eltdf-element-from-top',
								esc_html__( 'Element From Bottom', 'onea-core' )      => 'eltdf-element-from-bottom',
								esc_html__( 'Element Flip In', 'onea-core' )          => 'eltdf-flip-in',
								esc_html__( 'Element X Rotate', 'onea-core' )         => 'eltdf-x-rotate',
								esc_html__( 'Element Z Rotate', 'onea-core' )         => 'eltdf-z-rotate',
								esc_html__( 'Element Y Translate', 'onea-core' )      => 'eltdf-y-translate',
								esc_html__( 'Element Fade In X Rotate', 'onea-core' ) => 'eltdf-fade-in-left-x-rotate',
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'animation_delay',
							'heading'    => esc_html__( 'Animation Delay (ms)', 'onea-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1367_1600',
							'heading'     => esc_html__( 'Padding on screen size between 1367px-1600px', 'onea-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'onea-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1025_1366',
							'heading'     => esc_html__( 'Padding on screen size between 1025px-1366px', 'onea-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'onea-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_769_1024',
							'heading'     => esc_html__( 'Padding on screen size between 768px-1024px', 'onea-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_681_768',
							'heading'     => esc_html__( 'Padding on screen size between 680px-768px', 'onea-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_481_680',
							'heading'     => esc_html__( 'Padding on screen size between 481px-680px', 'onea-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_480',
							'heading'     => esc_html__( 'Padding on screen size bellow 480px', 'onea-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'bgsurface_padding_1367_1600',
                            'heading'     => esc_html__( 'Background Surface Padding on screen size between 1367px-1600px', 'onea-core' ),
                            'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'onea-core' ),
                            'dependency' => Array( 'element' => 'background_surface_color', 'not_empty' => true  ),
                            'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
                        ),
						array(
                            'type'        => 'textfield',
                            'param_name'  => 'bgsurface_padding_1025_1366',
                            'heading'     => esc_html__( 'Background Surface Padding on screen size between 1025px-1366px', 'onea-core' ),
                            'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'onea-core' ),
                            'dependency' => Array( 'element' => 'background_surface_color', 'not_empty' => true  ),
                            'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
                        ),
						array(
                            'type'        => 'textfield',
                            'param_name'  => 'bgsurface_padding_769_1024',
                            'heading'     => esc_html__( 'Background Surface Padding on screen size between 768px-1024px', 'onea-core' ),
                            'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
                            'dependency' => Array( 'element' => 'background_surface_color', 'not_empty' => true  ),
                            'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
                        ),
						array(
                            'type'        => 'textfield',
                            'param_name'  => 'bgsurface_padding_681_768',
                            'heading'     => esc_html__( 'Background Surface Padding on screen size between 680px-768px', 'onea-core' ),
                            'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
                            'dependency' => Array( 'element' => 'background_surface_color', 'not_empty' => true  ),
                            'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
                        ),
						array(
                            'type'        => 'textfield',
                            'param_name'  => 'bgsurface_padding_481_680',
                            'heading'     => esc_html__( 'Background Surface Padding on screen size between 481px-680px', 'onea-core' ),
                            'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
                            'dependency' => Array( 'element' => 'background_surface_color', 'not_empty' => true  ),
                            'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
                        ),
						array(
                            'type'        => 'textfield',
                            'param_name'  => 'bgsurface_padding_480',
                            'heading'     => esc_html__( 'Background Surface Padding on screen size bellow 480px', 'onea-core' ),
                            'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'onea-core' ),
                            'dependency' => Array( 'element' => 'background_surface_color', 'not_empty' => true  ),
                            'group'       => esc_html__( 'Width & Responsiveness', 'onea-core' )
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'              => '',
			'background_color'          => '',
			'background_image'          => '',
            'background_surface_color'  => '',
			'item_padding'              => '',
            'background_surface_padding'=> '',
			'horizontal_alignment'      => '',
			'vertical_alignment'        => '',
			'animation'                 => '',
			'animation_delay'           => '',
			'item_padding_1367_1600'    => '',
			'item_padding_1025_1366'    => '',
			'item_padding_769_1024'     => '',
			'item_padding_681_768'      => '',
			'item_padding_481_680'      => '',
			'item_padding_480'          => '',
            'bgsurface_padding_1367_1600' => '',
            'bgsurface_padding_1025_1366' => '',
            'bgsurface_padding_769_1024'  => '',
            'bgsurface_padding_681_768'   => '',
            'bgsurface_padding_481_680'   => '',
            'bgsurface_padding_480'       => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['content']           = $content;
		$params['holder_rand_class'] = 'eltdf-eh-custom-' . mt_rand( 1000, 10000 );
        $params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_styles']     = $this->getHolderStyles( $params );
        $params['bgsurface_styles']  = $this->getBackgroundSurfaceStyles( $params );
        $params['bgsurface_color']  = $this->getBackgroundSurfaceColor( $params );
		$params['content_styles']    = $this->getContentStyles( $params );
		$params['holder_data']       = $this->getHolderData( $params );
        $params['bgsurface_data']    = $this->getBackgroundSurfaceData( $params );

		$html = onea_core_get_shortcode_module_template_part( 'templates/elements-holder-item-template', 'elements-holder', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['vertical_alignment'] ) ? 'eltdf-vertical-alignment-' . $params['vertical_alignment'] : '';
		$holderClasses[] = ! empty( $params['horizontal_alignment'] ) ? 'eltdf-horizontal-alignment-' . $params['horizontal_alignment'] : '';
		$holderClasses[] = ! empty( $params['animation'] ) ? $params['animation'] : '';
        $holderClasses[] = $params['holder_rand_class'];
		
		return implode( ' ', $holderClasses );
	}

	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		if ( ! empty( $params['background_image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['background_image'] ) . ')';
		}

        if ( ! empty( $params['background_size'] ) ) {
            $styles[] = 'background-size: '. $params['background_size'];
        }

        if ( ! empty( $params['background_position'] ) ) {
            $styles[] = 'background-position: '. $params['background_position'];
        }
		
		return implode( ';', $styles );
	}

    private function getBackgroundSurfaceStyles( $params ) {
        $styles = array();

        if ( ! empty( $params['background_surface_padding'] ) ) {
            $styles[] = 'padding: '. $params['background_surface_padding'];
        }

        return implode( ';', $styles );
    }

    private function getBackgroundSurfaceColor( $params ) {
        $styles = array();

        if ( ! empty( $params['background_surface_color'] ) ) {
            $styles[] = 'background-color: '. $params['background_surface_color'];
        }

        return implode( ';', $styles );
    }
	
	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['item_padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['item_padding'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getHolderData( $params ) {
		$data                    = array();
		$data['data-item-class'] = $params['holder_rand_class'];

		if ( ! empty( $params['animation'] ) ) {
			$data['data-animation'] = $params['animation'];
		}

		if ( $params['animation_delay'] !== '' ) {
			$data['data-animation-delay'] = esc_attr( $params['animation_delay'] );
		}

		if ( $params['item_padding_1367_1600'] !== '' ) {
			$data['data-1367-1600'] = $params['item_padding_1367_1600'];
		}

		if ( $params['item_padding_1025_1366'] !== '' ) {
			$data['data-1025-1366'] = $params['item_padding_1025_1366'];
		}

		if ( $params['item_padding_769_1024'] !== '' ) {
			$data['data-769-1024'] = $params['item_padding_769_1024'];
		}

		if ( $params['item_padding_681_768'] !== '' ) {
			$data['data-681-768'] = $params['item_padding_681_768'];
		}

		if ( $params['item_padding_481_680'] !== '' ) {
			$data['data-481-680'] = $params['item_padding_481_680'];
		}

		if ( $params['item_padding_480'] !== '' ) {
			$data['data-480'] = $params['item_padding_480'];
		}

		return $data;
	}

    private function getBackgroundSurfaceData( $params ) {
        $data                    = array();

        if ( $params['bgsurface_padding_1367_1600'] !== '' ) {
            $data['data-1367-1600'] = $params['bgsurface_padding_1367_1600'];
        }

        if ( $params['bgsurface_padding_1025_1366'] !== '' ) {
            $data['data-1025-1366'] = $params['bgsurface_padding_1025_1366'];
        }

        if ( $params['bgsurface_padding_769_1024'] !== '' ) {
            $data['data-769-1024'] = $params['bgsurface_padding_769_1024'];
        }

        if ( $params['bgsurface_padding_681_768'] !== '' ) {
            $data['data-681-768'] = $params['bgsurface_padding_681_768'];
        }

        if ( $params['bgsurface_padding_481_680'] !== '' ) {
            $data['data-481-680'] = $params['bgsurface_padding_481_680'];
        }

        if ( $params['bgsurface_padding_480'] !== '' ) {
            $data['data-480'] = $params['bgsurface_padding_480'];
        }

        return $data;
    }
}
