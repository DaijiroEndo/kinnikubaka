<?php

namespace Fuel\Migrations;

class Add_onepass_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'onepass' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'onepass'

		));
	}
}