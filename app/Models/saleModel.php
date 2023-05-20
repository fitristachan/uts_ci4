<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class saleModel extends Model
{
    // Table
    protected $table = 'sale';
    protected $primaryKey = "factur";
    // allowed fields to manage
    protected $allowedFields = ['factur', 'date_sale', 'time_sale' ,'grand_total', 'cash', 'change_purchase', 'id_employee'];
}