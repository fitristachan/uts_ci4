<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class saleModel extends Model
{
    // Table
    protected $table = 'sale';
    protected $primaryKey = "factur";
    // allowed fields to manage
    protected $allowedFields = ['facture', 'date_sale', 'time_sale' ,'grand_total', 'cash', 'change_purchase', 'id_employee'];

    function getAllSale(){
        $builder = $this->db->table('sale');
        $builder->join('sale', 'sale.facture = detail_sale.facture');
        $query = $builder->get();
        return $query->getResult();
    }

    function getAll(){
        $builder = $this->db->table('sale');
        $builder->join('detail_sale', 'detail_sale.facture = sale.facture')->join('employee', 'employee.id_employee = sale.id_employee')->join('books', 'books.id_books = detail_sale.id_books')->join('category', 'category.id_category = books.id_category');
        $query = $builder->get();
        return $query->getResult();
    }
}