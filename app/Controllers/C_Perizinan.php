<?php

namespace App\Controllers;

use App\Models\ModelPerizinan;


class C_Perizinan extends BaseController
{
  public function __construct()
  {
    $this->perijinanModel = new ModelPerizinan();
  }

  public function index()
  {
    return view('perijinan/v_perizinan');
  }

  public function ambildata()
  {
    if ($this->request->isAJAX()) {
      $data['perijinan'] = $this->perijinanModel->getPerijinan();

      $msg = [
        'data' => view('perijinan/dataperijinan', $data)
      ];

      // dd($msg);

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
  public function formtambah()
  {
    if ($this->request->isAJAX()) {
      $msg = [
        'data' => view('perijinan/modaltambah')
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
  public function simpandata()
  {
    if ($this->request->isAJAX()) {

      // $validation = \Config\Services::validation();

      // $valid = $this->validate([
      //   'nama_pemegang_ijin' => [
      //     'label' => 'Nama Pemegang Ijin',
      //     'rules' => 'required',
      //     'errors' => [
      //       'required' => '{field} tidak boleh kosong'
      //     ]
      //   ],
      //   'alamat'   => [
      //     'label' => 'Alamat',
      //     'rules' => 'required',
      //     'errors' => [
      //       'required' => '{field} tidak boleh kosong'
      //     ]
      //   ]
      // ]);

      // if (!$valid) {
      //   $msg = [
      //     'error' => [
      //       'nama_pemegang_ijin' => $validation->getError('nama_pemegang_ijin'),
      //       'alamat' => $validation->getError('alamat'),
      //     ]
      //   ];
      // }


      // $simpandata = $this->request->getPost();
      $data = [
        'nama_pemegang_ijin'  => $this->request->getPost('nama_pemegang_ijin'),
        'alamat'  => $this->request->getPost('alamat'),
        'jenis_tanah'  => $this->request->getPost('jenis_tanah'),
        'lokasi_tanah' => $this->request->getPost('lokasi_tanah'),
        'nomor_ijin' => $this->request->getPost('nomor_ijin'),
        'tanggal_ijin' => $this->request->getPost('tanggal_ijin'),
        'jw_disahkan' => $this->request->getPost('jw_disahkan'),
        'jw_tenggang' => $this->request->getPost('jw_tenggang'),
        'peruntukan' => $this->request->getPost('peruntukan'),
        'luas' => $this->request->getPost('luas'),
        'nilai_tarip' => $this->request->getPost('nilai_tarip'),
        'nilai_retribusi' => $this->request->getPost('nilai_retribusi'),
        'realisasi' => $this->request->getPost('realisasi'),
        'keterangan' => $this->request->getPost('keterangan'),
        'created_at' => date("Y-m-d H:i:s"),
      ];

      $pj = new ModelPerizinan();

      $pj->insert($data);


      $msg = [
        'sukses' => 'Data berhasil ke save',
        'error' => $pj,
      ];


      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function formpindah()
  {
    if ($this->request->isAJAX()) {
      $perijinan_id = $this->request->getVar('perijinan_id');

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


      $msg = [
        'sukses' => view('perijinan/modalpindah', $data)
      ];

      echo json_encode($msg);
    } else {
      echo 'gabisa';
    }
  }

  public function updatedata()
  {
    if ($this->request->isAJAX()) {

      // $simpandata = $this->request->getPost();
      $data = [
        'nama_pemegang_ijin'  => $this->request->getPost('nama_pemegang_ijin'),
        'updated_at' => date("Y-m-d H:i:s"),
      ];



      $pj = new ModelPerizinan();
      $id = $this->request->getVar('perijinan_id');
      $pj->update($id, $data);


      $msg = [
        'sukses' => 'Berhasil pindah tangan',
      ];


      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
  public function updatedata2()
  {
    if ($this->request->isAJAX()) {

      // $simpandata = $this->request->getPost();
      $data = [
        'jw_tenggang'  => $this->request->getPost('jw_tenggang'),
        'updated_at' => date("Y-m-d H:i:s"),
      ];

      $pj = new ModelPerizinan();
      $id = $this->request->getVar('perijinan_id');
      $pj->update($id, $data);

      $msg = [
        'sukses' => 'Berhasil pindah tangan',
      ];


      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function formperpanjang()
  {
    if ($this->request->isAJAX()) {
      $perijinan_id = $this->request->getVar('perijinan_id');

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


      $msg = [
        'sukses' => view('perijinan/modalperpanjang', $data)
      ];

      echo json_encode($msg);
    } else {
      echo 'gabisa';
    }
  }

  public function detail()
  {
    if ($this->request->isAJAX()) {
      $perijinan_id = $this->request->getVar('perijinan_id');

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


      $msg = [
        'sukses' => view('perijinan/modaldetail', $data)
      ];

      echo json_encode($msg);
    } else {
      echo 'gabisa';
    }
  }
}
