<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'userId';
    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'createdDtm';
    protected $updatedField  = 'updatedDtm';
    
    protected $allowedFields = [
        'name',
        'roleId',
        'email',
        'password',
        'mobile',
        'createdBy',
        'isDeleted',
        'updatedBy'
    ];
}