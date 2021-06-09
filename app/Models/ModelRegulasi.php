<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegulasi extends Model
{
	protected $table                = 'regulasi';
	protected $primaryKey           = 'id_regulasi';
	protected $useAutoIncrement     = true;
	protected $useTimestamps        = true;
	protected $allowedFields        = ['id_regulasi', 'file_berkas', 'keterangan', 'created_at', 'updated_at'];
}
