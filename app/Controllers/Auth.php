<?php

namespace App\Controllers;
use App\Models\usersModel;

class Auth extends BaseController
{

    function __construct(){
        $this->users = new usersModel();
    }

    public function index()
    {
        helper(['form']);
        return view('login');
    }

    public function registerView()
    {
        //combobox
        $data['employee'] = $this->users->getAll();
        return view('register', $data);
    }

    public function register()
    {
        //combobox
       // $data['users'] = $this->users->getAll();

        //regis
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[25]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 25 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
  
            ],
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new UsersModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'id_employee' => $this->request->getVar('id_employee')
        ]);
        return redirect()->to('/auth/index');
    }

        

    public function login()
    {
        $session = session();
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where('username' , $username)->first();
        if ($dataUser) {
            $pass = $dataUser['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data=[
                    'id_users' => $dataUser['id_users'],
                    'username' => $dataUser['username'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home/beranda');
            } else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('/auth/index');
            }   
        }else if ($dataUser == FALSE && password_verify($password, $pass) == FALSE) {
            session()->setFlashdata('error', 'Username dan password salah');
            return redirect()->to('/auth/index');
        }else {
                session()->setFlashdata('error', 'Username salah');
                return redirect()->to('/auth/index');
        } 
    }

}