<?php

class WebhostingHostsController extends AppController {

	public function admin_view($id) {
		$this->WebhostingHost->id = $id;
		$this->WebhostingHost->recursive = 2;
		if (!$this->WebhostingHost->exists()) {
			throw new NotFoundException();
		}

		$webhostingHost = $this->WebhostingHost->read();

		$this->set(compact('webhostingHost'));
	}

}