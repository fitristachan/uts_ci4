<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class employeeModel extends Model
{
    // Table
    protected $table = 'employee';
    protected $primaryKey = "id_employee";
    // allowed fields to manage
    protected $allowedFields = ['id_employee', 'firstName', 'lastName', 'title', 'salary', 'start_date', 'employee_code'];


}