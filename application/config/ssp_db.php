<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['pdoMySQLdb'] = array(
						'host' => 'localhost',
						'user' => 'root',
						'pass' => 'mysql', 
						'db' => 'gazaba',
						'driver'   => 'mysql',
						'port'     => '3306',
						'char_set' => 'utf8',
						'dbcollat' => 'utf8_general_ci'
					);

$config['pdoOracledb'] = array(
						'host' => '10.10.91.250',
						'user' => 'OWNER_RAFAM',
						'pass' => 'OWNERDBA',
						'db' => 'MROJAS',
						'driver'   => 'oci',
						'port'	   => '1521',
						'char_set' => 'utf8',
						'dbcollat' => 'utf8_general_ci'						
					);

/* End of file config.php */
/* Location: ./application/config/config.php */
