<?php

namespace Stage\Composers;

use Log1x\Navi\NaviFacade as Navi;
use Roots\Acorn\View\Composer;

class Navigation extends Composer {

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = array(
		'partials.header.navigation.*',
		'partials.navigation.*',
	);

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with() {
		return array(
			'navigation' => $this->navigation(),
		);
	}

	/**
	 * Returns the primary navigation.
	 *
	 * @return array
	 */
	public function navigation() {
		if ( ! has_nav_menu( 'primary_navigation' ) ) {
			return array();
		}

		return Navi::build( 'primary_navigation' )->toArray();
	}
}
