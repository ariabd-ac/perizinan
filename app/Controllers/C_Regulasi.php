<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRegulasi;

class C_Regulasi extends BaseController
{
	protected $regulasiModel;

	public function __construct()
	{

		$this->regulasiModel = new ModelRegulasi();
	}

	public function index()
	{
		//
		// $berkas = new ModelRegulasi();
		$data['berkas'] = $this->regulasiModel->findAll();
		// dd($data);
		return view('regulasi/v_regulasi', $data);
	}

	public function create()
	{
		return view('regulasi/form_upload');
	}
	public function save()
	{
		if (!$this->validate([
			'keterangan' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'file_berkas' => [
				'rules' => 'uploaded[file_berkas]|ext_in[file_berkas,pdf]|max_size[file_berkas,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'ext_in' => 'File Extention Harus Berupa pdf',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]

			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}

		// $berkas = new ModelRegulasi();
		$dataBerkas = $this->request->getFile('file_berkas');
		$fileName = $dataBerkas->getRandomName();
		$this->regulasiModel->insert([
			'file_berkas' => $fileName,
			'keterangan' => $this->request->getPost('keterangan')
		]);

		$dataBerkas->move('uploads/berkas/', $fileName);
		session()->setFlashdata('success', 'Berkas Berhasil diupload');
		return redirect()->to(base_url('regulasi'));
	}

	function download($id)
	{
		// $berkas = new ModelRegulasi();
		$data = $this->regulasiModel->find($id);
		// dd($data);
		// die;
		return $this->response->download('uploads/berkas/' . $data['file_berkas'], null);
	}

	public function destroy($id)
	{
		// $berkas = new ModelRegulasi();
		// $data = $berkas->find($id);
		// $hapus = $this->userModel->delete_users($id);
		$hapus = $this->db->table('regulasi')->where(['id_regulasi' => $id])->delete();
		if ($hapus) {
			return redirect()->to(site_url('regulasi'))->with('success', 'Data berhasil di hapus');
		}
		// $this->db->table('users')->where(['user_id' => $id])->delete();
	}
}
