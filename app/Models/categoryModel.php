<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class categoryModel extends Model
{
    // Table
    protected $table = 'category';
    protected $primaryKey = "id_category";
    // allowed fields to manage
    protected $allowedFields = ['id_category', 'name_category'	
];

function getAllCategory(){
    $builder = $this->db->table('category');
    //$builder->join('books', 'books.id_category = category.id_category');
    $query = $builder->get();
    return $query->getResult();
}

}