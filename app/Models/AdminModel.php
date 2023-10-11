<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $useSoftDeletes = true;
    protected $table = 'admin';
    protected $primaryKey = 'adminId';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $allowedFields = [
        'name',
        'roleId',
        'email',
        'password',
        'mobile',
    ];
}