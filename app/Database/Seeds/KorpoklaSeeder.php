<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KorpoklaSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			'korpokla_name' => 'pemalicomal',
			'desc'    => 'comal',
		];
		$this->db->table('rf_korpokla')->insert($data);
	}
}
