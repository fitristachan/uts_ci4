<?php

namespace App\Controllers;

use App\Models\usersModel;

class Home extends BaseController
{

        // Session
        protected $session;
        // Data
        protected $data;


    function __construct(){
        $this->users = new usersModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }


//BERANDA
    public function beranda()
    {
        echo view('templates/header', $this->data);
        echo view('home');
        echo view('templates/footer');

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth/index');
    }

}