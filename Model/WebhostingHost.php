<?php

class WebhostingHost extends AppModel {

	public $belongsTo = array(
		'HostGroup' => array(
			'className' => 'Pltfrm.WebhostingHostGroup',
			'foreignKey' => 'webhosting_host_group_id'
		),
		'Provider' => array(
			'className' => 'Pltfrm.WebhostingProvider',
			'foreignKey' => 'webhosting_provider_id'
		)
	);

	public $hasMany = array(
		'Package' => array(
			'className' => 'Pltfrm.WebhostingPackage',
			'foreignKey' => 'webhosting_host_id'
		)
	);

}