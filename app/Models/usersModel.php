<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class usersModel extends Model
{
    // Table
    protected $table = 'users';
    protected $primaryKey = "id_users";
    // allowed fields to manage
    protected $allowedFields = ['username', 'password', 'id_employee'];

    function getAll(){
        $builder = $this->db->table('employee');
        //$builder->join('users', 'users.id_employee = employee.id_employee');
        $query = $builder->get();
        return $query->getResult();
    }
}