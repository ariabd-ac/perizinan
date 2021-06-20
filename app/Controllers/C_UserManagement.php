<?php

namespace App\Controllers;

use App\Models\ModelUsers;
use App\Models\ModelKorpokla;


class C_UserManagement extends BaseController
{


  protected $userModel;

  public function __construct()
  {
    $this->userModel = new ModelUsers();
    $this->korpoklaModel = new ModelKorpokla();
  }

  public function index()
  {
    // echo password_hash('admin', PASSWORD_BCRYPT);
    // die();

    // gak lewat model

    // $builder = $this->db->table('users');
    // $query   = $builder->get()->getResult();
    // $data['users'] = $query;

    // lewat model
    $data['user'] = $this->userModel->getUser();
    // $user = $this->userModel->getUser();
    // $data = [
    //   'm_user' => $user
    // ];
    // dd($data);
    return view('userManagement/v_userManagement', $data);
    // print_r($query);
  }

  public function add()
  {
    $data['korpokla'] = $this->korpoklaModel->getKorpokla();
    // dd($data);
    return view('userManagement/v_add', $data);
  }

  public function edit($id = null)
  {

    if ($id != null) {
      $query = $this->db->table('users')->getWhere(['user_id' => $id]);
      // print_r($query);
      if ($query->resultID->num_rows > 0) {
        $data = [
          // $users['users'] = $this->userModel->getUser($id),
          // $korpokla['korpokla'] = $this->korpoklaModel->getKorpokla()
          'users' => $this->userModel->getUser($id),
          'korpokla' =>  $this->korpoklaModel->getKorpokla()
        ];
        // var_dump($data);
        // die;
        return view('userManagement/v_edit', $data);
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
    $data['users'] = $this->userModel->getUser($id);
    return view('userManagement/v_edit', $data);
  }


  public function store()
  {
    // $data = $this->request->getPost();
    // $this->db->table('users')->insert($data);
    $data = [
      'full_name' => $this->request->getPost('full_name'),
      'username'  => $this->request->getPost('username'),
      'password'  => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
      'korpokla'  => $this->request->getPost('korpokla'),
      'level' => $this->request->getPost('level'),
      'created_at' => date("Y-m-d H:i:s"),
    ];

    $simpan = $this->userModel->insert_users($data);

    if ($simpan) {
      return redirect()->to(site_url('user-management'))->with('success', 'Data tersimpan');
    }

    // dd($data);

    // $this->db->table('users')->insert($data);


    // if ($this->db->affectedRows() > 0) {
    //   return redirect()->to(site_url('user-management'))->with('success', 'Data tersimpan');
    // }
  }

  public function update($id)
  {
    // dd($this->request->getVar());
    $data = [
      'full_name' => $this->request->getPost('full_name'),
      'username'  => $this->request->getPost('username'),
      'password'  => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
      'korpokla'  => $this->request->getPost('korpokla'),
      'level' => $this->request->getPost('level'),
      'created_at' => date("Y-m-d H:i:s"),
    ];

    // $data = $this->request->getPost();
    unset($data['_method']);
    $ubah = $this->userModel->update_users($data, $id);
    if ($ubah) {
      return redirect()->to(site_url('user-management'))->with('success', 'Data terupdate');
    }
    // $this->db->table('users')->where(['user_id' => $id])->update($data);
    // return redirect()->to(site_url('user-management'))->with('success', 'Data terupdate');
  }


  public function destroy($id)
  {
    $hapus = $this->userModel->delete_users($id);
    if ($hapus) {
      return redirect()->to(site_url('user-management'))->with('success', 'Data berhasil di hapus');
    }
    // $this->db->table('users')->where(['user_id' => $id])->delete();
  }
}
