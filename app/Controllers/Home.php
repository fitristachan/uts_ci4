<?php

namespace App\Controllers;
use App\Models\usersModel;
use App\Models\employeeModel;

class Home extends BaseController
{
    function __construct(){
        $this->employee = new employeeModel();
        $this->users = new usersModel();
    }

    public function index()
    {
        return view('login');
    }

    public function register()
    {
        $data['users'] = $this->users->getAll();
        return view('register', $data);
    }
        

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $users = new usersModel();
        $dataUser = $users->where(['username' => $username])->first();
        if($dataUser) {
        $session = session();
            if (password_verify($password, $dataUser['password'])) {
                $login = [
                    'islogin' => TRUE,
                    'username' => $dataUser['username']
                ];
                $session->set($login);
                return redirect()->to(base_url('/home/beranda'));
            } else {
                session()->setFlashdata('error', 'Username dan Password Salah');
                return redirect()->back();
            }
        }else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function beranda()
    {
        return view('home');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

}