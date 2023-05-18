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
        $data['users'] = $this->users->getAll();

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
        return redirect()->to('/home/index');
    }

        

    public function login()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where('username' , $username)->first();
        if ($dataUser) {
            $pass = $dataUser['password'];
            if (password_verify($password, $pass)) {
                session()->set([
                    'username' => $dataUser['username'],
                    'id_users' => $dataUser['id_users'],
                    'logged_in' => TRUE
                ]);
                print_r('benar');
                return view('home', session());
            } else {
                session()->setFlashdata('error', 'Password salah');
                return view('login');
            }   
        }else if ($dataUser == FALSE && password_verify($password, $pass) == FALSE) {
            session()->setFlashdata('error', 'Username dan password salah');
            return view('login');
        }else {
                session()->setFlashdata('error', 'Username salah');
                return view('login');
        } 
    }

    public function beranda()
    {
        echo view('templates/header');
        echo view('home');
        echo view('templates/footer');

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/home/index');
    }

}