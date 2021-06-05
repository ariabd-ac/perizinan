<?php

namespace App\Controllers;


class C_Korpokla extends BaseController
{
  public function index()
  {
    $builder = $this->db->table('rf_korpokla');
    $query   = $builder->get()->getResult();
    // dd($query);
    $data['korpokla'] = $query;
    return view('korpokla/v_korpokla', $data);
  }

  public function add()
  {
    return view('korpokla/v_add_korpokla');
  }

  public function store()
  {
    $data = $this->request->getPost();
    $this->db->table('rf_korpokla')->insert($data);

    if ($this->db->affectedRows() > 0) {
      return redirect()->to(site_url('korpokla'))->with('success', 'Data tersimpan');
    }else{
      die($this->db);
    }
  }

  public function edit($id = null)
  {
    if ($id != null) {
      $query = $this->db->table('rf_korpokla')->getWhere(['korpokla_id' => $id]);
      // print_r($query);
      if ($query->resultID->num_rows > 0) {
        $data['korpokla'] = $query->getRow();
        return view('korpokla/v_edit_korpokla', $data);
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update($id)
  {
    // dd($this->request->getVar());
    $data = $this->request->getPost();
    unset($data['_method']);
    $this->db->table('rf_korpokla')->where(['korpokla_id' => $id])->update($data);
    return redirect()->to(site_url('korpokla'))->with('success', 'Data terupdate');
  }



  public function destroy($id)
  {
    $this->db->table('rf_korpokla')->where(['korpokla_id' => $id])->delete();
    return redirect()->to(site_url('korpokla'))->with('success', 'Data berhasil di hapus');
  }
}
