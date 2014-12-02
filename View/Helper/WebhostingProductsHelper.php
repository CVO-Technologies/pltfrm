<?php

class WebhostingProductsHelper extends AppHelper {

	/**
	 * beforeRender
	 */
	public function beforeRender($viewFile) {
		if (isset($this->request->params['admin']) && !$this->request->is('ajax')) {
			$this->_adminTabs();
		}
	}

	/**
	 * Hook admin tabs
	 */
	protected function _adminTabs() {
		$controller = Inflector::camelize($this->request->params['controller']);
		$title = __d('pltfrm', 'Webhosting product');
		$element = 'Pltfrm.admin/node_webhosting_product_tab';

		$options = array(
			'elementData' => array(
				'webhostingHostGroups' => array(
					'aaaaa',
					'ffffff',
					'fdddd'
				)
			)
		);

		Croogo::hookAdminTab("$controller/admin_add", $title, $element, $options);
		Croogo::hookAdminTab("$controller/admin_edit", $title, $element, $options);
	}

}