<?php

CroogoNav::add('sidebar', 'pltfrm', array(
	'title' => __d('pltfrm', 'Pltfrm'),
	'url' => '#',
	'weight' => 40,
	'children' => array(
		'hosts' => array(
			'title' => __d('pltfrm', 'Hosts'),
			'url' => array(
				'plugin' => 'pltfrm',
				'controller' => 'webhosting_hosts',
				'action' => 'index'
			),
			'weight' => 40,
		)
	)
));

Croogo::hookHelper('Nodes', 'Pltfrm.WebhostingProducts');

Croogo::hookBehavior('Node', 'Pltfrm.WebhostingProduct');
Croogo::hookBehavior('Product', 'Pltfrm.WebhostingProduct');

App::build(array(
	'WebhostingProvider' => array('%s' . 'WebhostingProvider' . DS)
), App::REGISTER);
