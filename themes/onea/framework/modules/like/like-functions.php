<?php

if ( ! function_exists( 'onea_elated_like' ) ) {
	/**
	 * Returns OneaElatedClassLike instance
	 *
	 * @return OneaElatedClassLike
	 */
	function onea_elated_like() {
		return OneaElatedClassLike::get_instance();
	}
}

function onea_elated_get_like() {
	
	echo wp_kses( onea_elated_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}