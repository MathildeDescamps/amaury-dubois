<?php

namespace OneaCore\Lib;

/**
 * interface PostTypeInterface
 * @package OneaCore\Lib;
 */
interface PostTypeInterface {
	/**
	 * @return string
	 */
	public function getBase();
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register();
}