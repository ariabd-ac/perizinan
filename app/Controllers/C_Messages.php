<?php

namespace App\Controllers;

use App\Models\ModelPerizinan;
use App\Models\ModelUsers;
use App\Models\ModelMessages;


class C_Messages extends BaseController
{
  public function __construct()
  {
    $this->perijinanModel = new ModelPerizinan();
    $this->usersModel = new ModelUsers();
    $this->msgModel = new ModelMessages();
  }

  public function index()
  {
    return view('perijinan/v_perizinan');
  }

  public function getAll()
  {
    if ($this->request->isAJAX()) {
      
      $data['messages'] = $this->msgModel->getAll();
      
      $msg = [
        'list_message'=>$data['messages'],
        'view'=>view('layout/notif', $data)
      ];

      // dd($msg);

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  
  public function insert()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'text_message'  => $this->request->getPost('text_message'),
        'status_message'  => $this->request->getPost('status_message'),
        'id_perijinan'  => $this->request->getPost('id_perijinan'),
        'created_at'  => date("Y-m-d H:i:s"),
      ];

    //   $pj = new ModelPerizinan();
      $cekIdPerijinan=$this->msgModel->cekIdPerijinan($data['id_perijinan']);
      if(!$cekIdPerijinan){
          $insertMsg=$this->msgModel->insertMsg($data);

          $msg = [
            'sukses' => 'Data berhasil ke save',
            'data'=>$data,
            'response'=>$insertMsg
          ];
    
          echo json_encode($msg);
      }
      echo json_encode($cekIdPerijinan);


    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

}
