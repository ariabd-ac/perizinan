<?php

namespace App\Controllers;


class C_UserManagement extends BaseController
{
  public function index()
  {
    // echo password_hash('admin', PASSWORD_BCRYPT);
    // die();
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

  public function edit($id = null)
  {

    if ($id != null) {
      $query = $this->db->table('users')->getWhere(['user_id' => $id]);
      // print_r($query);
      if ($query->resultID->num_rows > 0) {
        $data['users'] = $query->getRow();
        return view('userManagement/v_edit', $data);
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
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

    // dd($data);

    $this->db->table('users')->insert($data);


    if ($this->db->affectedRows() > 0) {
      return redirect()->to(site_url('user-management'))->with('success', 'Data tersimpan');
    }
  }

  public function update($id)
  {
    // dd($this->request->getVar());
    $data = $this->request->getPost();
    unset($data['_method']);
    $this->db->table('users')->where(['user_id' => $id])->update($data);
    return redirect()->to(site_url('user-management'))->with('success', 'Data terupdate');
  }


  public function destroy($id)
  {
    $this->db->table('users')->where(['user_id' => $id])->delete();
    return redirect()->to(site_url('user-management'))->with('success', 'Data berhasil di hapus');
  }
}
