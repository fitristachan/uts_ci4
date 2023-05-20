<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class detailModel extends Model
{
    // Table
    protected $table = 'detail_sale';
    protected $primaryKey = "id_detail";
    // allowed fields to manage
    protected $allowedFields = ['id_detail', 'factur', 'id_books', 'barcode' ,'selling_price', 'qty', 'total_price'];
}