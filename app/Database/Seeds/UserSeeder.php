<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			'full_name' => 'administrator',
			'username'    => 'admin',
			'password' => password_hash('admin', PASSWORD_BCRYPT),
			'level' => 'admin',
			'created_at' => date("Y-m-d H:i:s"),
		];
		$this->db->table('users')->insert($data);
	}
}
