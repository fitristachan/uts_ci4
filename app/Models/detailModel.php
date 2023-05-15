<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class detailModel extends Model
{
    // Table
    protected $table = 'detail_sale';
    // allowed fields to manage
    protected $allowedFields = ['id_detail', 'number_sale', 'code_book', 'selling_price', 'qty', 'total_price'];
}