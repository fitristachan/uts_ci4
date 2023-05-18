<?php
 
namespace App\Controllers;
 
use App\Models\detailModel;
 
class Main extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    // Model
    protected $detail_model;
 
    // Initialize Objects
    public function __construct(){
        $this->crud_model = new detailModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }
 
    // Stock
    public function stocks(){
        $this->data['page_title'] = "Stocks";
        echo view('templates/header');
        echo view('stocks/lists', $this->data);
        echo view('templates/footer');
    }
}