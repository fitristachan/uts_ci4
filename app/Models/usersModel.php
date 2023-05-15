<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class usersModel extends Model
{
    // Table
    protected $table = 'users';
    protected $primaryKey = "id_users";
    // allowed fields to manage
    protected $allowedFields = ['username', 'password'];
}