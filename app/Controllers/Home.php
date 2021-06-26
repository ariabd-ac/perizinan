<?php

namespace App\Controllers;

use App\Models\ModelRegulasi;
use App\Models\ModelUsers;
use App\Models\ModelKorpokla;
use App\Models\ModelPerizinan;


class Home extends BaseController
{
	protected $regulasiModel;

	public function __construct()
	{

		$this->regulasiModel = new ModelRegulasi();
		$this->usersModel = new ModelUsers();
		$this->korpoklaModel = new ModelKorpokla();
		$this->perijinanModel = new ModelPerizinan();
	}

	public function index()
	{
		$korpokla = $this->korpoklaModel->count();
		$perijinan = $this->perijinanModel->count();
		$users = $this->usersModel->count();
		$data = $this->regulasiModel->findAll();
		return view('home', compact(['data'], ['korpokla'], ['perijinan'], ['users']));
	}
}
