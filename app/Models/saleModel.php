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
}