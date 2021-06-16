<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perizinan extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'perijinan_id'          => [
				'type'           => 'BIGINT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nomor_romtek'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'tanggal_romtek'       => [
				'type'       => 'DATE',
			],
			'nama_pemegang_ijin'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'jenis_tanah' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'lokasi_tanah'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'nomor_ijin'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'tanggal_ijin'       => [
				'type'       => 'DATE',
			],
			'jw_disahkan'       => [
				'type'       => 'DATE',
			],
			'jw_tenggang'       => [
				'type'       => 'DATE',
			],
			'peruntukan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'luas'       => [
				'type'       => 'DOUBLE',
			],
			'nilai_tarip'       => [
				'type'       => 'DOUBLE',
			],
			'nilai_retribusi'       => [
				'type'       => 'DOUBLE',
			],
			'realisasi'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null' => 'true',
			],
			'korpokla_by'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null' => 'true',
			],
			'keterangan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null' => 'true',
			],
			'file_ktp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'foto_lokasi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'user_by'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'created_at'       => [
				'type'       => 'TIMESTAMP',
			],
			'updated_at'       => [
				'type'       => 'TIMESTAMP',
			],
		]);
		$this->forge->addKey('perijinan_id', true);
		$this->forge->createTable('perijinan');
	}

	public function down()
	{
		//
		$this->forge->dropTable('perijinan');
	}
}
