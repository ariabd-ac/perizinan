<?php

namespace App\Controllers;

use App\Models\ModelPerizinan;
use App\Models\ModelUsers;
use App\Models\ModelKorpokla;



class C_Request extends BaseController
{
  public function __construct()
  {
    $this->perijinanModel = new ModelPerizinan();
    $this->usersModel = new ModelUsers();
    $this->korpoklaModel = new ModelKorpokla();
  }

  public function index()
  {

    $perijinan = $this->perijinanModel->getAllWaiting();

    $data['perijinan'] = $perijinan;

    // var_dump($data);
    // die;

    return view('perijinan/v_request', $data);
  }

  public function edit($id)
  {
    //model initialize


    $data = [
      'approved' => $this->perijinanModel->getForEdit($id),
    ];



    var_dump($data);
    die;



    return view('perijinan/v_req_approve', $data);
  }
}
