<?php

App::uses('CakeEventListener', 'Event');

App::uses('BasicWebhostingProvider', 'Pltfrm.WebhostingProvider');

/**
 * Class UserStatistic
 *
 * @property OrderShipment OrderShipment
 */
class WebhostingHandler implements CakeEventListener {

	function __construct() {
		$this->Product = ClassRegistry::init('Webshop.Product');
		$this->Customer = ClassRegistry::init('Webshop.Customer');
		$this->WebhostingPackage = ClassRegistry::init('Pltfrm.WebhostingPackage');
		$this->OrderProduct = ClassRegistry::init('WebshopOrders.OrderProduct');
	}


	public function implementedEvents() {
		return array(
			'Product.gotBought' => 'onProductBought',
			'Webhosting.created' => 'onWebhostingCreated',
		);
	}

	public function onProductBought($event) {
		$this->Product->id = $event->data['product']['id'];
		$this->Product->recursive = 2;
		$product = $this->Product->read();

		if ($product[$this->Product->WebhostingProduct->alias]['id'] === null) {
			return;
		}

		$this->Product->WebhostingProduct->HostGroup->id = $product['HostGroup']['id'];
		$this->Product->WebhostingProduct->HostGroup->recursive = 2;
		$hostGroup = $this->Product->WebhostingProduct->HostGroup->read();

		$WebhostingProvider = BasicWebhostingProvider::get($hostGroup['Host'][0]['Provider']['class']);

		$webhostingPackage = $this->WebhostingPackage->createFromWebhostingProduct(
			$product['WebhostingProduct'],
			$event->data['customer']['id'],
			$hostGroup['Host'][0]['id']
		);

		$webhostingDetails = $WebhostingProvider->createPackage(
			$webhostingPackage['WebhostingPackage']['id']
		);

		if ($webhostingDetails === false) {
			CakeLog::write(
				LOG_ERROR,
				__d(
					'pltfrm',
					'Webhosting provider %1$s could not create webhosting package with id %2$d owned by %3$s',
					$hostGroup['Host'][0]['Provider']['class'],
					$webhostingPackage['WebhostingPackage']['id'],
					$webhostingPackage['Customer']['name']
				),
				array('webhosting', 'pltfrm')
			);

			return false;
		}

		$eventData = array();
		$eventData['webhosting']['id'] = $webhostingPackage['WebhostingPackage']['id'];
		$eventData['details'] = $webhostingDetails;
		$eventData['metadata'] = array();
		$webhostingCreatedEvent = new CakeEvent('Webhosting.created', $this, $eventData);
		CakeEventManager::instance()->dispatch($webhostingCreatedEvent);

		CakeLog::write(
			LOG_INFO,
			__d(
				'pltfrm',
				'Webhosting provider %1$s created webhosting package with id %2$d',
				$hostGroup['Host'][0]['Provider']['class'],
				$webhostingPackage['WebhostingPackage']['id']
			),
			array('webhosting', 'pltfrm')
		);

		if (isset($event->data['order'])) {
			$this->OrderProduct->changeStatus('delivered', $event->data['order']['product_id']);
		}

		return true;
	}

	public function onWebhostingCreated($event) {
		$this->WebhostingPackage->sendCreationEmail($event->data['webhosting']['id'], $event->data['details']);
	}

}
