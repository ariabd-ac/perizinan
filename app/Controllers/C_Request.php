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
    if ($id != null) {
      $query = $this->db->table('perijinan')->getWhere(['perijinan_id' => $id]);
      // $query = $this->perijinanModel->getForEdit($id);
      // print_r($query);
      // die;
      if ($query->resultID->num_rows > 0) {
        $data = [
          'value' => $this->perijinanModel->getAllWaiting($id)
        ];
        // print_r($data);
        // var_dump($data);
        // die;
        return view('perijinan/v_req_approve', $data);
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data['data'] = $this->perijinanModel->getAllWaiting($id);
    return view('perijinan/v_req_approve', $data);

    //model initialize



  }
}
