<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class detailModel extends Model
{
    // Table
    protected $table = 'detail_sale';
    protected $primaryKey = "id_detail";
    // allowed fields to manage
    protected $allowedFields = ['id_detail', 'facture', 'id_books', 'qty', 'total_price'];
    
    
    function getDetail(){
        $builder = $this->db->table('detail_sale');
        $builder->join('books', 'books.id_books = detail_sale.id_books');
        $query = $builder->get();
        return $query->getResult();
    }

}