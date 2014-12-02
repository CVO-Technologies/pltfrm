<?php

class WebhostingProvider extends AppModel {

	public $hasMany = array(
		'Host' => array(
			'className' => 'Pltfrm.WebhostingHost',
			'foreignKey' => 'webhosting_provider_id'
		)
	);

}