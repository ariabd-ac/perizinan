<?php

namespace App\Controllers;

use App\Models\ModelPerizinan;
use App\Models\ModelUsers;
use App\Models\ModelKorpokla;



class C_Perizinan extends BaseController
{
  public function __construct()
  {
    $this->perijinanModel = new ModelPerizinan();
    $this->usersModel = new ModelUsers();
    $this->korpoklaModel = new ModelKorpokla();
  }

  public function index()
  {
    $data['korpokla'] = $this->korpoklaModel->getKorpokla();
    return view('perijinan/v_perizinan',$data);
  }

  public function filter(){
    if ($this->request->isAJAX()) {
      $data=array(
        "dueDate"=>$this->request->getPost('dueDate'),
        "korpoklaId"=>$this->request->getPost('korpoklaId')
      );

      $result['perijinan']=$this->perijinanModel->filterData($data);

      $msg = [
        'data' => view('perijinan/dataperijinan', $result),
      ];

      // dd($msg);

      echo json_encode($msg);
    }
  }

  public function ambildata()
  {
    if ($this->request->isAJAX()) {
      $userData = $this->usersModel->getUser(session()->get('user_id'));
      $id_korpokla = $userData['korpokla'];
      // $perizinan;

      if (session()->get('level') == 'admin') {
        $perijinan = $this->perijinanModel->getAll();
      } else {
        $perijinan = $this->perijinanModel->getPerijinan(false, $id_korpokla);
      }
      $data['perijinan'] = $perijinan;
      

      $msg = [
        'data' => view('perijinan/dataperijinan', $data),
        'list_perijinan' => $data['perijinan']
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

      $data['korpokla'] = $this->korpoklaModel->getKorpokla();



      $msg = [
        'data' => view('perijinan/modaltambah', $data)
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
  public function simpandata()
  {
    if ($this->request->isAJAX()) {

      $dataKtp = $this->request->getFile('file_ktp');
      $fileName = $dataKtp->getRandomName();

      $flokasi = $this->request->getFile('foto_lokasi');
      $foto_lokasi = $flokasi->getRandomName();


      $data = [
        'nomor_rekomtek'  => $this->request->getPost('nomor_rekomtek'),
        'tanggal_rekomtek'  => $this->request->getPost('tanggal_rekomtek'),
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
        'korpokla_by' => $this->request->getPost('korpokla_by'),
        'keterangan' => $this->request->getPost('keterangan'),
        'file_ktp' => $fileName,
        'foto_lokasi' => $foto_lokasi,
        'user_by' => session()->get('user_id'),
        'created_at' => date("Y-m-d H:i:s"),
      ];

      // echo $data;
      // die;

      $pj = new ModelPerizinan();

      $pj->insert($data);


      $msg = [
        'sukses' => 'Data berhasil ke save',
        'error' => $pj,
        'id_user' => session()->get('user_id'),
        'data' => $data
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
        'sukses' => 'Berhasil memperpanjang',
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
      // $row = $pj->find($perijinan_id);
      $row = $pj->getPerijinan($perijinan_id);


      $data = [
        // yang di lempar ke view => field
        'nomor_rekomtek' => $row['nomor_rekomtek'],
        'tanggal_rekomtek' => $row['tanggal_rekomtek'],
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
        'korpokla_by' => $row['korpokla_name'],
        'keterangan' => $row['keterangan'],
        'file_ktp' => $row['file_ktp'],
      ];


      $msg = [
        'sukses' => view('perijinan/modaldetail', $data)
      ];

      echo json_encode($msg);
    } else {
      echo 'gabisa';
    }
  }

  // controller show photo lapangan
  public function showPhoto()
  {
    if ($this->request->isAJAX()) {
      $perijinan_id = $this->request->getVar('perijinan_id');

      $pj = new ModelPerizinan();
      // $row = $pj->find($perijinan_id);
      $row = $pj->getPerijinan($perijinan_id);


      $data = [
        // yang di lempar ke view => field
        'nomor_rekomtek' => $row['nomor_rekomtek'],
        'tanggal_rekomtek' => $row['tanggal_rekomtek'],
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
        'korpokla_by' => $row['korpokla_name'],
        'keterangan' => $row['keterangan'],
        'file_ktp' => $row['file_ktp'],
        'foto_lokasi' => $row['foto_lokasi'],
      ];


      $msg = [
        'sukses' => view('perijinan/modalShowPhoto', $data)
      ];

      echo json_encode($msg);
    } else {
      echo 'gabisa';
    }
  }



  public function hapus()
  {
    if ($this->request->isAJAX()) {

      $perijinan_id = $this->request->getVar('perijinan_id');

      $pj = new ModelPerizinan();


      // $perijinan_id = 9;

      $pj->delete($perijinan_id);

      $msg = [
        'sukses' => 'Berhasil dihapus',
      ];

      echo json_encode($msg);
    }
  }

  public function create()
  {
    $data['korpokla'] = $this->korpoklaModel->getKorpokla();
    return view('perijinan/v_addPerijinan', $data);
    // return view('perijinan/v_addPerijinan');
  }


  public function store()
  {

    if (!$this->validate([
      'file_ktp' => [
        'rules' => 'uploaded[file_ktp]|mime_in[file_ktp,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_ktp,2048]',
        'errors' => [
          'uploaded' => 'Harus Ada File yang diupload',
          'ext_in' => 'File Extention Harus Berupa image/jpg,image/jpeg,image/gif,image/png',
          'max_size' => 'Ukuran File Maksimal 2 MB'
        ]

      ],
      'foto_lokasi' => [
        'rules' => 'uploaded[foto_lokasi]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/gif,image/png]',
        'errors' => [
          'uploaded' => 'Harus Ada File yang diupload',
          'ext_in' => 'File Extention Harus Berupa image/jpg,image/jpeg,image/gif,image/png',
          'max_size' => 'Ukuran File Maksimal 2 MB'
        ]

      ]
    ])) {

      // session()->setFlashdata('error', $this->validator->listErrors());
      // return redirect()->back()->withInput();
      return redirect()->to(site_url('perizinan'))->with('error', 'error');
    }

    $dataBerkas = $this->request->getFile('file_ktp');
    $fileName = $dataBerkas->getRandomName();

    $flokasi = $this->request->getFile('foto_lokasi');
    $foto_lokasi = $flokasi->getRandomName();

    if (session()->get('level') == 'admin') {
      $status = 'approved';
    } else {
      $status = 'waiting';
    }

    $data = [
      'nomor_rekomtek'  => $this->request->getPost('nomor_rekomtek'),
      'tanggal_rekomtek'  => $this->request->getPost('tanggal_rekomtek'),
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
      'korpokla_by' => $this->request->getPost('korpokla_by'),
      'keterangan' => $this->request->getPost('keterangan'),
      'file_ktp' => $fileName,
      'foto_lokasi' => $foto_lokasi,
      'status' => $status,
      'user_by' => session()->get('user_id'),
      'created_at' => date("Y-m-d H:i:s"),
    ];

    $pj = new ModelPerizinan();

    $pj->insert($data);

    if ($pj) {
      $dataBerkas->move('uploads/ktp/', $fileName);
      $flokasi->move('uploads/foto_lokasi/', $foto_lokasi);
      return redirect()->to(site_url('perizinan'))->with('success', 'Data tersimpan');
    }
  }



  public function edit()
  {
    if ($this->request->isAJAX()) {
      $perijinan_id = $this->request->getVar('perijinan_id');

      $pj = new ModelPerizinan();
      $row = $pj->getPerijinan($perijinan_id);

      $data = [
        // yang di lempar ke view => field
        'nomor_rekomtek' => $row['nomor_rekomtek'],
        'tanggal_rekomtek' => $row['tanggal_rekomtek'],
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
        'korpokla_by'   => isset($row['korpokla_name']) ? $row['korpokla_name'] : 1,
        'korpokla_id' => $row['korpokla_id'],
        'keterangan' => $row['keterangan'],
      ];


      $msg = [
        'sukses' => view('perijinan/modaledit', $data)
      ];

      echo json_encode($msg);
    } else {
      echo 'gabisa';
    }
  }


  public function updatedata3()
  {
    if ($this->request->isAJAX()) {

      // $simpandata = $this->request->getPost();
      $data = [
        // 'jw_tenggang'  => $this->request->getPost('jw_tenggang'),
        'nomor_rekomtek'  => $this->request->getPost('nomor_rekomtek'),
        'tanggal_rekomtek'  => $this->request->getPost('tanggal_rekomtek'),
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
        'user_by' => session()->get('user_id'),
        'updated_at' => date("Y-m-d H:i:s"),
      ];

      $pj = new ModelPerizinan();
      $id = $this->request->getVar('perijinan_id');
      $pj->update($id, $data);

      $msg = [
        'sukses' => 'Berhasil memperpanjang',
      ];


      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
