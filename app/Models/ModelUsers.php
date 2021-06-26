<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsers extends Model
{
	protected $table                = 'users';
	protected $primaryKey           = 'user_id';
	protected $useTimestamps        = true;
	protected $useAutoIncrement     = true;
	protected $allowedFields = ['user_id', 'full_name', 'username', 'password', 'korpokla', 'level', 'created_at'];


	public function getUser($id = false)
	{
		if ($id === false) {
			return $this->table('users')
				->join('rf_korpokla', 'rf_korpokla.korpokla_id=users.korpokla', 'LEFT')
				->get()
				->getResultArray();
		} else {
			return $this->table('users')
				->where('user_id', $id)
				->get()
				->getRowArray();
		}
	}

	public function insert_users($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function update_users($data, $id)
	{
		return $this->db->table($this->table)->update($data, ['user_id' => $id]);
	}

	public function delete_users($id)
	{
		return $this->db->table($this->table)->delete(['user_id' => $id]);
	}

	public function count()
	{
		return $this->countAll();
	}
}
