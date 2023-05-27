<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class booksModel extends Model
{
    // Table
    protected $table = 'books';
    protected $primaryKey = "id_books";
    // allowed fields to manage
    protected $allowedFields = ['id_books', 'code_book', 'title', 'author', 'year', 'publisher', 'purchase_price', 'selling_price', 'stock', 'id_category'	
];

function getCategory(){
    $builder = $this->db->table('books');
    $builder->join('category', 'category.id_category = books.id_category');
    $query = $builder->get();
    return $query->getResult();
}
}