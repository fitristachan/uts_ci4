<?php
 
namespace App\Controllers;
use App\Models\saleModel;
use App\Models\detailModel;

 
class Pos extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    protected $sale_model;
    protected $setail_model;
 
    // Initialize Objects
    function __construct(){
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
        $this->sale_model = new saleModel();
        $this->detail_model = new detailModel();
    }

    public function cashier(){


        
        echo view('templates/header', $this->data);
        echo view('cashier/cashier', $this->data);
        echo view('templates/footer');
    }

}



?>