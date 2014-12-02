<?php

class WebhostingPackagesController extends AppController {

	public $components = array(
		'Paginator'
	);

	public function panel_index() {
		$webhostingPackages = $this->Paginator->paginate('WebhostingPackage', array(
//			$this->Order->alias . '.customer_id' => $this->CustomerAccess->getAccessibleCustomers()
			$this->WebhostingPackage->alias . '.customer_id' => $this->request->params['named']['customer']
		));

		$this->set(compact('webhostingPackages'));
	}

	public function panel_view($id) {
		$this->WebhostingPackage->id = $id;
		$this->WebhostingPackage->recursive = 2;
		if (!$this->WebhostingPackage->exists()) {
			throw new NotFoundException();
		}

		$webhostingPackage = $this->WebhostingPackage->read();

		$webhostingMetadata = $this->WebhostingPackage->getMetadata();

		$this->set(compact('webhostingPackage', 'webhostingMetadata'));
	}

}