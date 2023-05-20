<?php
 
namespace App\Controllers;
 
use App\Models\usersModel;
use App\Models\employeeModel;
use App\Models\booksModel;

 
class Main extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    protected $stocks_model;
    protected $employee_model;
 
    // Initialize Objects
    function __construct(){
        $this->employee_model = new employeeModel();
        $this->users_model = new usersModel();
        $this->stocks_model = new booksModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }
 


//STOCKS
//STOCKS
//STOCKS


    // Stock_list
    public function stocks(){
        $this->data['page_title'] = "Stocks List";
        $this->data['list'] = $this->stocks_model->orderBy('code_book ASC')->getCategory();
        echo view('templates/header', $this->data);
        echo view('stocks/lists', $this->data);
        echo view('templates/footer');
    }

    public function addStocks(){
        echo view('templates/header', $this->data);
        echo view('stocks/create', $this->data);
        echo view('templates/footer');
    }

    public function saveStocks(){
    }

    public function editStocks($id_books=''){
        if(empty($id_books)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/Main/stocks');
        }
        $this->data['page_title'] = "Edit Stocks Details";
        $qry= $this->stocks_model->select('*')->where(['id'=>$id_books]);
        $this->data['data'] = $qry->first();
        echo view('templates/header', $this->data);
        echo view('stocks/edit', $this->data);
        echo view('templates/footer');
    }

    public function detailsStocks($id_books=''){
    }

    public function deleteStocks($id_books=''){
        if(empty($id_books)){
            $this->session->setFlashdata('error_message','Unknown Data ID') ;
            return redirect()->to('/Main/stocks');
        }
        $delete = $this->stocks_model->delete($id_books);
        if($delete){
            $this->session->setFlashdata('success_message','Stocks Details has been deleted successfully.') ;
            return redirect()->to('/Main/stocks');
        }
    }




//EMPLOYEE
//EMPLOYEE
//EMPLOYEE


        // employee_list
        public function employee(){
            $this->data['page_title'] = "Employee List";
            $this->data['list'] = $this->employee_model->orderBy('employee_code ASC')->select('*')->get()->getResult();
            echo view('templates/header', $this->data);
            echo view('employee/lists', $this->data);
            echo view('templates/footer');
        }

        public function addEmployee(){
            echo view('templates/header', $this->data);
            echo view('employee/create', $this->data);
            echo view('templates/footer');
        }
    
        public function saveEmployee(){
            
        }
    
        public function editEmployee($id_employee=''){
            if(empty($id_employee)){
                $this->session->setFlashdata('error_message','Unknown Data ID.') ;
                return redirect()->to('/Main/employee');
            }
            $this->data['page_title'] = "Edit Employee Details";
            $qry= $this->employee_model->select('*')->where(['id'=>$id_employee]);
            $this->data['data'] = $qry->first();
            echo view('templates/header', $this->data);
            echo view('employee/edit', $this->data);
            echo view('templates/footer');
        }
    
        public function deleteEmployee($id_employee=''){
            if(empty($id_employee)){
                $this->session->setFlashdata('error_message','Unknown Data ID') ;
                return redirect()->to('/Main/employee');
            }
            $delete = $this->employee_model->delete($id_employee);
            if($delete){
                $this->session->setFlashdata('success_message','Employee Details has been deleted successfully.') ;
                return redirect()->to('/Main/employee');
            }
        }
}