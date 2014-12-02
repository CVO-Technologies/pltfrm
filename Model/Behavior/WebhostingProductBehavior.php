<?php

class WebhostingProductBehavior extends ModelBehavior {

	public function setup(Model $Model, $config = array()) {
		$Model->bindModel(array(
			'hasOne' => array(
				'WebhostingProduct' => array(
					'className' => 'Pltfrm.WebhostingProduct',
					'foreignKey' => 'product_id'
				)
			)
		), false);
	}

}