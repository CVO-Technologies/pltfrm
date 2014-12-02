<?php

class BasicWebhostingProvider extends Object {

	/**
	 * @var WebhostingPackage WebhostingPackage
	 */
	public $WebhostingPackage;

	public function __construct() {
		$this->WebhostingPackage = ClassRegistry::init('Pltfrm.WebhostingPackage');
	}


	static public function get($class) {
		list($plugin, $class) = pluginSplit($class, true);

		$class .= 'WebhostingProvider';

		App::uses($class, $plugin . 'WebhostingProvider');

		return new $class;
	}

	public function createPackage($id) {
		return false;
	}

	public function getMetadata($id) {
		return array();
	}
}
