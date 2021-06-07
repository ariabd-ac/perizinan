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
    return view('messages/v_messages');
  }

  public function getAll()
  {
    if ($this->request->isAJAX()) {
      $messages;
      if(session()->get('level')=='admin'){
        $messages = $this->msgModel->getAll();
      }else{
        $messages = $this->msgModel->getAll(false,session('user_id'));
      }
      $data['messages'] = $messages;
      
      $msg = [
        'list_message'=>$data['messages'],
        'view'=>view('layout/notif', $data),
        'viewMessage'=>view('messages/datamessage', $data)
      ];

      // dd($msg);

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function detail(){
    if ($this->request->isAJAX()) {
      $perijinan_id = $this->request->getVar('perijinan_id');
      $notif_id = $this->request->getVar('notif_id');

      $pj = new ModelPerizinan();
      $row = $pj->find($perijinan_id);

      $data = [
        // yang di lempar ke view => field
        'perijinan_id' => $row['perijinan_id'],
        'nama_pemegang_ijin' => $row['nama_pemegang_ijin'],
        'alamat' => $row['alamat'],
        'jenis_tanah' => $row['jenis_tanah'],
        'lokasi_tanah' => $row['lokasi_tanah'],
        'nomor_ijin' => $row['nomor_ijin'],
        'tanggal_ijin' => $row['tanggal_ijin'],
        'jw_disahkan' => $row['jw_disahkan'],
        'jw_tenggang' => $row['jw_tenggang'],
        'peruntukan' => $row['peruntukan'],
        'luas' => $row['luas'],
        'nilai_tarip' => $row['nilai_tarip'],
        'nilai_retribusi' => $row['nilai_retribusi'],
        'realisasi' => $row['realisasi'],
        'keterangan' => $row['keterangan'],
      ];

      $this->msgModel->updateStatusMsg($notif_id);


      $msg = [
        'sukses' => view('perijinan/modaldetail', $data)
      ];

      echo json_encode($msg);
    } else {
      echo 'gabisa';
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
      }else{
        echo json_encode($cekIdPerijinan);
      }


    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function hapus()
  {
    if ($this->request->isAJAX()) {

      $perijinan_id = $this->request->getVar('perijinan_id');

      $pj = new ModelMessages();


      // $perijinan_id = 9;

      $pj->delete($perijinan_id);

      $msg = [
        'sukses' => 'Berhasil dihapus',
      ];

      echo json_encode($msg);
    }
  }

}
