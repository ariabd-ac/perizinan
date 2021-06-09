<?php

namespace App\Controllers;

use App\Models\ModelRegulasi;


class Home extends BaseController
{
	protected $regulasiModel;

	public function __construct()
	{

		$this->regulasiModel = new ModelRegulasi();
	}

	public function index()
	{
		$data['berkas'] = $this->regulasiModel->findAll();
		return view('home', $data);
	}
}
