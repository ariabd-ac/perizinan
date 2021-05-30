<?php

namespace App\Controllers;


class C_UserManagement extends BaseController
{
  public function index()
  {
    $builder = $this->db->table('users');
    $query   = $builder->get()->getResult();
    $data['users'] = $query;
    return view('userManagement/v_userManagement', $data);
    // print_r($query);
  }

  public function add()
  {

    return view('userManagement/v_add');
  }

  public function store()
  {

    $data = $this->request->getPost();
    $this->db->table('users')->insert($data);

    if ($this->db->affectedRows() > 0) {
      return redirect()->to(site_url('user-management'))->with('success', 'Data tersimpan');
    }
  }
  public function destroy($id)
  {
    $this->db->table('users')->where(['user_id' => $id])->delete();
    return redirect()->to(site_url('user-management'))->with('success', 'Data berhasil di hapus');
  }
}
