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
        $this->data['request'] = $this->request;
        $this->sale_model = new saleModel();
        $this->detail_model = new detailModel();
    }

    public function cashier(){
        $this->data['data'] = $this->session->username;
        echo view('templates/header', $this->data);
        echo view('cashier/cashier', $this->data);
        echo view('templates/footer');
    }

    public function getFacture(){
        $date = $this->request->getPost('date');
        $query = $this->sale_model->select("facture")->where([DATE_FORMAT('date_sale', '%Y-%m-%d')=>$date]);
        $result = $query->getRowArry();
        $data = $result['facture'];
    }
}




?>