<?php
class InitialDatabaseVersion extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'Initial_database_version';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'webhosting_host_groups' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'webhosting_hosts' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'webhosting_host_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'webhosting_provider_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'webhosting_packages' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'webhosting_host_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'storage' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'bandwidth' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'databases' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'domains' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'subdomains' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'email_inboxes' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'email_forwarders' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'email_mailing_lists' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'email_autoresponders' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'ftp_accounts' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'webhosting_products' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'webhosting_host_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'storage' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
					'bandwidth' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
					'databases' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'domains' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'subdomains' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'email_accounts' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'email_forwarders' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'mailing_lists' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'auto_responders' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'domain_pointers' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'ftp_accounts' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'cgi' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'php' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'spamassassin' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'catchall_email' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'ssl' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'ssh' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'cronjobs' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'dns_control' => array('type' => 'boolean', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'webhosting_providers' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'alias' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'plugin' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'class' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'webhosting_host_groups', 'webhosting_hosts', 'webhosting_packages', 'webhosting_products', 'webhosting_providers'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
