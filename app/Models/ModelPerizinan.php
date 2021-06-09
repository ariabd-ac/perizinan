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
	protected $allowedFields = ['perijinan_id', 'nomor_rekomtek', 'tanggal_rekomtek', 'nama_pemegang_ijin', 'alamat', 'jenis_tanah', 'lokasi_tanah', 'nomor_ijin', 'tanggal_ijin', 'jw_disahkan', 'jw_tenggang', 'peruntukan', 'luas', 'nilai_tarip', 'nilai_retribusi', 'realisasi', 'korpokla_by', 'keterangan', 'file_ktp', 'created_at', 'user_by'];




	public function getPerijinan($id = false, $korpokla_id = false)
	{
		if ($id === false) {
			return $this->table('perijinan')
				->join('users', 'users.user_id=perijinan.user_by', 'LEFT')
				->where('users.korpokla', $korpokla_id)
				->orderBy('perijinan.created_at', 'DESC')
				->get()
				->getResultArray();
		} else {
			return $this->table('perijinan')
				->join('rf_korpokla', 'rf_korpokla.korpokla_id=perijinan.korpokla_by')
				->where('perijinan_id', $id)
				->get()
				->getRowArray();
		}
	}

	public function getAll()
	{
		return $this->table('perijinan')
			->join('users', 'users.user_id=perijinan.user_by', 'LEFT')
			// ->join('rf_korpokla','korpokla.id=users.korpokla','LEFT')
			// ->where('users.korpokla',$korpokla_id)
			->orderBy('perijinan.created_at', 'DESC')
			->get()
			->getResultArray();
	}
}
