<?php

App::uses('BasicWebhostingProvider', 'Pltfrm.WebhostingProvider');

class WebhostingPackage extends AppModel {

	public $belongsTo = array(
		'Customer' => array(
			'className' => 'Webshop.Customer',
			'foreignKey' => 'customer_id'
		),
		'Host' => array(
			'className' => 'Pltfrm.WebhostingHost',
			'foreignKey' => 'webhosting_host_id'
		)
	);

	public function createFromWebhostingProduct($details, $customerId, $hostId) {
		$this->create();
		return $this->save(array(
			$this->alias => array(
				'customer_id' => $customerId,
				'webhosting_host_id' => $hostId,
				'storage' => $details['storage'],
				'bandwidth' => $details['bandwidth'],
			)
		));
	}

	public function sendCreationEmail($id, $details) {
		$this->id = $id;
		$webhostingPackage = $this->read();

		$this->Customer->id = $webhostingPackage[$this->alias]['customer_id'];
		$this->Customer->recursive = 2;

		$customer = $this->Customer->read();

		foreach ($customer['CustomerContact'] as $contact) {
			$Email = new CakeEmail();
			$Email->template('Pltfrm.webhosting_created', 'default')
				->emailFormat('html')
				->to($contact['email'])
				->from(Configure::read('Site.email'))
				->subject(__d('pltfrm', 'Your webhosting package has been created'))
				->viewVars(compact('webhostingPackage', 'customer', 'contact', 'details'))
				->send();
		}
	}

	public function getMetadata($id = null) {
		if ($id === null) {
			$id = $this->getID();
		}

		if ($id === false) {
			return false;
		}

		$webhostingPackage = $this->read();

		$WebhostingProvider = BasicWebhostingProvider::get($webhostingPackage['Host']['Provider']['class']);

		return $WebhostingProvider->getMetadata($id);
	}

}