<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPerizinan extends Model
{
	protected $table                = 'perijinan';
	protected $primaryKey           = 'perijinan_id';
	protected $useTimestamps        = true;
	protected $useAutoIncrement     = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	// protected $allowedFields     = [
	// 	'perijinan_id', 'nama_pemegang_ijin', 'alamat', 'jenis_tanah', 'lokasi_tanah', 'nomor_ijin', 'tanggal_ijin', 'jw_disahkan', 'jw_tenggang', 'peruntukan', 'luas', 'nilai_tarip', 'nilai_retribusi', 'realisasi', 'keterangan', 'created_at'
	// ];
	protected $allowedFields = ['perijinan_id', 'nama_pemegang_ijin', 'alamat', 'jenis_tanah', 'lokasi_tanah', 'nomor_ijin', 'tanggal_ijin', 'jw_disahkan', 'jw_tenggang', 'peruntukan', 'luas', 'nilai_tarip', 'nilai_retribusi', 'realisasi', 'keterangan', 'created_at'];




	public function getPerijinan($id = false)
	{
		if ($id === false) {
			return $this->table('perijinan')
				->get()
				->getResultArray();
		} else {
			return $this->table('perijinan')
				->where('perijinan_id', $id)
				->get()
				->getRowArray();
		}
	}
}
