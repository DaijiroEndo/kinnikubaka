<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
		'onepass',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => true,
		),
	);

	protected static $_table_name = 'users';

//        protected static $_soft_delete = array(
//		'deleted_field' => 'deleted_at',
//		'mysql_timestamp' => true
//	);
//        protected static $_belongs_to = array(
//			'site' => array(
//					'key_from' => 'site_id',
//					'model_to' => 'Model_Site',
//					'key_to' => 'id',
//					'cascade_save' => true,
//					'cascade_delete' => false,
//			),
//	);
}
