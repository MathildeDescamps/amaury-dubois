<?php
namespace OneaCore\CPT\Shortcodes\Banner;

use OneaCore\Lib;

class Banner implements Lib\ShortcodeInterface
{
    private $base;

    public function __construct() {
        $this->base = 'eltdf_banner';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name'                      => esc_html__('Banner', 'onea-core'),
                    'base'                      => $this->getBase(),
                    'category'                  => esc_html__('by ONEA', 'onea-core'),
                    'icon'                      => 'icon-wpb-banner extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array(
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'custom_class',
                            'heading'     => esc_html__('Custom CSS Class', 'onea-core'),
                            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS', 'onea-core')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'skin',
                            'heading'    => esc_html__('Skin', 'onea-core'),
                            'value'      => array(
                                esc_html__('Default', 'onea-core') => '',
                                esc_html__('Light', 'onea-core')   => 'light',
                            ),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'full_height',
                            'heading'    => esc_html__('Enable Full Height of Outer Holder', 'onea-core'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, false))
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'full_height_responsive',
                            'heading'     => esc_html__('Disable Full Height', 'onea-core'),
                            'value'       => array(
                                esc_html__('Below 1024px', 'onea-core') => '1024',
                                esc_html__('Below 992px', 'onea-core')  => '992',
                                esc_html__('Below 768px', 'onea-core')  => '768',
                                esc_html__('Below 680px', 'onea-core')  => '680',

                            ),
                            'save_always' => true,
                            'dependency'  => array('element' => 'full_height', 'value' => array('yes')),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'hover_animation',
                            'heading'    => esc_html__('Enable Animation on MouseOver', 'onea-core'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true))
                        ),
                        array(
                                'type'        => 'dropdown',
                                'param_name'  => 'hover_style',
                                'heading'     => esc_html__('MouseOver Animation Effect', 'onea-core'),
                                'value'       => array(
                                        esc_html__('Default', 'onea-core') => '',
                                        esc_html__('Larger Faster movement', 'onea-core')  => 'large-fast',
                                        esc_html__('Larger Slower movement', 'onea-core')  => 'large-slow',
                                        esc_html__('Smaller Slower movement', 'onea-core')  => 'small-slow',

                                ),
                                'save_always' => true,
                                'dependency'  => array('element' => 'hover_animation', 'value' => array('yes')),
                        ),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'image',
                            'heading'     => esc_html__('Image', 'onea-core'),
                            'description' => esc_html__('Select image from media library', 'onea-core'),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'info_position_vertical',
                            'heading'    => esc_html__('Info Position Vertical', 'onea-core'),
                            'value'      => array(
                                esc_html__('Default', 'onea-core') => '',
                                esc_html__('Top', 'onea-core')     => 'top',
                                esc_html__('Middle', 'onea-core')  => 'middle',
                                esc_html__('Bottom', 'onea-core')  => 'bottom',
                            ),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'info_position_horizontal',
                            'heading'    => esc_html__('Info Position Horizontal', 'onea-core'),
                            'value'      => array(
                                esc_html__('Default', 'onea-core') => '',
                                esc_html__('Left', 'onea-core')    => 'left',
                                esc_html__('Center', 'onea-core')  => 'center',
                                esc_html__('Right', 'onea-core')   => 'right',
                            ),
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'info_content_padding',
                            'heading'     => esc_html__('Info Content Padding', 'onea-core'),
                            'description' => esc_html__('Please insert padding in format top right bottom left', 'onea-core')
                        ),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'inner_image',
                            'heading'     => esc_html__('Inner Image', 'onea-core'),
                            'description' => esc_html__('Select image from media library', 'onea-core')
                        ),
                        array(
                            'type'          => 'textfield',
                            'param_name'    => 'inner_image_padding',
                            'heading'       => esc_html__('Inner Image Padding', 'onea-core'),
                            'description'   => esc_html__('Please insert padding in format top right bottom left', 'onea-core'),
                            'dependency'  => array('element' => 'inner_image', 'not_empty' => true),
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title',
                            'heading'    => esc_html__('Title', 'onea-core'),
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'title_break_words',
                            'heading'     => esc_html__('Position of Line Break', 'onea-core'),
                            'description' => esc_html__('Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter "3")', 'onea-core'),
                            'dependency'  => array('element' => 'title', 'not_empty' => true),
                            'group'       => esc_html__('Title Style', 'onea-core')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'title_tag',
                            'heading'     => esc_html__('Title Tag', 'onea-core'),
                            'value'       => array_flip(onea_elated_get_title_tag(true, array('p' => 'p'))),
                            'save_always' => true,
                            'dependency'  => array('element' => 'title', 'not_empty' => true),
                            'group'       => esc_html__('Title Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'title_color',
                            'heading'    => esc_html__('Title Color', 'onea-core'),
                            'dependency' => array('element' => 'title', 'not_empty' => true),
                            'group'      => esc_html__('Title Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_top_margin',
                            'heading'    => esc_html__('Title Top Margin (px)', 'onea-core'),
                            'dependency' => array('element' => 'title', 'not_empty' => true),
                            'group'      => esc_html__('Title Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_bottom_margin',
                            'heading'    => esc_html__('Title Bottom Margin (px)', 'onea-core'),
                            'dependency' => array('element' => 'title', 'not_empty' => true),
                            'group'      => esc_html__('Title Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_font_size',
                            'heading'    => esc_html__('Title Font Size (px)', 'onea-core'),
                            'dependency' => array('element' => 'title', 'not_empty' => true),
                            'group'      => esc_html__('Title Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_line_height',
                            'heading'    => esc_html__('Title Line Height (px)', 'onea-core'),
                            'dependency' => array('element' => 'title', 'not_empty' => true),
                            'group'      => esc_html__('Title Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'subtitle',
                            'heading'    => esc_html__('Subtitle', 'onea-core'),
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'subtitle_tag',
                            'heading'     => esc_html__('Subtitle Tag', 'onea-core'),
                            'value'       => array_flip(onea_elated_get_title_tag(true, array('p' => 'p'))),
                            'save_always' => true,
                            'dependency'  => array('element' => 'subtitle', 'not_empty' => true),
                            'group'       => esc_html__('Subtitle Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'subtitle_font_size',
                            'heading'    => esc_html__('Subtile Font Size (px)', 'onea-core'),
                            'dependency' => array('element' => 'subtitle', 'not_empty' => true),
                            'group'      => esc_html__('Subtitle Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'subtitle_top_margin',
                            'heading'    => esc_html__('Subtitle Top Margin (px)', 'onea-core'),
                            'dependency' => array('element' => 'subtitle', 'not_empty' => true),
                            'group'      => esc_html__('Subtitle Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'subtitle_bottom_margin',
                            'heading'    => esc_html__('Subtitle Bottom Margin (px)', 'onea-core'),
                            'dependency' => array('element' => 'subtitle', 'not_empty' => true),
                            'group'      => esc_html__('Subtitle Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'subtitle_color',
                            'heading'    => esc_html__('Subtitle Color', 'onea-core'),
                            'dependency' => array('element' => 'subtitle', 'not_empty' => true),
                            'group'      => esc_html__('Subtitle Style', 'onea-core')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'display_button',
                            'heading'     => esc_html__('Display Button', 'onea-core'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'button_text',
                            'heading'     => esc_html__('Button Text', 'onea-core'),
                            'value'       => esc_html__('Button Text', 'onea-core'),
                            'save_always' => true,
                            'dependency' => array('element' => 'display_button',  'value' => array('yes')),
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'button_top_margin',
                            'heading'    => esc_html__('Button Top Margin (px)', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'button_type',
                            'heading'     => esc_html__('Button Type', 'onea-core'),
                            'value'       => array(
                                esc_html__('Solid', 'onea-core')   => 'solid',
                                esc_html__('Outline', 'onea-core') => 'outline',
                                esc_html__('Simple', 'onea-core')  => 'simple'
                            ),
                            'save_always' => true,
                            'group'       => esc_html__('Button Style', 'onea-core'),
                            'dependency'  => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'button_size',
                            'heading'     => esc_html__('Button Size', 'onea-core'),
                            'value'       => array(
                                esc_html__('Default', 'onea-core') => '',
                                esc_html__('Small', 'onea-core')   => 'small',
                                esc_html__('Medium', 'onea-core')  => 'medium',
                                esc_html__('Large', 'onea-core')   => 'large'
                            ),
                            'save_always' => true,
                            'dependency'  => array('element' => 'button_type', 'value' => array('solid', 'outline')),
                            'group'       => esc_html__('Button Style', 'onea-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'button_link',
                            'heading'    => esc_html__('Button Link', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'button_target',
                            'heading'    => esc_html__('Button Link Target', 'onea-core'),
                            'value'      => array_flip(onea_elated_get_link_target_array()),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'button_color',
                            'heading'    => esc_html__('Button Color', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'button_hover_color',
                            'heading'    => esc_html__('Button Hover Color', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'button_background_color',
                            'heading'    => esc_html__('Button Background Color', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_type', 'value' => array('solid')),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'button_hover_background_color',
                            'heading'    => esc_html__('Button Hover Background Color', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'button_border_color',
                            'heading'    => esc_html__('Button Border Color', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'button_hover_border_color',
                            'heading'    => esc_html__('Button Hover Border Color', 'onea-core'),
                            'group'      => esc_html__('Button Style', 'onea-core'),
                            'dependency' => array('element' => 'button_text', 'not_empty' => true),
                        ),
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'custom_class'                  => '',
            'skin'                          => '',
            'full_height'                   => '',
            'full_height_responsive'        => '',
            'hover_animation'               => 'yes',
            'hover_style'                   => '',
            'image'                         => '',
            'info_position_vertical'        => '',
            'info_position_horizontal'      => '',
            'info_content_padding'          => '',
            'inner_image'                   => '',
            'inner_image_padding'           => '',
            'title'                         => '',
            'title_break_words'             => '',
            'title_tag'                     => 'h2',
            'title_font_size'               => '',
            'title_line_height'             => '',
            'title_color'                   => '',
            'title_top_margin'              => '',
            'title_bottom_margin'           => '',
            'subtitle'                      => '',
            'subtitle_tag'                  => 'h5',
            'subtitle_color'                => '',
            'subtitle_font_size'            => '',
            'subtitle_top_margin'           => '',
            'subtitle_bottom_margin'        => '',
            'display_button'                => 'yes',
            'button_text'                   => '',
            'button_top_margin'             => '',
            'button_type'                   => 'solid',
            'button_size'                   => 'medium',
            'button_link'                   => '',
            'button_target'                 => '_self',
            'button_color'                  => '',
            'button_hover_color'            => '',
            'button_background_color'       => '',
            'button_hover_background_color' => '',
            'button_border_color'           => '',
            'button_hover_border_color'     => ''
        );
        $params = shortcode_atts($args, $atts);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['holder_style'] = $this->getHolderStyles($params);
        $params['overlay_styles'] = $this->getOverlayStyles($params);
        $params['inner_image_styles'] = $this->getInnerImageStyles($params);
        $params['title'] = $this->getModifiedTitle($params);
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
        $params['title_styles'] = $this->getTitleStyles($params);
        $params['subtitle_tag'] = !empty($params['subtitle_tag']) ? $params['subtitle_tag'] : $args['subtitle_tag'];
        $params['subtitle_styles'] = $this->getSubitleStyles($params);
        $params['button_styles'] = $this->getLinkStyles($params);
        $params['button_params'] = $this->getButtonParameters($params);

        $html = onea_core_get_shortcode_module_template_part('templates/banner', 'banner', '', $params);

        return $html;
    }

    private function getHolderClasses($params) {
        $holderClasses = array();

        $holderClasses[] = !empty($params['custom_class']) ? esc_attr($params['custom_class']) : '';
        $holderClasses[] = !empty($params['skin']) ? 'eltdf-banner-skin-' . esc_attr($params['skin']) : '';
        $holderClasses[] = !empty($params['info_position_horizontal']) ? 'eltdf-banner-horizontal-' . $params['info_position_horizontal'] : '';
        $holderClasses[] = !empty($params['info_position_vertical']) ? 'eltdf-banner-vertical-' . $params['info_position_vertical'] : '';
        $holderClasses[] = !empty($params['full_height_responsive']) ? 'eltdf-banner-responsive-' . $params['full_height_responsive'] : '';
        $holderClasses[] = $params['full_height'] == 'yes' ? 'eltdf-banner-full-height' : '';
        $holderClasses[] = $params['hover_animation'] !== 'yes' ? 'eltdf-banner-no-hover-anim' : '';
        $holderClasses[] = !empty($params['hover_style']) ? 'eltdf-banner-hover-' . $params['hover_style'] : '';

        return implode(' ', $holderClasses);
    }

    private function getHolderStyles($params) {
        $styles = array();

        if ($params['full_height'] === 'yes') {
            $styles[] = 'background-image: url(' . wp_get_attachment_url($params['image']) . ')';
        }

        return implode(';', $styles);
    }

    private function getOverlayStyles($params) {
        $styles = array();

        if (!empty($params['info_content_padding'])) {
            $styles[] = 'padding: ' . $params['info_content_padding'];
        }

        return implode(';', $styles);
    }

    private function getInnerImageStyles($params) {
        $styles = array();

        if (!empty($params['inner_image_padding'])) {
            $styles[] = 'padding: ' . $params['inner_image_padding'];
        }

        return implode(';', $styles);
    }

    private function getModifiedTitle($params) {
        $title = $params['title'];
        $title_break_words = str_replace(' ', '', $params['title_break_words']);

        if (!empty($title)) {
            $split_title = explode(' ', $title);

            if (!empty($title_break_words)) {
                if (!empty($split_title[$title_break_words - 1])) {
                    $split_title[$title_break_words - 1] = $split_title[$title_break_words - 1] . '<br />';
                }
            }

            $title = implode(' ', $split_title);
        }

        return $title;
    }

    private function getTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_color'])) {
            $styles[] = 'color: ' . $params['title_color'];
        }

        if (!empty($params['title_font_size'])) {
            $styles[] = 'font-size: ' . onea_elated_filter_px($params['title_font_size']) . 'px';
        }

        if (!empty($params['title_line_height'])) {
            $styles[] = 'line-height: ' . onea_elated_filter_px($params['title_line_height']) . 'px';
        }

        if (!empty($params['title_top_margin'])) {
            $styles[] = 'margin-top: ' . onea_elated_filter_px($params['title_top_margin']) . 'px';
        }

        if (!empty($params['title_bottom_margin'])) {
            $styles[] = 'margin-bottom: ' . onea_elated_filter_px($params['title_bottom_margin']) . 'px';
        }

        return implode(';', $styles);
    }

    private function getSubitleStyles($params) {
        $styles = array();

        if (!empty($params['subtitle_color'])) {
            $styles[] = 'color: ' . $params['subtitle_color'];
        }

        if (!empty($params['subtitle_font_size'])) {
            $styles[] = 'font-size: ' . onea_elated_filter_px($params['subtitle_font_size']);
        }

        if (!empty($params['subtitle_top_margin'])) {
            $styles[] = 'margin-top: ' . onea_elated_filter_px($params['subtitle_top_margin']) . 'px';
        }

        if (!empty($params['subtitle_bottom_margin'])) {
            $styles[] = 'margin-bottom: ' . onea_elated_filter_px($params['subtitle_bottom_margin']) . 'px';
        }

        return implode(';', $styles);
    }

    private function getLinkStyles($params) {
        $styles = array();

        if (!empty($params['button_top_margin'])) {
            $styles[] = 'margin-top: ' . onea_elated_filter_px($params['button_top_margin']) . 'px';
        }

        return implode(';', $styles);
    }

    private function getButtonParameters($params) {
        $button_params_array = array();

        if ($params['display_button'] !=='no') {

            if (!empty($params['button_text'])) {
                $button_params_array['text'] = $params['button_text'];
            }

            if (!empty($params['button_type'])) {
                $button_params_array['type'] = $params['button_type'];
            }

            if (!empty($params['button_size'])) {
                $button_params_array['size'] = $params['button_size'];
            }

            if (!empty($params['button_link'])) {
                $button_params_array['link'] = $params['button_link'];
            }

            $button_params_array['target'] = !empty($params['button_target']) ? $params['button_target'] : '_self';


            if (!empty($params['button_color'])) {
                $button_params_array['color'] = $params['button_color'];
            }

            if (!empty($params['button_hover_color'])) {
                $button_params_array['hover_color'] = $params['button_hover_color'];
            }

            if (!empty($params['button_background_color'])) {
                $button_params_array['background_color'] = $params['button_background_color'];
            }

            if (!empty($params['button_hover_background_color'])) {
                $button_params_array['hover_background_color'] = $params['button_hover_background_color'];
            }

            if (!empty($params['button_border_color'])) {
                $button_params_array['border_color'] = $params['button_border_color'];
            }

            if (!empty($params['button_hover_border_color'])) {
                $button_params_array['hover_border_color'] = $params['button_hover_border_color'];
            }

        }
        return $button_params_array;
    }
}