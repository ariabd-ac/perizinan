<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKorpokla extends Model
{
  protected $table                = 'rf_korpokla';
  protected $primaryKey           = 'korpokla_id';
  protected $useTimestamps        = true;
  protected $useAutoIncrement     = true;
  protected $allowedFields = ['korpokla_id', 'korpokla_name', 'desc'];
  public function getKorpokla($id = false)
  {
    if ($id === false) {
      return $this->table('rf_korpokla')
        ->get()
        ->getResultArray();
    } else {
      return $this->table('rf_korpokla')
        ->where('korpokla_id', $id)
        ->get()
        ->getRowArray();
    }
  }

  public function count()
  {
    return $this->countAll();
  }
}
