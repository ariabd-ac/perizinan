<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'full_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'username' => [
				'type' => 'VARCHAR',
				'uniuq' => true,
				'constraint' => '20',
			],
			'password' => [
				'type' => 'VARCHAR',
				'uniuq' => true,
				'constraint' => '100',
			],
			'korpokla'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'level'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'created_at'       => [
				'type'       => 'TIMESTAMP',
			],
		]);
		$this->forge->addKey('user_id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		//
	}
}
