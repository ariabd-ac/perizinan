<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMessages extends Model
{
  protected $table                = 'messages';
  protected $primaryKey           = 'id';
  protected $useTimestamps        = true;
  protected $useAutoIncrement     = true;

  public function getAll($id = false)
  {
    if ($id === false) {
      return $this->table('messages')
        ->join('perijinan','perijinan.perijinan_id=messages.id_perijinan','LEFT')
        ->orderBy('messages.status_message','ASC')
        ->get()
        ->getResultArray();
    } else {
      return $this->table('messages')
        ->where('korpokla_id', $id)
        ->get()
        ->getRowArray();
    }
  }


  public function cekIdPerijinan($id = false)
  {
      return $this->table('messages')
        ->where('id_perijinan', $id)
        ->where('status_message', '1')
        ->get()
        ->getRowArray();
  }

  

  public function insertMsg($data){
    return $this->db->table($this->table)->insert($data);
  }
}
