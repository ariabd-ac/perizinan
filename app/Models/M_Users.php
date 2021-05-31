<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Users extends Model
{
  public function getAllUsers()
  {
    $this->db->table('users')
      ->join('rf_korpokla', 'rf_korpokla.korpokla_id=users.korpokla')
      ->get()->getResultArray();
  }
}
