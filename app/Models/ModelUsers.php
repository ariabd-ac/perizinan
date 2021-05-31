<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsers extends Model
{
	protected $table                = 'users';
	protected $primaryKey           = 'user_id';
	protected $useTimestamps        = true;
	protected $useAutoIncrement     = true;

	public function getUser($id = null)
	{
		if ($id == null) {
			return $this->findAll();
		}

		return $this->where(['user_id' => $id])->first();
	}
}
