<?php

// namespace App\Controllers\Auth\Authentication;
namespace App\Controllers;

// use CodeIgniter\Controller;


class Auth extends BaseController
{

  public function index()
  {
    return redirect()->to(site_url('login'));
  }

  public function login()
  {
    if (session('user_id')) {
      return redirect()->to(site_url('home'));
    }
    return view('auth/login');
  }

  public function register()
  {
    return view('auth/register');
  }

  public function loginProcess()
  {
    $post = $this->request->getPost();
    $query = $this->db->table('users')->getWhere(['username' => $post['username']]);
    $user = $query->getRow();

    if ($user) {
      if (password_verify($post['password'], $user->password)) {
        $params = ['user_id' => $user->user_id,'level'=>$user->level];
        session()->set($params);
        return redirect()->to(site_url('home'));
      } else {
        return redirect()->back()->with('error', 'Password salah!');
      }
    } else {
      return redirect()->back()->with('error', 'Username tidak ada!');
    }
  }

  public function logout()
  {
    session()->remove('user_id');
    session()->remove('level');
    return redirect()->to(site_url('login'));
  }
}
