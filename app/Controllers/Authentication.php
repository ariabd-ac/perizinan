<?php

// namespace App\Controllers\Auth\Authentication;
namespace App\Controllers;

// use CodeIgniter\Controller;


class Authentication extends BaseController
{
  public function login()
  {
    return view('auth/login');
  }

  public function register()
  {
    return view('auth/register');
  }
}
