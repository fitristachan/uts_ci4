<?php
 
namespace App\Controllers;
use App\Models\saleModel;
use App\Models\detailModel;
use App\Models\employeeModel;

 
class Pos extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    protected $sale_model;
    protected $setail_model;
    protected $employee_model;
 
    // Initialize Objects
    function __construct(){
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
        $this->data['request'] = $this->request;
        $this->sale_model = new saleModel();
        $this->detail_model = new detailModel();
        $this->employee_model = new employeeModel();
    }

    public function cashier(){
        //autofill facture
        $date_sale = $this->request->getVar('date_sale');
        $query = $this->db->query("SELECT MAX(facture) AS facture FROM sale WHERE DATE_FORMAT(date_sale, '%Y-%m-%d') = '$date_sale'");
        $result = $query->getRowArray();
        $data = $result['facture'];

        $lastQueue = substr($data, -4);
        $nextQueue = intval($lastQueue) + 1;

        //next facture
        $this->data['facture'] = 'HB' . date('dmy', $date_sale) . sprintf('%04s', $nextQueue);
        //---autofill facture kelar



        //employeeid
        $id_employee = $this->session->id_employee;
        $qry= $this->employee_model->select('*')->where(['id_employee'=>$id_employee]);
        $this->data['data'] = $qry->first();
        //employeeid end

        //gettable
        $facture = $this->request->getVar('facture');
        $this->data['datadetail']= $this->detail_model->orderBy('id_detail ASC')->getDetail();
        echo view('templates/header', $this->data);
        echo view('cashier/cashier', $this->data);
        echo view('templates/footer');
    }

}




?>