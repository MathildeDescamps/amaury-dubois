<?php

if ( ! function_exists( 'onea_elated_sidearea_options_map' ) ) {
	function onea_elated_sidearea_options_map() {

        onea_elated_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'onea'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = onea_elated_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'onea'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'onea'),
                'description'   => esc_html__('Choose a type of Side Area', 'onea'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'onea'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'onea'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'onea'),
                ),
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'onea'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'onea'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = onea_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'onea'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'onea'),
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'onea'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'onea'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'onea'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'onea'),
                'options'       => onea_elated_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = onea_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'onea'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'onea'),
                'options'       => onea_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = onea_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'onea'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'onea'),
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'onea'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'onea'),
            )
        );

        $side_area_icon_style_group = onea_elated_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'onea'),
                'description' => esc_html__('Define styles for Side Area icon', 'onea')
            )
        );

        $side_area_icon_style_row1 = onea_elated_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'onea')
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'onea')
            )
        );

        $side_area_icon_style_row2 = onea_elated_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'onea')
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'onea')
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'onea'),
                'description' => esc_html__('Choose a background color for Side Area', 'onea')
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'onea'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'onea'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        onea_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'onea'),
                'description'   => esc_html__('Choose text alignment for side area', 'onea'),
                'options'       => array(
                    ''       => esc_html__('Default', 'onea'),
                    'left'   => esc_html__('Left', 'onea'),
                    'center' => esc_html__('Center', 'onea'),
                    'right'  => esc_html__('Right', 'onea')
                )
            )
        );
    }

    add_action('onea_elated_action_options_map', 'onea_elated_sidearea_options_map', onea_elated_set_options_map_position( 'sidearea' ) );
}