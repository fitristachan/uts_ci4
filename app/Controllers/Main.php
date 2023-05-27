<?php
 
namespace App\Controllers;
 
use App\Models\usersModel;
use App\Models\employeeModel;
use App\Models\booksModel;
use App\Models\categoryModel;

 
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
        $this->category_model = new categoryModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }
 


//STOCKS
//STOCKS
//STOCKS


    // Stock_list
    public function stocks(){
        $this->data['page_title'] = "Stocks List";
        $this->data['list'] = $this->stocks_model->orderBy('code_book ASC')->select('*')->getCategory();
        echo view('templates/header', $this->data);
        echo view('stocks/lists', $this->data);
        echo view('templates/footer');
    }

    public function addStocks(){
        $this->data['page_title'] = "Add Stock";
        $this->data['request'] = $this->request;
        $this->data['category'] = $this->category_model->orderBy('id_category ASC')->getAllCategory();
        echo view('templates/header', $this->data);
        echo view('stocks/create', $this->data);
        echo view('templates/footer');
    }

    public function saveStocks(){
        $this->data['request'] = $this->request;
        $post = [             
            'code_book' => $this->request->getPost('code_book'),
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'year' => $this->request->getPost('year'),
            'publisher' => $this->request->getPost('publisher'), 
            'purchase_price' => $this->request->getPost('purchase_price'), 
            'selling_price' => $this->request->getPost('selling_price'), 
            'id_category' => $this->request->getPost('id_category')
        ];
        if(!empty($this->request->getPost('id_books'))){
            $save = $this->stocks_model->where(['id_books'=>$this->request->getPost('id_books')])->set($post)->update();
        }else{
            if (!$this->validate([
                'code_book' => [
                    'rules' => 'required|min_length[3]|max_length[5]|is_unique[books.code_book]',
                'errors' => [
                    'required' => '{field} Must be field',
                    'min_length' => '{field} Minimum length 5 character',
                    'max_length' => '{field} Maximum length 11 character',
                    'is_unique' => 'Book Code already exists'
                    ]
                    ],
                ],
                )) {
                session()->setFlashdata('error_message', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
            $save = $this->stocks_model->insert($post);}
        if($save){
            if(!empty($this->request->getPost('id_books')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id_books')) ? $this->request->getPost('id_books') : $save;
            return redirect()->to('Main/stocks');
        }else{
            echo view('templates/header', $this->data);
            echo view('stocks/create', $this->data);
            echo view('templates/footer');
    }
}

//saveCategory
public function saveCategory(){
    if (!$this->validate([
        'name_category' => [
            'rules' => 'required|max_length[50]|is_unique[books.code_book]',
            'errors' => [
                'required' => '{field} Must be field',
                'max_length' => '{field} Maximum length 50 character',
                'is_unique' => 'Category Name already exists'
            ]
        ],
    ],
    )) {
        session()->setFlashdata('error_message', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }
    $this->data['request'] = $this->request;
    $post = [             
        'name_category' => $this->request->getPost('name_category'),
    ];
    if(!empty($this->request->getPost('id_category')))
        $save = $this->category_model->where(['id_category'=>$this->request->getPost('id_category')])->set($post)->update();
    else
        $save = $this->category_model->insert($post);
    if($save){
        if(!empty($this->request->getPost('id_category')))
        $this->session->setFlashdata('success_message','Category has been updated successfully') ;
        else
        $this->session->setFlashdata('success_message','Category has been added successfully') ;
        $id =!empty($this->request->getPost('id_books')) ? $this->request->getPost('id_category') : $save;
        return redirect()->back()->withInput();
    }else{
        echo view('templates/header', $this->data);
        echo view('stocks/create', $this->data);
        echo view('templates/footer');
}
}

    public function editStocks($id_books=''){
        if(empty($id_books)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/Main/stocks');
        }
        $this->data['page_title'] = "Edit Stocks Details";
        $qry= $this->stocks_model->select("*")->where(['id_books'=>$id_books])->join('category', 'category.id_category = books.id_category', 'LEFT');
        $this->data['data'] = $qry->first();
        $this->data['category'] = $this->category_model->orderBy('id_category ASC')->getAllCategory();
        $this->data['request'] = $this->request;
        echo view('templates/header', $this->data);
        echo view('stocks/edit', $this->data);
        echo view('templates/footer');
    }

    public function detailsStocks($id_books=''){
        if(empty($id_books)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/Main/stocks');
        }
        $this->data['page_title'] = "View Stocks Details";
        $qry= $this->stocks_model->select("*")->where(['id_books'=>$id_books])->join('category', 'category.id_category = books.id_category', 'LEFT');
        $this->data['data'] = $qry->first();
        echo view('templates/header', $this->data);
        echo view('stocks/view', $this->data);
        echo view('templates/footer');
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
            $this->data['page_title'] = "Add Employee";
            $this->data['request'] = $this->request;
            echo view('templates/header', $this->data);
            echo view('employee/create', $this->data);
            echo view('templates/footer');
        }
    
        public function saveEmployee(){
            $this->data['request'] = $this->request;
            $post = [             
                'firstName' => $this->request->getPost('firstName'),
                'lastName' => $this->request->getPost('lastName'),
                'title' => $this->request->getPost('title'),
                'salary' => $this->request->getPost('salary'),
                'start_date' => $this->request->getPost('start_date'), 
                'employee_code' => $this->request->getPost('employee_code')  
            ];
            if(!empty($this->request->getPost('id_employee'))){
                $save = $this->employee_model->where(['id_employee'=>$this->request->getPost('id_employee')])->set($post)->update();
            }else{
                if (!$this->validate([
                    'employee_code' => [
                        'rules' => 'required|min_length[3]|max_length[5]|is_unique[employee.employee_code]',
                        'errors' => [
                            'required' => '{field} Must be field',
                            'min_length' => '{field} Minimum length 3 character',
                            'max_length' => '{field} Maximum length 5 character',
                            'is_unique' => 'Employee Number already exists'
                        ]
                    ],
                ],
                )) {
                    session()->setFlashdata('error_message', $this->validator->listErrors());
                    return redirect()->back()->withInput();
                }
                $save = $this->employee_model->insert($post);}
            if($save){
                if(!empty($this->request->getPost('id_employee')))
                $this->session->setFlashdata('success_message','Data has been updated successfully') ;
                else
                $this->session->setFlashdata('success_message','Data has been added successfully') ;
                $id =!empty($this->request->getPost('id_employee')) ? $this->request->getPost('id_employee') : $save;
                return redirect()->to('Main/employee');
            }else{
                echo view('templates/header', $this->data);
                echo view('employee/create', $this->data);
                echo view('templates/footer');
            }
        }
    
        public function editEmployee($id_employee=''){
            if(empty($id_employee)){
                $this->session->setFlashdata('error_message','Unknown Data ID.') ;
                return redirect()->to('/Main/employee');
            }
            $qry= $this->employee_model->select('*')->where(['id_employee'=>$id_employee]);
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