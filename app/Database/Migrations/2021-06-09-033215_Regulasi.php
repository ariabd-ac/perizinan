<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Regulasi extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id_regulasi'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'file_berkas'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'keterangan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addPrimaryKey('id_regulasi');
		$this->forge->createTable('regulasi');
	}

	public function down()
	{
		//
		$this->forge->dropTable('regulasi');
	}
}
