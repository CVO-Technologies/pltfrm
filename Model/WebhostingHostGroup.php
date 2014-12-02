<?php

class WebhostingHostGroup extends AppModel {

	public $hasMany = array(
		'Host' => array(
			'className' => 'Pltfrm.WebhostingHost',
			'foreignKey' => 'webhosting_host_group_id'
		)
	);

}