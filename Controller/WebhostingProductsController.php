<?php

class WebhostingProductsController extends AppController {

	public $scaffold;

	public function by_product_id($productId) {
		return $this->WebhostingProduct->findByProductId($productId);
	}

}