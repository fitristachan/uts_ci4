<?php
 
namespace App\Controllers;
use App\Models\saleModel;
use App\Models\detailModel;
use App\Models\employeeModel;
use App\Models\booksModel;


 
class Pos extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    protected $sale_model;
    protected $setail_model;
    protected $employee_model;
    protected $stocks_model;
 
    // Initialize Objects
    function __construct(){
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
        $this->data['request'] = $this->request;
        $this->sale_model = new saleModel();
        $this->detail_model = new detailModel();
        $this->employee_model = new employeeModel();
        $this->stocks_model = new booksModel();
    }

    public function cashier($id_books=''){
        $this->data['request'] = $this->request;
        //autofill facture
        $date_sale = $this->request->getVar('date_sale');
        $query = $this->sale_model->select("MAX(facture) as facture")->where(["DATE_FORMAT(date_sale, '%Y-%m-%d')" => $date_sale ]);
        $result = $query->first();
        $data = $result['facture'];

        $lastQueue = substr($data, -4);
        $nextQueue = intval($lastQueue) + 1;

        //next facture
        $this->data['facture'] = 'HB' . date('dmy', $date_sale) . sprintf('%04s', $nextQueue);
        //---autofill facture kelar

        //gettable
        $facture = $this->data['facture'];
        $joinBooks= $this->detail_model->getDetail();
        $this->data['datadetail']= $joinBooks;
//where(['facture'=> $facture])->join('books', 'books.id_books = detail_sale.id_books', 'FULL');


        //insertvaluetitle
        $qry= $this->stocks_model->select("*")->where(['id_books'=>$id_books])->join('category', 'category.id_category = books.id_category', 'LEFT');
        $this->data['data'] = $qry->first();

        //grand_total
        $grandTotal = $this->detail_model->select("SUM(total_price) as grand_total")->where(['facture'=> $this->data['facture']]);
        $this->data['grandTotal'] =  $grandTotal->first();
        
        echo view('templates/header', $this->data);
        echo view('cashier/cashier', $this->data);
        echo view('templates/footer');
    }


    public function viewProduct(){
        if($this->request->isAJAX()){
            $this->data['list'] = $this->stocks_model->orderBy('code_book ASC')->select('*')->getCategory();
            $msg = [
                'viewmodal' => view('cashier/viewSearchProduct', $this->data)
            ];
            echo json_encode($msg);
        }

    }
    public function tempSave(){
            $productcode = $this->request->getPost('product_code');
            $productname = $this->request->getPost('product_name');
            $qty = $this->request->getPost('qty');
            $facture = $this->request->getPost('facture');

            //buatsearchnanti
            //$queryProductCheck = $this->db->table('books')->like('code_book', $productcode)->orLike('title', $productname)->get();
            //$totalData = $queryProductCheck->getNumRows();

            $qry= $this->stocks_model->select("*")->where(['code_book'=>$productcode])->join('category', 'category.id_category = books.id_category', 'LEFT');
            $rowProduct = $qry->first();
            $insertData = [
                'id_books' => $rowProduct['id_books'],
                'qty' => $qty,
                'total_price' => floatval($rowProduct ['selling_price'] * $qty),
                'facture' => $facture
            ];
            if (empty($rowProduct['stock'] )){
                session()->setFlashdata('error_message', 'Empty Stock');
                return redirect()->back()->withInput();
            }
            if (floatval($rowProduct['stock'] - $qty)<1){
                session()->setFlashdata('error_message', 'Stock Minus');
                return redirect()->back()->withInput();
            }

            $tbltempSave = $this->detail_model->insert($insertData);
            if ($tbltempSave){
                $newStocks = floatval($rowProduct['stock'] - $qty);
                $insertnewStocks = [
                    'stock' => $newStocks
                ];
                $update = $this->stocks_model->select("*")->where(['code_book'=>$productcode])->set($insertnewStocks)->update();
                $this->session->setFlashdata('success_message','Data has been added on cart') ;
                return redirect()->to('pos/cashier');
            }
        }
        public function deleteTempSave($id_books=''){
            $qry= $this->stocks_model->select("*")->where(['books.id_books'=>$id_books])->join('detail_sale', 'detail_sale.id_books = books.id_books', 'LEFT');
            $rowProduct = $qry->first();
            $id_detail = $rowProduct['id_detail'];

            if(empty($id_books)){
                $this->session->setFlashdata('error_message','Unknown Data ID') ;
                return redirect()->to('/pos/cashier');
            }
            $delete = $this->detail_model->delete($id_detail);

            if($delete){
                $newStocks = floatval($rowProduct['stock'] + $rowProduct['qty']);
                $insertnewStocks = [
                    'stock' => $newStocks
                ];
                $update = $this->stocks_model->select("*")->where(['id_books'=>$id_books])->set($insertnewStocks)->update();

                $this->session->setFlashdata('success_message','Data has been deleted from cart.') ;
                return redirect()->to('/pos/cashier');
            }
        }
        
        public function allSave(){
            //employeeid
            $id_employeeSes = $this->session->id_employee;
            $qryEmployee= $this->employee_model->select('*')->where(['id_employee'=>$id_employeeSes])->first();
            //employeeid end
            
            $facture = $this->request->getPost('facture');

            //grand_total
            $grandTotal = $this->detail_model->select("SUM(total_price) as grand_total")->where(['facture'=> $facture])->first();
            $date_sale = $this->request->getPost('date_sale');
            $time_sale = $this->request->getPost('time');
            $id_employee = $qryEmployee['id_employee'];
            $cash = $this->request->getPost('cash_payment');
            $grand_total = $grandTotal;

        //dd($facture);
            if ($cash==NULL){
               session()->setFlashdata('error_message', 'Customer Need To Pay');
                return redirect()->back()->withInput();
            }

            $insertData = [
                'facture' => $facture,
                'date_sale' => $date_sale,
                'time_sale' => $time_sale,
                'id_employee' => $id_employee,
                'cash' => $cash,
                'grand_total' => $grand_total,
                'change' => floatval((int)$cash - (int)$grand_total)
            ];
            $save = $this->sale_model->insert($insertData);
            if ($save){
                $this->session->setFlashdata('success_message','Payment Success') ;
                $this->data['data'] = $facture;
                return redirect()->to('pos/invoice', $this->data);
            }
        }

        public function invoice($facture=''){
            $qry= $this->sale_model->select("*")->where(['sale.facture'=>$facture])->join('employee', 'employee.id_employee= sale.id_employee', 'LEFT')->join('detail_sale', 'detail_sale.facture= sale.facture', 'RIGHT')->join('books', 'books.id_books= detail_sale.id_books', 'RIGHT');
            $this->data['data'] = $qry->first();
            echo view('templates/header', $this->data);
            echo view('cashier/invoice', $this->data);
            echo view('templates/footer');
        }
}
?>