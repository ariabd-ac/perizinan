<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Messages extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'type_message'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'text_message'       => [
				'type'       => 'VARCHAR',
				'constraint' => 'MAX',
			],
			'status_message'       => [
				'type'       => 'VARCHAR',
				'constraint' => '10',
			],
			'id_perijinan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '10',
			],
			'created_at'       => [
				'type'       => 'TIMESTAMP',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('messages');
	}

	public function down()
	{
		//
		$this->forge->dropTable('messages');
	}
}
