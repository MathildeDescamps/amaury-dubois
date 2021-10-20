<?php

if ( ! function_exists( 'onea_elated_get_hide_dep_for_header_vertical_sliding_options' ) ) {
	function onea_elated_get_hide_dep_for_header_vertical_sliding_options() {
		$hide_dep_options = apply_filters( 'onea_elated_filter_header_vertical_sliding_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'onea_elated_header_vertical_sliding_options_map' ) ) {
	function onea_elated_header_vertical_sliding_options_map( $panel_header ) {
		$hide_dep_options = onea_elated_get_hide_dep_for_header_vertical_sliding_options();
		
		$vertical_sliding_container = onea_elated_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'vertical_sliding_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		onea_elated_add_admin_section_title(
			array(
				'parent' => $vertical_sliding_container,
				'name'   => 'vertical_sliding_opener_style',
				'title'  => esc_html__( 'Vertical Sliding Opener Style', 'onea' )
			)
		);

		onea_elated_add_admin_field(
			array(
				'parent'        => $vertical_sliding_container,
				'type'          => 'select',
				'name'          => 'vertical_sliding_icon_source',
				'default_value' => 'icon_pack',
				'label'         => esc_html__( 'Select Vertical Sliding Icon Source', 'onea' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'onea' ),
				'options'       => onea_elated_get_icon_sources_array()
			)
		);

		$vertical_sliding_icon_pack_container = onea_elated_add_admin_container(
			array(
				'parent'          => $vertical_sliding_container,
				'name'            => 'vertical_sliding_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'vertical_sliding_icon_source' => 'icon_pack'
					)
				)
			)
		);

		onea_elated_add_admin_field(
			array(
				'parent'        => $vertical_sliding_icon_pack_container,
				'type'          => 'select',
				'name'          => 'vertical_sliding_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Vertical Sliding Icon Pack', 'onea' ),
				'description'   => esc_html__( 'Choose icon pack for vertical sliding header icon', 'onea' ),
				'options'       => onea_elated_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$vertical_sliding_icon_svg_path_container = onea_elated_add_admin_container(
			array(
				'parent'          => $vertical_sliding_container,
				'name'            => 'vertical_sliding_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'vertical_sliding_icon_source' => 'svg_path'
					)
				)
			)
		);

		onea_elated_add_admin_field(
			array(
				'parent'      => $vertical_sliding_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'vertical_sliding_icon_svg_path',
				'label'       => esc_html__( 'Vertical Sliding Icon SVG Path', 'onea' ),
				'description' => esc_html__( 'Enter your vertical sliding icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'onea' ),
			)
		);

		onea_elated_add_admin_field(
			array(
				'parent'      => $vertical_sliding_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'vertical_sliding_close_icon_svg_path',
				'label'       => esc_html__( 'Vertical Sliding Close Icon SVG Path', 'onea' ),
				'description' => esc_html__( 'Enter your vertical sliding close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'onea' ),
			)
		);

		$vertical_sliding_icon_style_group = onea_elated_add_admin_group(
			array(
				'parent'      => $vertical_sliding_container,
				'name'        => 'vertical_sliding_icon_style_group',
				'title'       => esc_html__( 'Vertical Sliding Icon Style', 'onea' ),
				'description' => esc_html__( 'Define styles for vetical sliding icon', 'onea' )
			)
		);
		
		$vertical_sliding_icon_colors_row = onea_elated_add_admin_row(
			array(
				'parent' => $vertical_sliding_icon_style_group,
				'name'   => 'vertical_sliding_icon_colors_row'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'parent' => $vertical_sliding_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_sliding_icon_color',
				'label'  => esc_html__( 'Color', 'onea' ),
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'parent' => $vertical_sliding_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_sliding_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'onea' ),
			)
		);
		
		do_action( 'onea_elated_header_vertical_sliding_additional_options', $panel_header );
	}
	
	add_action( 'onea_elated_action_additional_header_menu_area_options_map', 'onea_elated_header_vertical_sliding_options_map' );
}