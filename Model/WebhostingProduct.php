<?php

class WebhostingProduct extends AppModel {

	public $belongsTo = array(
		'Node' => array(
			'className' => 'Nodes.Node',
			'foreignKey' => 'product_id'
		),
		'Product' => array(
			'className' => 'Webshop.Product',
			'foreignKey' => 'product_id'
		),

		'HostGroup' => array(
			'className' => 'Pltfrm.WebhostingHostGroup',
			'foreignKey' => 'webhosting_host_group_id'
		)
	);

}