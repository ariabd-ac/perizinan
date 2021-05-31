<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RfKorpokla extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'korpokla_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'korpokla_name'       => [
				'type'       => 'VARCHAR',
				'uniuq' => true,
				'constraint' => '100',
			],
			'desc' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
		]);
		$this->forge->addKey('korpokla_id', true);
		$this->forge->createTable('rf_korpokla');
	}

	public function down()
	{
		//
		$this->forge->dropTable('rf_korpokla');
	}
}
