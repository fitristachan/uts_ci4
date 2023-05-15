<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class booksModel extends Model
{
    // Table
    protected $table = 'books';
    // allowed fields to manage
    protected $allowedFields = ['id_books', 'code_book', 'title', 'author', 'year', 'publisher', 'purchase_price', 'selling_price', 'stock', 'id_category'	
];
}